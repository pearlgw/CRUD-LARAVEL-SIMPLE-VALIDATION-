@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6>Form Edit Data Pelajar</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('pelajar/'.$txtid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="txtid" class="col-sm-3 col-form-label">Id pelajar</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-plaintext" id="txtid" name="txtid" value="{{ $txtid }}">
                        @error('txtid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtnamalengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm @error('txtnamalengkap') is-invalid @enderror" id="txtnamalengkap" name="txtnamalengkap" value="{{ $txtnamalengkap }}">
                        @error('txtnamalengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtjeniskelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                        <select name="txtjeniskelamin" id="txtjeniskelamin" class="form-control form-control-sm @error('txtjeniskelamin') is-invalid @enderror">
                            <option value="" selected>~ pilih ~</option>
                            <option value="M" {{ $txtjeniskelamin == 'M' ? 'selected' : '' }}>Pria</option>
                            <option value="F" {{ $txtjeniskelamin == 'F' ? 'selected' : '' }}>Wanita</option>
                        </select>
                        @error('txtjeniskelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtalamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm @error('txtalamat') is-invalid @enderror" id="txtalamat" name="txtalamat" value="{{ $txtalamat }}">
                        @error('txtalamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtemail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm @error('txtemail') is-invalid @enderror" id="txtemail" name="txtemail" value="{{ $txtemail }}">
                        @error('txtemail')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtnohp" class="col-sm-3 col-form-label">No Handphone</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm @error('txtnohp') is-invalid @enderror" id="txtnohp" name="txtnohp" value="{{ $txtnohp }}">
                        @error('txtnohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                    <button type="button" class="btn btn-sm btn-warning"
                        onclick="window.location='{{ url('pelajar') }}'">Kembali</button>
                </div>
            </form>
        </div>
    </div>
@endsection
