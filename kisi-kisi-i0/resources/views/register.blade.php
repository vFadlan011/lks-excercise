@extends('layouts.main')

@section('container')
    <main class="max-w-4xl mx-auto">
        <div class="hero">
            <div class="hero-content flex-col md:flex-row-reverse md:items-start">
                <h1 class="text-4xl md:mt-16">Registrasi pengguna baru</h1>
                <form action="" method="post" class="p-8">
                    <p class="text-red-800">{{ $errors->first() }}</p>
                    @csrf
                    <div class="control-form">
                        <label for="username" class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" name="username" id="username" class="input input-bordered w-full" required
                            maxlength="30">
                    </div>
                    <div class="control-form">
                        <label for="password" class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" id="password" class="input input-bordered w-full" required>
                    </div>
                    <div class="control-form">
                        <label for="name" class="label"><span class="label-text">Nama Lengkap</span></label>
                        <input type="text" name="name" id="name" class="input input-bordered w-full" required
                            maxlength="100">
                    </div>
                    <div class="control-form">
                        <label for="birthdate" class="label"><span class="label-text">Tanggal Lahir</span></label>
                        <input type="date" name="birthdate" id="birthdate" class="input input-bordered w-full" required>
                    </div>
                    <div class="control-form">
                        <label for="description" class="label"><span class="label-text">Deskripsi</span></label>
                        <textarea name="description" id="tinymce" class="textarea textarea-bordered" cols="30" rows="10"></textarea>
                    </div>
                    <div class="control-form">
                        <label for="regional" class="label"><span class="label-text">Regional (Provinsi,
                                Kabupaten)</span></label>
                        <input type="text" name="regional" id="regional" class="input input-bordered w-full" required>
                    </div>
                    <div class="control-form mt-4">
                        <input type="submit" value="Buat akun" class="btn btn-primary w-full">
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
