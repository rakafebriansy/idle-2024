@extends('layouts.base')

@section('title', 'IDLe ' . $kategori->nama_kategori)

@section('css')
<style media="screen">
  label{
    color: white;
    font-weight: bold;
  }
  body{
    background-color: #F3F2F0;
  }
  .card{
    border-radius: 10px;
    padding: 25px 10%;
    min-height: 500px;
  }
</style>
@endsection

@section('content')
    <div class="container hero" style="margin-top: 1px;">
        <div class="row">
            <div class="col-md-12" style="height: auto;padding-top: 62px;">
                <div style="margin-bottom: 11px;">
                    <h1  style="color: rgb(0,0,0);margin-top: 71px;, sans-serif;"></h1>
                    <h1 class="text-center page_title">Kompetisi {{ $kategori->nama_kategori }}</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- *****************************************************************************************************************
       DESCRIPTION
       ***************************************************************************************************************** -->
   <div class="card">
       <div class="card-body">
           <div class="row">
               <div class="col-auto col-md-6 align-self-center">
                  <img class="img-fluid float-right" data-bs-hover-animate="pulse" src="{{asset('assets/img/kategori/'.$kategori->kategori.'.jpg')}}">
               </div>
               <div class="col-auto col-md-6">
                   <p class="text-justify">
                     Pengembangan game adalah salah satu bidang pengembangan yang berfokus pada sebuah game, Lomba pengembangan aplikasi permainan mendorong peserta untuk berkreasi dan berinovasi untuk mengembangkan aplikasi permainan yang mampu berjalan dengan baik untuk memenuhi tujuan yang ingin dicapai, memperlihatkan sisi pendidikan, mempunyai dampak dan manfaat, sekaligus mengandung unsur hiburan (entertainment value) dari sebuah permainan itu sendiri. 
                     </p>
                     <a class="btn btn-success shadow" href="{{ asset('assets/rulebook/'.$kategori->kategori.'.pdf') }}">Rule Book</a>
                     <a class="btn btn-success shadow" href="{{ asset('assets/template/#.pdf') }}">Template</a>
                     <a class="btn btn-success shadow" href="{{ route('kompetisi.peserta', ['kategori' => $kategori->kategori]) }}">Daftar Peserta</a>
               </div>
           </div>
       </div>
        </div>
       <div data-bs-parallax-bg="true" class="register-img">
            <form method="post" class="register-form" action="{{ route('kompetisi.store', ['kategori' => $kategori->id]) }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $kategori->id }}" name="kategori">
                <h2 class="text-center" style="font-family: Nunito, sans-serif;font-weight: bold;color: rgb(255,255,255);">Pendaftaran</h2>
                <div class="form-group">
                  <label>Nama Tim</label>
                  <input class="form-control" type="text" name="nama_tim" value="{{ old('nama_tim') }}" placeholder="Nama Tim"></div>
                <div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Nama Ketua</label>
                              <input class="form-control" type="text" name="nama[]" value="{{ old('nama[0]') }}" required placeholder="Nama Ketua"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>NIM Ketua</label>
                              <input class="form-control" type="number" name="nim[]" value="{{ old('nim[0]') }}" required placeholder="NIM Ketua"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Email Ketua</label>
                              <input class="form-control" type="email" name="email[]" value="{{ old('email[0]') }}" required placeholder="Email Ketua"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>No. Whatsapp Ketua</label>
                              <input class="form-control" type="text" name="no_hp[]" value="{{ old('no_hp[0]') }}" required placeholder="No. Whatsapp Ketua"></div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 30px;">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Nama Anggota 1</label>
                              <input class="form-control" type="text" name="nama[]" value="{{ old('nama[1]') }}" required placeholder="Nama Anggota 1"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>NIM Anggota 1</label>
                              <input class="form-control" type="number" name="nim[]" value="{{ old('nim[1]') }}" required placeholder="NIM Anggota 1"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Email Anggota 1</label>
                              <input class="form-control" type="email" name="email[]" value="{{ old('email[1]') }}" required placeholder="Email Anggota 1"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>No. Whatsapp Anggota 1</label>
                              <input class="form-control" type="text" name="no_hp[]" value="{{ old('no_hp[1]') }}" required placeholder="No. Whatsapp Anggota 1"></div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 30px;">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Nama Anggota 2</label>
                              <input class="form-control" type="text" name="nama[]" value="{{ old('nama[2]') }}" placeholder="Nama Anggota 2"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>NIM Anggota 2</label>
                              <input class="form-control" type="number" name="nim[]" value="{{ old('nim[2]') }}" placeholder="NIM Anggota 2"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Email Anggota 2</label>
                              <input class="form-control" type="email" name="email[]" value="{{ old('email[2]') }}" placeholder="Email Anggota 2"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>No. Whatsapp Anggota 2</label>
                              <input class="form-control" type="text" name="no_hp[]" value="{{ old('no_hp[2]') }}" placeholder="No. Whatsapp Anggota 2"></div>
                        </div>
                    </div>
                </div>
              	<i style="color: white;">(kosongi anggota 2 jika hanya mendaftarkan 2 peserta)</i>
                <div class="text-center" ><button class="btn btn-success" id="reg-submit" type="submit">Daftar</button></div>
            </form>
        </div>
@endsection
