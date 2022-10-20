@extends('adminlte::page')

@section('title', 'Edit Data unit')

@section('content_header')
    <h1>Edit Data unit</h1>
@stop

@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('unit.update', $unit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label class="font-weight-bold">Nama Unit</label>
                            <input type="text" class="form-control @error('nama_unit') is-invalid @enderror" name="nama_unit" value="{{ old('nama_unit', $unit->nama_unit) }}" placeholder="Masukkan Nama Unit">

                            <!-- error message untuk title -->
                            @error('nama_unit')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Lantai</label>
                            <input type="text" class="form-control @error('lantai') is-invalid @enderror" name="lantai" value="{{ old('lantai', $unit->lantai) }}" placeholder="Masukkan Lantai">

                            <!-- error message untuk title -->
                            @error('lantai')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Area</label>
                            <input type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area', $unit->area) }}" placeholder="Masukkan  Area">

                            <!-- error message untuk title -->
                            @error('area')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'content' );
</script>




@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

