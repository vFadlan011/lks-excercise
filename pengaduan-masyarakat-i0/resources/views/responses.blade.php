<?php

use Illuminate\Support\Str;
?>
@extends("layouts.admin")

@section("container")
<div class="w-full px-16 my-12">
  <h1 class="text-3xl font-semibold">Data Respon Aduan</h1>
  <p class="text-lg my-3">Data aduan masyarakat yang sudah direspon oleh Anda, diurutkan dari tanggapan terbaru.</p>
  <div class="overflow-x-auto ">
    <table class="table">
      <!-- head -->
      <thead>
        <tr>
          <th>id</th>
          <th>Aduan</th>
          <th>Tanggal Pengaduan</th>
          <th>Respon</th>
          <th>Tanggal Respon</th>
          <td>Status</td>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($results as $result)
        <tr>
          <th>{{$result->id}}</th>
          <td>{{Str::limit($result->report_msg, 50, $end='...')}}</td>
          <td>{{date('D, j M o, H:i:s',$result->report_timestamp)}}</td>
          <td>{{Str::limit($result->response_msg, 50, $end='...')}}</td>
          <td>{{date('D, j M o, H:i:s',$result->response_timestamp)}}</td>
          <td>{{$result->status}}</td>
          <td><a href="/admin/reports/{{$result->id}}" class="link link-primary">Edit</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div id="pages" class="mt-3">
    {{ $results->onEachSide(1)->links() }}
  </div>
</div>
@endsection