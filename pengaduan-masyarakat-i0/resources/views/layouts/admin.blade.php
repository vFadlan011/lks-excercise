<?php

use Illuminate\Support\Facades\Auth;
?>

<!DOCTYPE html data-theme="winter">
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ucfirst($title)}} | LADUKAT</title>
  <link rel="stylesheet" href="/build/assets/app-72ac7327.css">
  @stack('style')
</head>

<body>
  <div class="drawer drawer-mobile">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />

    <div class="drawer-content flex flex-col items-center bg-slate-100">
      <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden top-4 left-4 absolute p-0 w-10 h-6">
        <img src="/img/menu_icon.svg" alt="menu" class="invert w-6 h-7 m-1">
      </label>
      <!-- Page content here -->
      @yield("container")
    </div>

    <div class="drawer-side">
      <label for="my-drawer-2" class="drawer-overlay"></label>
      <ul class="menu p-4 w-80 bg-base-100 text-slate-800 text-">
        <!-- Sidebar content here -->
        <li class="mb-4">
          <div class="dropdown">
            <label tabindex="0" class="flex justify-between items-center w-full">
              <img src="/img/user.png" alt="User Avatar" class="w-10 h-10 text-slate-800">
              <p class="text-2xl font-semibold">{{Auth::user()["username"]}}</p>
            </label>

            <ul tabindex="0" class="dropdown-content menu shadow bg-base-100 rounded-box w-52 p-2 left-24 top-6 absolute">
              <li><a href="/logout">Logout</a></li>
            </ul>
          </div>
        </li>

        <li class="">
          <a class="font-semibold bg-base-100" href="/admin">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-8 w-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"></path>
            </svg>
            Dashboard
            @if($title=="dashboard")
            <span class="absolute inset-y-0 left-0 w-1 rounded-md bg-primary " aria-hidden="true"></span>
            @endif
          </a>
        </li>
        <li class="menu-title">
          <span>Data</span>
        </li>
        <li>
          <a href="/admin/reports">Data Aduan
            @if($title=="reports")
            <span class="absolute inset-y-0 left-0 w-1 rounded-md bg-primary " aria-hidden="true"></span>
            @endif
          </a>
        </li>
        <li>
          <a href="/admin/responses">Data Respon
            @if($title=="responses")
            <span class="absolute inset-y-0 left-0 w-1 rounded-md bg-primary " aria-hidden="true"></span>
            @endif
          </a>
        </li>


      </ul>

    </div>
  </div>
</body>

</html>