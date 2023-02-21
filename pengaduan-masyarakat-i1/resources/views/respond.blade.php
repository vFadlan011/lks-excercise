@extends('layouts.admin')

@section('container')
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
                <td>Email</td>
                <td>{{ $report->email }}</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>{{ $report->phone }}</td>
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
    <h4 class="text-red-700">{{ $errors->first() }}</h4>
    <form action="" method="post" enctype="multipart/form-data" class="max-w-xl mt-4 ml-4 flex flex-col gap-2">
        @csrf
        <div class="control-form flex flex-col md:flex-row justify-between">
            <label for="status" class="label"><span class="label-text">Status</span></label>
            <select name="status" id="status" class="select select-bordered md:w-96" required>
                <option disabled {{ $report->status == 'BARU' ? 'selected' : '' }}>BARU</option>
                <option {{ $report->status == 'FIPROSES' ? 'selected' : '' }}>DIPROSES</option>
                <option {{ $report->status == 'DITOLAK' ? 'selected' : '' }}>DITOLAK</option>
                <option {{ $report->status == 'SELESAI' ? 'selected' : '' }}>SELESAI</option>
            </select>
        </div>
        <div class="control-form flex flex-col md:flex-row justify-between items-start">
            <label for="response_msg" class="label"><span class="label-text">Respon</span></label>
            <textarea name="response_msg" id="response_msg" class="textarea textarea-bordered w-full md:w-96" required>{{ old('response_msg') == null ? $report->response_msg : old('response_msg') }}</textarea>
        </div>
        <div class="control-form flex flex-col md:flex-row justify-between">
            <label for="response_img_1" class="label"><span class="label-text">Foto 1</span></label>
            <input type="file" name="response_img_1" id="response_img_1"
                class="file-input file-input-bordered md:w-96" />
        </div>
        <div class="control-form flex flex-col md:flex-row justify-between">
            <label for="response_img_2" class="label"><span class="label-text">Foto 1</span></label>
            <input type="file" name="response_img_2" id="response_img_2"
                class="file-input file-input-bordered md:w-96" />
        </div>
        <div class="control-form flex flex-col md:flex-row justify-between">
            <label for="response_img_3" class="label"><span class="label-text">Foto 1</span></label>
            <input type="file" name="response_img_3" id="response_img_3"
                class="file-input file-input-bordered md:w-96" />
        </div>
        <div class="control-form flex flex-col md:flex-row justify-between">
            <label for="response_img_4" class="label"><span class="label-text">Foto 1</span></label>
            <input type="file" name="response_img_4" id="response_img_4"
                class="file-input file-input-bordered md:w-96" />
        </div>
        <div class="control-form flex flex-col md:flex-row justify-between">
            <label for="response_img_5" class="label"><span class="label-text">Foto 1</span></label>
            <input type="file" name="response_img_5" id="response_img_5"
                class="file-input file-input-bordered md:w-96" />
        </div>
        <div class="control-form flex flex-col md:flex-row justify-end">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Simpan" />
        </div>
    </form>
@endsection
