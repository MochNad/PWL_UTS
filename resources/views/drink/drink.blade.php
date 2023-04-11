@extends('layout.template')

@section('content')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Drink</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active">Drink</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="container-fluid">
  <a href="{{url('drink/create')}}" class="btn btn-sm btn-success float-right my-2"><i class="fas fa-plus pr-1"></i>Tambah Data</a>
  <form action="search" method="GET">
    @csrf
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search" name="keyword">
      <div class="input-group-append">
        <select class="custom-select rounded-0" name="column">
          <option value="Kode">Kode</option>
          <option value="Nama">Nama</option>
          <option value="Harga">Harga</option>
        </select>
        <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
      </div>
    </div> 
  </form>
  <table class="table table-striped table-light table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Action</th>
          </tr>
    </thead>
    <tbody>
      @if ($drink->count() > 0)
        @foreach ($drink as $i => $d)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$d->kode}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->harga}}</td>
            <td>
              <a href="{{ url('/drink/'.$d->id.'/edit/') }}" class="btn btn-sm btn-warning"><i class="fas fa-edit pr-1"></i>Edit</a>
              <form method="POST" action="{{ url('/drink/'.$d->id)}}" class="d-inline pl-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash pr-1"></i>Hapus</button>
              </form>
            </td>
        </tr>
        @endforeach
      @else
          <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
      @endif
    </tbody>
    <tfoot>
      <tr>
        <th colspan="6">
          <div class="d-flex justify-content-center mt-2">
            {{ $drink->links() }}
          </div>
        </th>
      </tr>
    </tfoot>
  </table>
  <!-- /.row -->
  <!-- Main row -->
  
  <!-- /.row (main row) -->
</div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection