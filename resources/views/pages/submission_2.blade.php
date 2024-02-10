@extends('layouts.base')

@section('title', 'Submit')

@section('css')
<style media="screen">
  body{
    background-color: #F3F2F0;
  }
  .card{
    border-radius: 10px;
    padding: 25px 15%;
  }
</style>
@endsection

@section('content')
    <div class="container hero" style="margin-top: 1px;">
        <div class="row">
            <div class="col-md-12" style="height: auto;padding-top: 62px;">
                <div style="margin-bottom: 11px;">
                    <h1  style="color: rgb(0,0,0);margin-top: 71px;, sans-serif;"></h1>
                    <h1 class="text-center page_title">Submit Tahap 2</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /blue -->


    <!-- *****************************************************************************************************************
       BLOG CONTENT
       ***************************************************************************************************************** -->

       <div class="card" style="margin-top: 10px;">
           <div class="card-body">
               @foreach ($errors->all() as $error)
               <div class="alert alert-danger" role="alert">
                  <li style="color: red">{{ $error }}</li>
               </div>
               @endforeach
               <h2>Halo, {{$tim->nama_tim}}</h2>
               <p>Pada tahap 2 bidang lomba {{$tim->kategori->nama_kategori}}, tim anda diminta untuk menyantumkan <b>link video</b> yang diunggah pada Youtube dan <b>File .ZIP</b> berisi: <italic><b>Pamflet/ Poster</b> dan <b>Scan KTM Setiap anggota</b></italic>.</p>
               <div class="row">
                   <div class="col-lg-12">

                       <form class="contact-form" role="form" action="{{ route('kompetisi.submit.store', ['token' => $tim->submissionid]) }}" method="POST"  enctype="multipart/form-data">
                           @csrf

                           <div class="form-group">
                               <label for="" style="float: left;">Judul</label>
                               <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                               <div class="validate"></div>
                           </div>

                           <div class="form-group">
                               <label for="" style="float: left;">Link Video Youtube</label>
                               <input type="text" name="link" class="form-control" placeholder="Link Video" required>
                               <div class="validate"></div>
                           </div>

                           <div class="form-group">
                               <label for="" style="float: left;">Silahkan masukan file (ZIP)</label>
                               <input type="file" name="file" class="form-control" id="contact-name" placeholder="File" required>
                           </div>

                           <small style="color:red">Pastikan ukuran file tidak lebih dari 5 Mb.</small>

                           <div class="form-send">
                               <button type="submit" class="btn btn-success shadow">Submit</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
        </div>
@endsection
