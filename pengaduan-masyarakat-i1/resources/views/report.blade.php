<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinjau Aduan</title>
    @vite('resources/css/app.css')
    <style>
        td {
            vertical-align: top;
        }
    </style>
</head>

<body>
    <main class="max-w-4xl mx-auto">
        <h1 class="mt-4 text-3xl p-4">Tinjau Aduan</h1>
        <div class="overflow-x-auto mt-2 p-4">
            <table>
                <tr>
                    <td style="min-width: 120px">Id Aduan</td>
                    <td style="min-width: 480px">{{ $report->id }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $report->name }}</td>
                </tr>
                <tr>
                    <td>Tanggal Aduan</td>
                    <td>{{ date('D, j M o, H:m:s', $report->report_timestamp) }}</td>
                </tr>
                <tr>
                    <td>Aduan</td>
                    <td>{{ $report->report_msg }}</td>
                </tr>
                <tr>
                    <td>Foto 1</td>
                    @if ($report->report_img_1 == null)
                        <td class="text-red-700">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_1 }}" alt="Foto 1"></td>
                    @endif
                </tr>
                <tr>
                    <td>Foto 2</td>
                    @if ($report->report_img_2 == null)
                        <td class="text-red-700">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_2 }}" alt="Foto 2"></td>
                    @endif
                </tr>
                <tr>
                    <td>Foto 3</td>
                    @if ($report->report_img_3 == null)
                        <td class="text-red-700">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_3 }}" alt="Foto 3"></td>
                    @endif
                </tr>
                <tr>
                    <td>Foto 4</td>
                    @if ($report->report_img_4 == null)
                        <td class="text-red-700">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_4 }}" alt="Foto 4"></td>
                    @endif
                </tr>
                <tr>
                    <td>Foto 5</td>
                    @if ($report->report_img_5 == null)
                        <td class="text-red-700">Tidak dilampirkan</td>
                    @else
                        <td><img src="/storage/{{ $report->report_img_5 }}" alt="Foto 5"></td>
                    @endif
                </tr>
            </table>
        </div>
        <h2 class="mt-4 text-2xl p-4">Respon Aduan</h2>
        @if ($report->status == 'BARU')
            <p class="text-red-700 p-4 pt-0">Aduan belum direspon</p>
        @else
            <div class="overflow-x-auto mt-2 p-4">
                <table>
                    <tr>
                        <td style="min-width: 120px">Responden</td>
                        <td style="min-width: 480px">{{ $respondent }}</td>
                    </tr>
                    <tr>
                        <td>Respon</td>
                        <td>{{ $report->response_msg }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Respon</td>
                        <td>{{ date('D, j M o, H:m:s', $report->response_timestamp) }}</td>
                    </tr>
                    <tr>
                        <td>Foto 1</td>
                        @if ($report->response_img_1 == null)
                            <td class="text-red-700">Tidak dilampirkan</td>
                        @else
                            <td><img src="/storage/{{ $report->response_img_1 }}" alt="Foto 1"></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Foto 2</td>
                        @if ($report->response_img_2 == null)
                            <td class="text-red-700">Tidak dilampirkan</td>
                        @else
                            <td><img src="/storage/{{ $report->response_img_2 }}" alt="Foto 2"></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Foto 3</td>
                        @if ($report->response_img_3 == null)
                            <td class="text-red-700">Tidak dilampirkan</td>
                        @else
                            <td><img src="/storage/{{ $report->response_img_3 }}" alt="Foto 3"></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Foto 4</td>
                        @if ($report->response_img_4 == null)
                            <td class="text-red-700">Tidak dilampirkan</td>
                        @else
                            <td><img src="/storage/{{ $report->response_img_4 }}" alt="Foto 4"></td>
                        @endif
                    </tr>
                    <tr>
                        <td>Foto 5</td>
                        @if ($report->response_img_5 == null)
                            <td class="text-red-700">Tidak dilampirkan</td>
                        @else
                            <td><img src="/storage/{{ $report->response_img_5 }}" alt="Foto 5"></td>
                        @endif
                    </tr>
                </table>
            </div>
        @endif
    </main>
</body>

</html>
