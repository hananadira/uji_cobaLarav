@extends('layouts.template')

@section('content')

{{-- @if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif --}}

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Jurusan</th>
                <th>No Rombel</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($rombels as $rom)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $rom['jurusan'] }}</td>
                    <td>{{ $rom['no_rombel'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rombel.edit', $rom['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('rombel.delete', $rom['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection