@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kemaskini User</div>

                <div class="card-body">

                  @include('layouts.alerts')

<form method="post" action="{{ route('users.update', 1) }}">

<div class="form-group">
  <label>NAMA</label>
  <input type="text" name="nama" class="form-control">
</div>

<div class="form-group">
  <label>EMAIL</label>
  <input type="email" name="email" class="form-control">
</div>

<div class="form-group">
  <label>TELEFON</label>
  <input type="text" name="phone" class="form-control">
</div>

<div class="form-group">
  <label>ROLE</label>
  <select name="role" class="form-control">
    <option value="student">STAFF</option>
    <option value="staff">STAFF</option>
    <option value="admin">STAFF</option>
  </select>
</div>

<div>
  <button type="submit" class="btn btn-primary">SIMPAN</button>
</div>

</form>

</div>
</div>
</div>
</div>
</div>

@endsection
