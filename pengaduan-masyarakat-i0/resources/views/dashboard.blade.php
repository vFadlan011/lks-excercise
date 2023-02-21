@extends("layouts.admin")

@section("container")
<div class="w-full px-16 my-12">
  <h1 class="text-3xl font-semibold">Dashboard LADUKAT (Layanan Pengaduan Masyarakat)</h1>
</div>
<div class="stats shadow">
  <!-- 
    Total aduan
    Aduan selesai
    Aduan diproses
    Aduan baru
   -->

  <div class="stat">
    <div class="stat-title">Total aduan</div>
    <div class="stat-value text-primary">{{$totalReports}}</div>
  </div>

  <div class="stat">
    <div class="stat-title">Aduan selesai</div>
    <div class="stat-value text-secondary">{{$finishedReports}}</div>
  </div>

  <div class="stat">
    <div class="stat-title">Aduan dalam proses</div>
    <div class="stat-value">{{$onProgressReports}}</div>
  </div>

  <div class="stat">
    <div class="stat-title">Aduan baru</div>
    <div class="stat-value">{{$newReports}}</div>
  </div>

</div>
@endsection