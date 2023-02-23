@extends('layouts.admin')

@section('container')
    <h1 class="text-4xl font-thin">Tambah Perusahaan</h1>
    <form action="" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
        <div class="control-form">
            <label for="name" class="label"><span class="label-text">Nama Perusahaan</span></label>
            <input type="text" name="name" id="name" class="input input-bordered w-full max-w-lg">
        </div>
        <div class="control-form">
            <label for="description" class="label"><span class="label-text">Deskripsi Perusahaan</span></label>
            <textarea name="description" id="tinymce" class="w-full max-w-lg"></textarea>
        </div>
        <div class="control-form">
            <label for="logo" class="label"><span class="label-text">Logo Perusahaan</span></label>
            <input type="file" name="logo" id="logo" class="file-input file-input-bordered w-full max-w-lg">
        </div>
        <div class="control-form justify-end flex">
            <input type="submit" value="Tambah" class="btn btn-primary mt-4">
        </div>
    </form>
@endsection
