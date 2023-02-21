<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LADUKAT</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="hero min-h-screen" style="background-image: url('assets/images/photo-1670203336942-d4e3f1f38f68.jpg')">
        <div class="hero-content flex-col">
            <h1 class="text-4xl font-semibold">Halo, Selamat Datang!</h1>
            <p>Halaman Layanan Pengaduan Masyarakat</p>
            <a href="#form-aduan" class="btn btn-primary normal-case">Buat Aduan</a>
        </div>
    </header>
    <main class="max-w-4xl p-4 mx-auto mt-4">
        <h2 id="form-aduan" class="text-2xl">Formulir Aduan</h2>
        <h4 class="text-red-700">{{ $errors->first() }}</h4>
        <form action="" method="post" enctype="multipart/form-data" class="max-w-xl mt-4 flex flex-col gap-2">
            @csrf
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="name" class="label"><span class="label-text">Nama</span></label>
                <input type="text" name="name" id="name" class="input input-bordered input-sm md:w-96"
                    required maxlength="100" value="{{ old('nama') }}">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="nik" class="label"><span class="label-text">NIK</span></label>
                <input type="text" name="nik" id="nik" class="input input-bordered input-sm md:w-96"
                    required maxlength="16" value="{{ old('nik') }}">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="email" class="label"><span class="label-text">Email</span></label>
                <input type="email" name="email" id="email" class="input input-bordered input-sm md:w-96"
                    required value="{{ old('email') }}">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="phone" class="label"><span class="label-text">Nomor Handphone</span></label>
                <input type="text" name="phone" id="phone" class="input input-bordered input-sm md:w-96"
                    required maxlength="15" value="{{ old('phone') }}">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between items-start">
                <label for="report_msg" class="label"><span class="label-text">Aduan</span></label>
                <textarea name="report_msg" id="report_msg" class="textarea textarea-bordered w-full md:w-96" required
                    value="{{ old('report_msg') }}"></textarea>
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="report_img_1" class="label"><span class="label-text">Foto 1</span></label>
                <input type="file" name="report_img_1" id="report_img_1"
                    class="file-input file-input-bordered md:w-96" />
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="report_img_2" class="label"><span class="label-text">Foto 2</span></label>
                <input type="file" name="report_img_2" id="report_img_2"
                    class="file-input file-input-bordered md:w-96" />
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="report_img_3" class="label"><span class="label-text">Foto 3</span></label>
                <input type="file" name="report_img_3" id="report_img_3"
                    class="file-input file-input-bordered md:w-96" />
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="report_img_4" class="label"><span class="label-text">Foto 4</span></label>
                <input type="file" name="report_img_4" id="report_img_4"
                    class="file-input file-input-bordered md:w-96" />
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between">
                <label for="report_img_5" class="label"><span class="label-text">Foto 5</span></label>
                <input type="file" name="report_img_5" id="report_img_5"
                    class="file-input file-input-bordered md:w-96" />
            </div>
            <div class="control-form flex justify-end">
                <input type="submit" value="Kirim Aduan" class="btn btn-primary normal-case">
            </div>
        </form>
        <p>Sudah pernah membuat aduan? Cek aduan Anda <a href="/search" class="link link-primary">di
                sini</a></p>
        <a href="/login" class="link link-primary mt-12 block">Login sebagai admin</a>
    </main>
</body>

</html>
