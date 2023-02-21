<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ ucFirst($title) }} | BukuBagus</title>
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
  @vite('resources/css/app.css')
  @stack('style')
</head>

<body>
  <nav class="bg-blue-900">
    <div class="navbar mx-auto max-w-screen-xl">
      <div class="flex-1">
        <a class="btn-ghost btn text-xl normal-case text-base-200" href="/">BukuBagus</a>
      </div>
      <div class="flex-none gap-2">
        <ul class="menu text-base-200">
          <li>
            <a href="/book/create" class="md rounded-lg hover:bg-blue-800">Tambah buku baru</a>
          </li>
        </ul>
        <div class="dropdown-end dropdown">
          <label tabindex="0" class="btn-ghost btn-circle avatar btn hover:bg-blue-800">
            <div class="w-10 rounded-full">
              <img src="/assets/images/account_circle_FILL0_wght400_GRAD0_opsz48.png" class="invert" />
            </div>
          </label>
          <ul tabindex="0" class="dropdown-content menu rounded-box menu-compact mt-3 w-52 bg-base-100 p-2 shadow">
            <li><a href="/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <main class="mx-auto max-w-screen-xl p-8">
    @yield('container')
  </main>
  @stack('other')
</body>

</html>
