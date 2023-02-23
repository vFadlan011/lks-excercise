<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <x-head.tinymce-config />
</head>

<body>
    <div class="drawer drawer-mobile">
        <input type="checkbox" name="drawer" id="drawer" class="drawer-toggle">
        <div class="drawer-content bg-base-100">
            <label for="drawer" class="lg:hidden drawer-button absolute top-2 left-2">
                <img src="/assets/icons/menu.svg" alt="">
            </label>
            <main class="max-w-7xl p-8 mx-auto">
                @yield('container')
            </main>
        </div>
        <div class="drawer-side bg-base-200">
            <label for="drawer" class="drawer-overlay"></label>
            <ul class="menu p-4 gap-2 w-72 bg-base-200">
                <li>
                    <a href="/admin" class="p-2 {{ $title == 'Dashboard' ? 'bg-blue-100' : '' }}">Dashboard</a>
                </li>
                <li><a href="/admin/company"
                        class="p-2 {{ $title == 'Daftar Perusahaan' ? 'bg-blue-100' : '' }}">Perusahaan</a></li>
                <li><a href="/admin/vacancy"
                        class="p-2 {{ $title == 'Daftar Lowongan Pekerjaan' ? 'bg-blue-100' : '' }}">Lowongan
                        Pekerjaan</a></li>
                <li><a href="/admin/category"
                        class="p-2 {{ $title == 'Daftar Kategori Pekerjaan' ? 'bg-blue-100' : '' }}">Kategori
                        Pekerjaan</a></li>
                <li><a href="/logout" onclick="return confirm('Yakin logout?')">Logout</a></li>
            </ul>
        </div>
    </div>
</body>

</html>
