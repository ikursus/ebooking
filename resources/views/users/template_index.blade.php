@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Senarai Users</div>

                <div class="card-body">

                  @include('layouts.alerts')

<!-- Paparkan data users dalam table -->
<table class="table table-bordered table-striped">

  <thead>
    <tr>
      <th>ID</th>
      <th>NAMA</th>
      <th>EMAIL</th>
      <th>TELEFON</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>

  <tbody>

    @foreach( $senarai_users as $user )

    <tr>
      <td>{{ $user['id'] }} </td>
      <td>{{ $user['nama'] }}</td>
      <td>{{ $user['email'] }}</td>
      <td>{{ $user['phone'] }}</td>
      <td>
        <a href="" class="btn btn-sm btn-primary">EDIT</a>
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
