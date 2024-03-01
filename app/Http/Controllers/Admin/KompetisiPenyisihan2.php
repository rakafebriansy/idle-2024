<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Mahasiswa;
use App\Peserta;
use App\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KompetisiPenyisihan2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_kategori)
    {
        // TODO : Return view with datatable
        $kategori = Kategori::where('kategori', $id_kategori)->get()->first();
        return view('admin.pages.penyisihan_2', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_kategori)
    {
        // TODO : Return view create
        $kategori = Kategori::where('kategori', $id_kategori)->get()->first();
        $tims = Tim::where('id_kategori', $kategori->id)->where('babak', '=', 1)->get();
        return view('admin.pages.add_penyisihan_2', compact('kategori', 'tims'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_kategori, Request $request)
    {
        $tims = $request->tims;
        $tahap = "tahap 2";
        $kategori = Kategori::where('kategori', $id_kategori)->get()->first();
        $mailer = app()->make(\Snowfire\Beautymail\Beautymail::class);
        foreach($tims as $tim){
            Tim::updateKompetisi($tim, 2);
            $tim_ = Tim::with('pesertas.mahasiswa')->find($tim);
            $kode = $tim_->submissionid;
            $nama = $tim_->nama_tim;
            foreach ($tim_->pesertas as $peserta){
                $email = $peserta->mahasiswa->email;
                $mailer->send('mails.lolos', compact('tahap', 'tim_', 'kategori', 'nama', 'kode'), function ($message) use ($email) {
                    $message
                        ->from('_mainaccount@idlefasilkom.blog')
                        ->to($email)
                        ->subject('Pengumuman Babak 2');
                });
            }
        }

        // TODO : return redirect with success
        return redirect()->route('admin.penyisihan-2.index', $id_kategori);
    }

    public function getSetNilaiPages()
    {
        $babak = 2;
        $tahap = "Penyisihan Tahap 2";
        $kategoris = Kategori::where('id_ormawa', Auth::user()->id_ormawa)->get();
        $tims = [];
        foreach ($kategoris as $kategori) {
            $tim = Tim::select('id', 'nama_tim', 'babak')
                ->where('id_kategori', $kategori->id)
                ->where('babak', $babak)
                ->get();
            foreach ($tim as $t) {
                array_push($tims, $t);
            }
        }
        return view('admin.pages.set_nilai', compact('tims', 'tahap', 'babak'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kategori, $id)
    {
        return 'Show ' . $id_kategori . '_' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori, $id)
    {
        return 'Edit ' . $id_kategori . '_' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kategori, $id)
    {
        $tim = Tim::updateKompetisi($id, 1);
        if($tim){
            return redirect()->route('admin.penyisihan-2.index', compact('kategori'));
        }
        return redirect()->route('admin.penyisihan-2.index', compact('kategori'));
    }
}
