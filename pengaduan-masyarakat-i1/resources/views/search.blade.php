<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cari Aduan | LADUKAT</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="hero min-h-screen" style="background-image: url('assets/images/photo-1670203336942-d4e3f1f38f68.jpg')">
        <div class="hero-content flex-col">
            <h1 class="text-4xl font-semibold text-slate-900">Halo, Selamat Datang!</h1>
            <p>Halaman Pencarian Aduan, cari aduan Anda di sini</p>
            <form action="" method="get" class="flex gap-2">
                @csrf
                <div class="control-form">
                    <input type="text" name="nik" id="nik" class="input input-md" maxlength="16" autofocus>
                </div>
                <div class="control-form">
                    <input type="submit" value="Cari" class="btn btn-primary">
                </div>
            </form>
        </div>
    </header>
    <main class="max-w-4xl p-4 mx-auto mt-4">
        <h2 class="text-2xl">Hasil Pencarian</h2>
        <div class="overflow-x-auto mt-4">
            <table class="table w-full">
                <thead>
                    <tr>
                        <td></td>
                        <td>Aduan</td>
                        <td>Respon</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $report)
                        <tr>
                            <th>{{ $report->id }}</th>
                            <td class="break-words">
                                {{ \Illuminate\Support\Str::limit($report->report_msg, 60, $end = '...') }}</td>
                            @if ($report->status == 'BARU')
                                <td class="text-red-700">(Belum direspon)</td>
                            @else
                                <td>{{ \Illuminate\Support\Str::limit($report->response_msg, 60, $end = '...') }}</td>
                            @endif
                            <td>{{ $report->status }}</td>
                            <td><a href="/search/{{ $report->id }}" class="link link-primary link-hover">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
