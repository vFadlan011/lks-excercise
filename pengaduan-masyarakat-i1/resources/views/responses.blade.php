@extends('layouts.admin')

@section('container')
    <h1 class="text-2xl">Daftar Respon Aduan Masyarakat</h1>
    <p class="mt-2">Daftar aduan masyarakat yang sudah direspon oleh Anda, diurutkan dari yang terbaru</p>
    <div class="overflow-x-auto mt-2">
        <table class="table mx-auto min-w-[480px]">
            <thead>
                <tr>
                    <th></th>
                    <th>Aduan</th>
                    <th>Tanggal Aduan</th>
                    <th>Respon</th>
                    <th>Tanggal Respon</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $report)
                    <tr>
                        <th>{{ $report->id }}</th>
                        <td>{{ \Illuminate\Support\Str::limit($report->report_msg, 60, $end = '...') }}</td>
                        <td>{{ date('D, j M o, H:m:s', $report->report_timestamp) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($report->response_msg, 60, $end = '...') }}</td>
                        <td>{{ date('D, j M o, H:m:s', $report->response_timestamp) }}</td>
                        <td>{{ $report->status }}</td>
                        <td><a href="/admin/reports/{{ $report->id }}" class="link link-hover link-primary">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="max-w-[480px] mx-auto">{{ $results->links() }}</div>
    </div>
@endsection
