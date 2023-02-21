@extends("layouts.admin")

@section("container")
<div class="w-full px-16 my-12">
  <h1 class="text-3xl font-semibold">Data Aduan Masyarakat</h1>
  <p class="text-lg my-3">Data aduan masyarakat, diurutkan dari aduan terlama.</p>
  <div class="overflow-x-auto">
    <table class="table">
      <!-- head -->
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>No. HP</th>
          <th>Aduan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($results as $result)
        <tr>
          <th>{{$result->id}}</th>
          <td>{{$result->name}}</td>
          <td>{{date('D, j M o, H:i:s',$result->report_timestamp)}}</td>
          <td>{{$result->phone}}</td>
          <td class="w-12">{{ \Illuminate\Support\Str::limit($result->report_msg, 70, $end='...') }}</td>
          <td><a href="/admin/reports/{{$result->id}}" class="link link-primary">Reply</a></td>
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