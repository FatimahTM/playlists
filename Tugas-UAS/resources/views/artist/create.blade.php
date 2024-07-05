@extends('layout.main')

@section('title', 'Tambah Artist')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Artist</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nama Artist</th>
                            <td>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Asal</th>
                            <td>
                                <input type="text" name="asal" id="asal" class="form-control @error('asal') is-invalid @enderror" value="{{ old('asal') }}" required>
                                @error('asal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>File Foto</th>
                            <td>
                                <input type="file" name="url_foto" id="url_foto" class="form-control-file @error('url_foto') is-invalid @enderror" required>
                                @error('url_foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <div class="col-auto">
                        <button type="reset" class="btn btn-light">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<p>© 2024</p>
@endsection
