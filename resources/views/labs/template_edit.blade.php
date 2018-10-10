@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kemaskini Lab</div>

                <div class="card-body">

                  @include('layouts.alerts')

                  <form method="post" action="{{ route('lab.update', 1) }}">
                    @csrf
                    <input type="hidden" name="_method" value="patch">
                    @method('patch')

                  <div class="form-group">
                    <label>NAMA</label>
                    <input type="text" name="nama" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>STATUS</label>
                    <select name="role" class="form-control">
                      <option value="available">AVAILABLE</option>
                      <option value="not_available">NOT AVAILABLE</option>
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
