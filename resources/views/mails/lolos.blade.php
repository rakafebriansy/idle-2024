@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Selamat',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

    <p>Selamat <b> {{ $tim_->nama_tim }} </b>, anda berhasil lolos ke {{ $tahap }} dalam kategori {{ $kategori->nama_kategori }}.</p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.contentStart')
    @if($kategori->kategori == 'cpc' || $kategori->kategori == 'ctf')
        <p>Silahkan tunggu informasi selanjutnya dari email</p>
    @else

        <p>Silahkan submit ke babak selanjutnya dengan klik tombol dibawah : </p>
        @include('beautymail::templates.sunny.button', [
        	'title' => 'Submit',
        	'link' => route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])])

        
        <p>atau akses link berikut : <a
                    href="{{ route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode]) }}">{{ route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode]) }}</a></p>

    @endif
    @include('beautymail::templates.sunny.contentEnd')
@stop