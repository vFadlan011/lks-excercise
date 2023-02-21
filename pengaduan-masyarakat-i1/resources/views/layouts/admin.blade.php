<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucFirst($title) }} | LADUKAT</title>
    @vite('resources/css/app.css')
    <style>
        .menu li {
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <div class="drawer drawer-mobile">
        <input type="checkbox" name="drawer" id="drawer" class="drawer-toggle">
        <div class="drawer-content p-4">
            <label for="drawer" class="btn lg:hidden drawer-button p-2"><img
                    src="/assets/images/menu_FILL0_wght500_GRAD0_opsz40.png" class="invert w-8" alt=""></label>
            <main class="mx-auto max-w-5xl">
                @yield('container')
            </main>
        </div>
        <div class="drawer-side">
            <label for="drawer" class="drawer-overlay"></label>
            <ul class="menu p-4 w-52 text-base-content bg-base-200">
                <li>
                    <a class="flex flex-row items-center justify-between" href="/admin">
                        {{ \Illuminate\Support\Facades\Auth::user()['username'] }}
                        <img src="/assets/images/account_circle_FILL0_wght400_GRAD0_opsz48.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="/admin/reports">Daftar Aduan</a>
                </li>
                <li>
                    <a href="/admin/responses">Daftar Respon</a>
                </li>
                <li>
                    <a href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>
