<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
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
    <main class="max-w-6xl mx-auto mt-4 p-2">
        <h1 class="text-2xl">Dashboard Admin</h1>
        <p>Daftar aduan masyarakat yang belum direspon, diurutkan dari yang terbaru.</p>
        <div id="filter" class="mt-4 max-w-[768px] mx-auto">
            <form action="" method="get">
                <div class="form-control flex-row justify-between max-w-xs">
                    <label for="show">Tampilkan</label>
                    <select name="show" id="show" class="input input-sm input-bordered w-36"
                        onchange="this.form.submit()">
                        <option value="all" {{ $show == 'all' ? 'selected' : '' }}>Semua aduan</option>
                        <option value="BARU" {{ $show == 'BARU' ? 'selected' : '' }}>Aduan baru</option>
                        <option value="DIPROSES" {{ $show == 'DIPROSES' ? 'selected' : '' }}>Aduan diproses
                        </option>
                        <option value="DITOLAK" {{ $show == 'DITOLAK' ? 'selected' : '' }}>Aduan ditolak
                        </option>
                        <option value="SELESAI" {{ $show == 'SELESAI' ? 'selected' : '' }}>Aduan selesai
                        </option>
                    </select>
                </div>
            </form>
        </div>
        <div class="overflow-x-auto max-w-7xl mx-auto mt-4">
            <table class="table min-w-[768px] mx-auto">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Aduan</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 0; ?>
                    @foreach ($reports as $report)
                        <tr>
                            <th>{{ ++$counter }}</th>
                            <td>{{ $report->name }}</td>
                            <td>{{ date('D, j M  Y, H:i:s', $report->report_timestamp) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($report->report_msg, 20, $ends = '...') }}</td>
                            <td>{{ $report->status }}</td>
                            @if ($report->status == 'BARU')
                                <td><a href="/admin/{{ $report->id }}" class="link">Respon</a></td>
                            @else
                                <td><a href="/admin/{{ $report->id }}" class="link">Edit respon</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $reports->links() }}
        </div>
    </main>
</body>

</html>
