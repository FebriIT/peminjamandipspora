@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">

        <div class="card author-box card-primary">
            <div class="card-body">
                <div class="author-box-left">
                    <img alt="image" src="{{ Auth::user()->getAvatar() }}" width="100px" height="100px"
                        class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>

                </div>
                <div class="author-box-details">
                    <div class="author-box-name">
                        <a href="#">{{ Auth::user()->name }}</a>
                    </div>

                    <div class="author-box-description">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/{{ auth()->user()->role }}/profile/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jk" required>
                                            <option value="">-Pilih-</option>
                                            <option @if($data->jk=='Laki-Laki') selected @endif value="Laki-Laki">Laki-Laki</option>
                                            <option @if($data->jk=='Perempuan') selected @endif value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor HP</label>
                                        <input type="number" name="nohp" class="form-control" required value="{{ $data->nohp }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <input type="file" name="avatar" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Username </label>
                                        <input type="text" class="form-control" value="{{ $data->username }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password Confirmation</label>
                                        <input type="password" name="password-confirm" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
