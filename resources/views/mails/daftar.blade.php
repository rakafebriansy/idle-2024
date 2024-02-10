@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Selamat',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

    <p><b>Selamat Tim anda telah terdaftar pada Event IDLe dengan nama tim {{ $tim->nama_tim }} dalam
            kategori {{ $kategori->nama_kategori }} </b></p>

    @if($kategori->kategori == 'cpc' || $kategori->kategori == 'ctf')
        <p>Silahkan tunggu informasi selanjutnya dari email</p>
    @else
        <p>Silahkan submit karya tulis dengan klik tombol dibawah : </p>
        @include('beautymail::templates.sunny.contentEnd')
        @include('beautymail::templates.sunny.button', [
        	'title' => 'Submit',
        	'link' => route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])])

        @include('beautymail::templates.sunny.contentStart')
        <p>atau akses link berikut :
            <a href="{{ route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode]) }}">{{ route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode]) }}</a>
        </p>
        @include('beautymail::templates.sunny.contentEnd')
    @endif




@stop
