@extends('layout.template')

@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Food</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active">Food</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="container-fluid">
  <form method="POST" action="{{ $url_form }}">
    @csrf
    {!! (isset($food))? method_field('PUT') : ''!!}
    <div class="form-group">
      <label>Nama</label>
      <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($food)? $food->nama : old('nama') }}" name="nama" type="text" />
      @error('nama')
        <span class="error invalid-feedback">{{ $message }} </span>
      @enderror
    </div>
    <div class="form-group">
      <label>Harga</label>
      <input class="form-control @error('harga') is-invalid @enderror" value="{{ isset($food)? $food->harga : old('harga') }}" name="harga" type="text"/>
      @error('harga')
        <span class="error invalid-feedback">{{ $message }} </span>
      @enderror
    </div>
    <div class="form-group">
      <button class="btn btn-sm btn-primary float-right my-2"><i class="fas fa-save pr-1"></i>Simpan</button>
      <a href="{{url('food')}}" class="btn btn-default"><i class="fas fa-arrow-left pr-1"></i>Cancel</a>
    </div>
  </form>
</div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection