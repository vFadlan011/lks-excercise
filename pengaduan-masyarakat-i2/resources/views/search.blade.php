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
    <header class="hero min-h-screen"
        style="background-image: url('/assets/images/photo-1670203336942-d4e3f1f38f68.jpg')">
        <div class="hero-content max-w-xl text-center flex-col">
            <h1 class="text-3xl">Selamat Datang di Halaman Pengaduan Masyarakat</h1>
            <p>Cari aduan Anda di sini</p>
            <form action="" method="get">
                <input type="text" name="nik" id="nik" class="input input-bordered" placeholder="NIK"
                    minlength="16" maxlength="16">
                <input type="submit" value="Cari" class="btn btn-primary">
            </form>
        </div>
    </header>
    <main class="max-w-4xl mx-auto my-4 p-4">
        <h2 class="mt-4 text-2xl" id="search-results">Hasil
            Pencarian
        </h2>
        <p class="text-red-800">{{ $errors->first() }}</p>
        <div class="overflow-x-auto mt-2">
            <table class="table min-w-[480px] mx-auto">
                <thead>
                    <tr>
                        <th></th>
                        <th>Aduan</th>
                        <th>Status</th>
                        <th>Respon</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    @foreach ($reports as $report)
                        <tr>
                            <th>{{ $counter }}</th>
                            <td>{{ \Illuminate\Support\Str::limit($report->report_msg, 60, $ends = '...') }}</td>
                            <td>{{ $report->status }}</td>
                            @if ($report->status == 'BARU')
                                <td class="text-red-800">(Belum direspon)</td>
                            @else
                                <td>{{ \Illuminate\Support\Str::limit($report->response_msg, 60, $ends = '...') }}</td>
                            @endif
                            <td><a href="/search/{{ $report->id }}" class="link link-primary">Lihat</a></td>
                        </tr>
                        <?php $counter++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
