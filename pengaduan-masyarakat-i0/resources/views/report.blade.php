<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="winter">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>LADUKAT</title>

  <!-- CSS -->
  <link rel="stylesheet" href="/build/assets/app-72ac7327.css">
  <style>
    html {
      scroll-behavior: smooth;
    }

    td {
      padding-top: 8px;
      padding-bottom: 8px;
      vertical-align: top;
    }
  </style>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <main class="max-w-4xl mx-auto my-16 p-4">
    <h1 class="text-4xl">Detail Aduan</h1>
    <div class="overflow-x-auto mt-8">
      <table id="aduan">
        <tr>
          <td class="w-48 min-w-[120px]">ID Aduan</td>
          <td class="w-3/4 min-w-[360px]">{{$report->id}}</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>{{$report->name}}</td>
        </tr>
        <tr>
          <td>E-Mail</td>
          <td>{{$report->email}}</td>
        </tr>
        <tr>
          <td>Tanggal Aduan</td>
          <td>{{date('D, j M o, H:i:s',$report->report_timestamp)}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>{{$report->status}}</td>
        </tr>
        <tr>
          <td>Aduan</td>
          <td>{{$report->report_msg}}</td>
        </tr>
        <tr>
          <td>Foto 1</td>
          <td>
            <img src="/storage/{{$report->report_img1}}" alt="Foto 1">
          </td>
        </tr>
        <tr>
          <td>Foto 2</td>
          <td>
            @if($report->report_img2!=null)
            <img src="/storage/{{$report->report_img2}}" alt="Foto 2">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
        <tr>
          <td>Foto 3</td>
          <td>
            @if($report->report_img3!=null)
            <img src="/storage/{{$report->report_img3}}" alt="Foto 3">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
        <tr>
          <td>Foto 4</td>
          <td>
            @if($report->report_img4!=null)
            <img src="/storage/{{$report->report_img4}}" alt="Foto 4">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
        <tr>
          <td>Foto 5</td>
          <td>
            @if($report->report_img5!=null)
            <img src="/storage/{{$report->report_img5}}" alt="Foto 5">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
      </table>
    </div>
    <h2 class="text-2xl mt-4">Respon</h2>
    @if($report->status=="BARU")
    <h4 class="text-red-700">Aduan belum direspon</h4>
    @else
    <div class="overflow-x-auto mt-8">
      <table id="respon">
        <tr>
          <td class="w-48 min-w-[120px] align-text-top">Responden</td>
          <td class="w-3/4 min-w-[360px]">{{$respondent}}</td>
        </tr>
        <tr>
          <td>Tanggal Respon</td>
          <td>{{date('D, j M o, H:i:s',$report->response_timestamp)}}</td>
        </tr>
        <tr>
          <td>Tanggapan</td>
          <td>{{$report->response_msg}}</td>
        </tr>
        <tr>
          <td>Foto 1</td>
          <td>
            @if($report->response_img1!=null)
            <img src="/storage/{{$report->response_img1}}" alt="Foto 1">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
        <tr>
          <td>Foto 2</td>
          <td>
            @if($report->response_img2!=null)
            <img src="/storage/{{$report->response_img2}}" alt="Foto 2">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
        <tr>
          <td>Foto 3</td>
          <td>
            @if($report->response_img3!=null)
            <img src="/storage/{{$report->response_img3}}" alt="Foto 3">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
        <tr>
          <td>Foto 4</td>
          <td>
            @if($report->response_img4!=null)
            <img src="/storage/{{$report->response_img4}}" alt="Foto 4">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
        <tr>
          <td>Foto 5</td>
          <td>
            @if($report->response_img5!=null)
            <img src="/storage/{{$report->response_img5}}" alt="Foto 5">
            @else
            <p class="text-red-700">Tidak dilampirkan</p>
            @endif
          </td>
        </tr>
      </table>
    </div>
    @endif
  </main>
  @include("partials.footer")
</body>


</html>