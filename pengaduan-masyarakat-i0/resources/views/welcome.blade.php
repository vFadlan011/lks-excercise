<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="winter">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | LADUKAT</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/build/assets/app-72ac7327.css">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="hero min-h-screen" style="background-image: url(/img/photo-1496307653780-42ee777d4833.jpg);">
        <div class="hero-overlay bg-opacity-5"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold text-slate-900">Halo,</h1>
                <p class="mb-5 text-3xl text-slate-800">Selamat Datang di Aplikasi Layanan Pengaduan Masyarakat</p>
                <a class="btn btn-primary" href="#form-aduan">Buat Aduan</a>
            </div>
        </div>
        <div class="h-12 w-full bg-gradient-to-b from-transparent to-white bottom-0 absolute"></div>
    </header>
    <main class="max-w-3xl mx-auto my-32">
        <section id="form-aduan">
            <h2 class="text-3xl text-slate-800 my-8 mx-12 md:mx-0">Formulir Pengaduan</h2>
            @if($errors->any())
            <h4 class="text-red-800">{{$errors->first()}}</h4>
            @endif
            <div class="flex justify-between flex-col items-center md:flex-row md:items-start">

                <form action="/" method="post" enctype="multipart/form-data" class="w-2/3">
                    @csrf
                    <div class="form-control w-full my-3">
                        <label class="label" for="name">
                            <span class="label-text">Nama Lengkap<span class="text-red-800">*</span></span>
                        </label>
                        <input type="text" id="name" name="name" placeholder="Ketik di sini" class="input input-bordered w-full" maxlength="100" required value="{{old('name')}}" />
                    </div>

                    <div class="form-control w-full my-3">
                        <label class="label" for="nik">
                            <span class="label-text">NIK atau Nomor KTP<span class="text-red-800">*</span></span>
                        </label>
                        <input type="text" id="nik" name="nik" placeholder="Ketik di sini" class="input input-bordered w-full" minlength="16" maxlength="16" required value="{{old('nik')}}" />
                    </div>

                    <div class="form-control w-full my-3">
                        <label class="label" for="email">
                            <span class="label-text">E-Mail<span class="text-red-800">*</span></span>
                        </label>
                        <input type="email" id="email" name="email" placeholder="Ketik di sini" class="input input-bordered w-full" value="{{old('email')}}" />
                    </div>

                    <div class="form-control w-full my-3">
                        <label class="label" for="phone">
                            <span class="label-text">Nomor Handphone<span class="text-red-800">*</span></span>
                        </label>
                        <input type="text" id="phone" name="phone" placeholder="Ketik di sini" class="input input-bordered w-full" minlength="5" maxlength="15" required value="{{old('phone')}}" />
                    </div>

                    <div class="form-control w-full my-3">
                        <label for="report_msg" class="label">
                            <span class="label-text">Aduan<span class="text-red-800">*</span></span>
                        </label>
                        <textarea id="report_msg" name="report_msg" class="textarea textarea-bordered text-sm" placeholder="Ketik di sini" rows="7" required>{{old('report_msg')}}</textarea>
                    </div>

                    <div class="form-control w-full my-3">
                        <label for="img1" class="label">
                            <span class="label-text">Foto 1<span class="text-red-800">*</span></span>
                        </label>
                        <input type="file" id="img1" name="img1" class="file-input file-input-bordered w-full" required value="" />
                    </div>
                    <div class="form-control w-full my-3">
                        <label for="img2" class="label">
                            <span class="label-text">Foto 2</span>
                        </label>
                        <input type="file" id="img2" name="img2" class="file-input file-input-bordered w-full" value="" />
                    </div>
                    <div class="form-control w-full my-3">
                        <label for="img3" class="label">
                            <span class="label-text">Foto 3</span>
                        </label>
                        <input type="file" id="img3" name="img3" class="file-input file-input-bordered w-full" value="" />
                    </div>
                    <div class="form-control w-full my-3">
                        <label for="img4" class="label">
                            <span class="label-text">Foto 4</span>
                        </label>
                        <input type="file" id="img4" name="img4" class="file-input file-input-bordered w-full" value="" />
                    </div>
                    <div class="form-control w-full my-3">
                        <label for="img5" class="label">
                            <span class="label-text">Foto 5</span>
                        </label>
                        <input type="file" id="img5" name="img5" class="file-input file-input-bordered w-full" value="" />
                    </div>

                    <div class="flex justify-end">
                        <input type="submit" id="submit" name="submit" value="Kirim Aduan" class="btn btn-primary">
                    </div>
                </form>
                <p class="text-left w-72 mt-8 md:w-56">Sudah pernah membuat aduan? Cek aduan Anda <a href="/search" class="link link-primary link-hover">di sini</a></p>

            </div>
        </section>
    </main>
    @include("partials.footer")
</body>


</html>