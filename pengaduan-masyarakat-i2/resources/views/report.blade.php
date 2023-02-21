<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | LADUKAT</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main class="max-w-5xl mx-auto p-4">
        <h1 class="text-2xl font-semibold inline"><a href="/search/?nik={{ $report->nik }}"><img
                    src="/assets/images/arrow_back_FILL0_wght400_GRAD0_opsz48.png"
                    class="inline w-8 h-8 hover:border-slate-800 " alt=""></a>Tinjau Aduan</h1>
        <div class="overflow-x-auto">
            <table class="mt-4 mx-auto min-w-[280px]">
                <tr>
                    <td class="w-32">ID Aduan</td>
                    <td>{{ $report->id }}</td>
                </tr>
                <tr>
                    <td>Tanggal Aduan</td>
                    <td><?php echo date('D, j M  Y, H:i:s', $report->report_timestamp); ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $report->status }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $report->name }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $report->nik }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $report->email }}</td>
                </tr>
                <tr>
                    <td>Nomor Handphone</td>
                    <td>{{ $report->phone }}</td>
                </tr>
                <tr>
                    <td>Aduan</td>
                    <td>{{ $report->report_msg }}</td>
                </tr>
                <tr>
                    <td>Foto 1</td>
                    @if ($report->report_img_1 == null)
                        <td class="text-red-800">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_1 }}" class="min-w-[420px]" alt="Foto 1"></td>
                    @endif
                </tr>
                <tr>
                    <td>Foto 2</td>
                    @if ($report->report_img_2 == null)
                        <td class="text-red-800">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_2 }}" alt="Foto 2"></td>
                    @endif
                </tr>
                <tr>
                    <td>Foto 3</td>
                    @if ($report->report_img_3 == null)
                        <td class="text-red-800">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_3 }}" alt="Foto 3"></td>
                    @endif
                </tr>
                <tr>
                    <td>Foto 4</td>
                    @if ($report->report_img_4 == null)
                        <td class="text-red-800">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_4 }}" alt="Foto 4"></td>
                    @endif
                </tr>
                <tr>
                    <td>Foto 5</td>
                    @if ($report->report_img_5 == null)
                        <td class="text-red-800">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_5 }}" alt="Foto 5"></td>
                    @endif
                </tr>
            </table>
        </div>
        <h2 class="text-2xl mt-2">Respon Aduan</h2>
        @if ($report->status == 'BARU')
            <p class="text-red-800 mt-2">Aduan belum direspon</p>
        @else
            <table>
            </table>
        @endif
    </main>
    @include('partials.footer')
</body>

</html>
