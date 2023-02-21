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
    <div class="bg-slate-300">
        <nav class="navbar justify-between max-w-6xl mx-auto">
            <a class="profile" href="#">
                <img src="/assets/images/account_circle_FILL0_wght400_GRAD0_opsz48.png">
                <p class="pl-2">{{ $username }}</p>
            </a>
            <a href="/logout" class="link underline" onclick="return confirm('Yakin logout?')">Logout</a>
        </nav>
    </div>
    <main class="max-w-5xl mx-auto p-4">
        <h1 class="text-2xl font-semibold inline"><a href="{{ url()->previous() }}"><img
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
        <p class="text-red-800">{{ $errors->first() }}</p>
        <form action="" method="post" class="flex flex-col gap-4 mt-4" enctype="multipart/form-data">
            @csrf
            <div class="form-control flex flex-col md:flex-row justify-between max-w-xl">
                <label for="status" class="label"><span class="label-text">Status</span></label>
                <select name="status" id="status" class="input input-bordered md:w-96">
                    <option value="BARU" disabled selected>BARU</option>
                    <option value="DIPROSES"
                        {{ old('status') == 'DIPROSES' || $report->status == 'DIPROSES' ? 'selected' : '' }}>DIPROSES
                    </option>
                    <option value="DITOLAK"
                        {{ old('status') == 'DITOLAK' || $report->status == 'DITOLAK' ? 'selected' : '' }}>DITOLAK
                    </option>
                    <option value="SELESAI"
                        {{ old('status') == 'SELESAI' || $report->status == 'SELESAI' ? 'selected' : '' }}>SELESAI
                    </option>
                </select>
            </div>
            <div class="form-control flex flex-col md:flex-row justify-between max-w-xl">
                <label for="response_msg" class="label"><span class="label-text">Respon</span></label>
                <textarea name="response_msg" id="response_msg" class="textarea textarea-bordered md:w-96">{{ old('response_msg') == null ? $report->response_msg : old('response_msg') }}</textarea>
            </div>

            <div class="form-control flex flex-col md:flex-row justify-start max-w-4xl">
                <label for="response_img_1" class="label min-w-[192px]"><span class="label-text">Foto 1</span></label>
                <div>
                    @if ($report->response_img_1 != null)
                        <img src="/storage/{{ $report->response_img_1 }}" alt="Foto 1" class="md:w-[640px]">
                    @endif
                    <input type="file" name="response_img_1" id="response_img_1"
                        class="file-input file-input-bordered w-full md:w-96 mt-2" />
                </div>
            </div>

            <div class="form-control flex flex-col md:flex-row justify-start max-w-4xl">
                <label for="response_img_2" class="label min-w-[192px]"><span class="label-text">Foto 2</span></label>
                <div>
                    @if ($report->response_img_2 != null)
                        <img src="/storage/{{ $report->response_img_2 }}" alt="Foto 2" class="md:w-[640px]">
                    @endif
                    <input type="file" name="response_img_2" id="response_img_2"
                        class="file-input file-input-bordered w-full md:w-96 mt-2" />
                </div>
            </div>
            <div class="form-control flex flex-col md:flex-row justify-start max-w-4xl">
                <label for="response_img_3" class="label min-w-[192px]"><span class="label-text">Foto 3</span></label>
                <div>
                    @if ($report->response_img_3 != null)
                        <img src="/storage/{{ $report->response_img_3 }}" alt="Foto 3" class="md:w-[640px]">
                    @endif
                    <input type="file" name="response_img_3" id="response_img_3"
                        class="file-input file-input-bordered w-full md:w-96 mt-2" />
                </div>
            </div>
            <div class="form-control flex flex-col md:flex-row justify-start max-w-4xl">
                <label for="response_img_4" class="label min-w-[192px]"><span class="label-text">Foto 4</span></label>
                <div>
                    @if ($report->response_img_4 != null)
                        <img src="/storage/{{ $report->response_img_4 }}" alt="Foto 4" class="md:w-[640px]">
                    @endif
                    <input type="file" name="response_img_4" id="response_img_4"
                        class="file-input file-input-bordered w-full md:w-96 mt-2" />
                </div>
            </div>
            <div class="form-control flex flex-col md:flex-row justify-start max-w-4xl">
                <label for="response_img_5" class="label min-w-[192px]"><span class="label-text">Foto
                        5</span></label>
                <div>
                    @if ($report->response_img_5 != null)
                        <img src="/storage/{{ $report->response_img_5 }}" alt="Foto 5" class="md:w-[640px]">
                    @endif
                    <input type="file" name="response_img_5" id="response_img_5"
                        class="file-input file-input-bordered w-full md:w-96 mt-2" />
                </div>
            </div>


            <div class="flex justify-end max-w-xl">
                <input type="submit" value="Simpan" class="btn btn-primary normal-case">
            </div>
        </form>
    </main>
</body>

</html>
