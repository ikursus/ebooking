@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Lab</div>

                <div class="card-body">

                  @include('layouts.alerts')

<p>
<a href="{{ route('lab.create') }}" class="btn btn-primary">Tambah Lab</a>
</p>

<!-- Paparkan data users dalam table -->
<table class="table table-bordered table-striped">

  <thead>
    <tr>
      <th>ID</th>
      <th>NAMA</th>
      <th>STATUS</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>

  <tbody>

    @foreach( $senarai_lab as $item )

    <tr>
      <td>{{ $item['id'] }} </td>
      <td>{{ $item['nama'] }}</td>
      <td>{{ $item['status'] }}</td>
      <td>
        <a href="{{ route('lab.update', $item['id']) }}" class="btn btn-sm btn-primary">EDIT</a>
      </td>
    </tr>

    @endforeach

  </tbody>

</table>

</div>
</div>
</div>
</div>
</div>
@endsection
