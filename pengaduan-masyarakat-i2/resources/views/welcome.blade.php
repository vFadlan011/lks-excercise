<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} | LADUKAT</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <header class="hero min-h-screen" style="background-image: url('assets/images/photo-1670203336942-d4e3f1f38f68.jpg')">
        <div class="hero-content max-w-xl text-center flex-col">
            <h1 class="text-3xl">Selamat Datang di Halaman Pengaduan Masyarakat</h1>
            <a href="#form-aduan" class="btn btn-primary">Buat Aduan</a>
        </div>
    </header>
    <main class="max-w-4xl mx-auto my-4 p-4">
        <h2 class="mt-4 text-2xl" id="form-aduan">Formulir Pengaduan</h2>
        <p class="text-red-800">{{ $errors->first() }}</p>
        <form action="" enctype="multipart/form-data" method="post" class="flex flex-col gap-4 mt-4 p-4">
            @csrf
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="name" class="label"><span class="label-text">Nama</span></label>
                <input type="text" name="name" id="name" class="input input-bordered md:w-96" maxlength="100"
                    required value="{{ old('name') }}">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="nik" class="label"><span class="label-text">NIK</span></label>
                <input type="text" name="nik" id="nik" class="input input-bordered md:w-96" required
                    value="{{ old('nik') }}">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="email" class="label"><span class="label-text">Email</span></label>
                <input type="email" name="email" id="email" class="input input-bordered md:w-96" required
                    value="{{ old('email') }}">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="phone" class="label"><span class="label-text">Nomor Handphone</span></label>
                <input type="text" name="phone" id="phone" class="input input-bordered md:w-96" maxlength="15"
                    required value="{{ old('phone') }}">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="report_msg" class="label"><span class="label-text">Aduan</span></label>
                <textarea name="report_msg" id="report_msg" class="textarea textarea-bordered md:w-96">{{ old('report_msg') }}</textarea>
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="report_img_1" class="label"><span class="label-text">Foto 1</span></label>
                <input type="file" name="report_img_1" id="report_img_1"
                    class="file-input file-input-bordered md:w-96">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="report_img_2" class="label"><span class="label-text">Foto 2</span></label>
                <input type="file" name="report_img_2" id="report_img_2"
                    class="file-input file-input-bordered md:w-96">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="report_img_3" class="label"><span class="label-text">Foto 3</span></label>
                <input type="file" name="report_img_3" id="report_img_3"
                    class="file-input file-input-bordered md:w-96">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="report_img_4" class="label"><span class="label-text">Foto 4</span></label>
                <input type="file" name="report_img_4" id="report_img_4"
                    class="file-input file-input-bordered md:w-96">
            </div>
            <div class="control-form flex flex-col md:flex-row justify-between max-w-xl">
                <label for="report_img_5" class="label"><span class="label-text">Foto 5</span></label>
                <input type="file" name="report_img_5" id="report_img_5"
                    class="file-input file-input-bordered md:w-96">
            </div>
            <div class="control-form flex justify-end max-w-xl">
                <input type="submit" value="Kirim" class="btn btn-primary">
            </div>
        </form>
    </main>
    @include('partials.footer')
</body>

</html>
