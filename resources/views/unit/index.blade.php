@extends('adminlte::page')

@section('title', 'Data Unit')

@section('content_header')
    <h1>Data Unit</h1>
@stop

@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('unit.create') }}" class="btn btn-md btn-success mb-3">Tambah Unit</a>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Nama Unit</th>
                                <th scope="col">Lantai</th>
                                <th scope="col">Area</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($units as $unit)
                                <tr>
                                    <td>{{ $unit->nama_unit }}</td>
                                    <td>{{ $unit->lantai }}</td>
                                    <td>{{ $unit->area }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('unit.destroy', $unit->id) }}" method="POST">
                                            <a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data unit belum Tersedia.
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $units->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>




@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

