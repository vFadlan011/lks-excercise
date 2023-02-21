<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="winter">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Search | LADUKAT</title>

  <!-- CSS -->
  <link rel="stylesheet" href="/build/assets/app-72ac7327.css">
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <header class="hero min-h-screen" style="background-image: url(/img/photo-1496307653780-42ee777d4833.jpg);">
    <div class="hero-overlay bg-opacity-5"></div>
    <div class="hero-content text-center text-neutral-content">
      <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold text-slate-900">Halo,</h1>
        <p class="mb-5 text-3xl text-slate-800">Halaman Pencarian Aduan</p>
        <form action="" method="get" class="flex justify-betweens">
          <input type="text" id="nik" name="nik" placeholder="Masukkan NIK atau nomor KTP" class="input input-bordered w-full text-slate-600 max-w-xs mr-4" />
          <input type="submit" id="submit" value="Cari" class="btn btn-primary">
        </form>
      </div>
    </div>
    <div class="h-12 w-full bg-gradient-to-b from-transparent to-white bottom-0 absolute"></div>
  </header>
  <main class="max-w-3xl mx-auto my-32">


    <div class="overflow-x-auto">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>id</th>
            <th>Nama</th>
            <th>Aduan</th>
            <th>Status</th>
            <th>Respon</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($results as $result)
          <tr>
            <th>{{$result->id}}</th>
            <td>{{$result->name}}</td>
            <td style="overflow: hidden; word-break: break-all; overflow-wrap: break-word; max-width: 360px;">{{ \Illuminate\Support\Str::limit($result->report_msg, 150, $end='...') }}</td>
            <td>{{$result->status}}</td>
            @if($result->response_msg==NULL)
            <td class="italic text-red-700">(Belum direspon)</td>
            @else
            <td>{{$result->response_msg}}</td>
            @endif
            <th><a href="/search/{{$result->id}}" class="link link-primary">detail</a></th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
  @include("partials.footer")
</body>


</html>