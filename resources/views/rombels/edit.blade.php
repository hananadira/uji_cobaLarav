@extends('layouts.template')

@section('content')
    <form action="{{ route('rombel.update', $rombels['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-denger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Nama Jurusan :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $rombels['jurusan'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_rombel" class="col-sm-2 col-form-label">No Rombel :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_rombel" name="no_rombel" value="{{ $rombels['no_rombel'] }}">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection