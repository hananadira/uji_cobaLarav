@extends('layouts.template')

@section('content')
    <form action="{{ route('rombel.store') }}" method="POST" class="card p-5">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Nama Jurusan :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="jurusan" name="jurusan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_rombel" class="col-sm-2 col-form-label">No Rombel :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_rombel" name="no_rombel">
            </div>
        </div>
        {{-- <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Jenis Obat :</label>
            <div class="col-sm-10">
                <select name="type" id="type" class="form-select">
                    <option selected disabled hidden>Pilih</option>
                    <option value="tablet">tablet</option>
                    <option value="sirup">sirup</option>
                    <option value="kapsul">kapsul</option>
                </select>
            </div>
        </div> --}}
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection