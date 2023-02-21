<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="winter">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>

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
  <main>
    <div class="hero min-h-screen bg-base-200" style="background-image: url(/img/photo-1496307653780-42ee777d4833.jpg);">
      <div class="hero-content flex-col lg:flex-row-reverse max-w-4xl">
        <div class="text-center lg:text-left">
          <h1 class="text-5xl font-bold">Login sebagai admin!</h1>
        </div>
        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
          <div class="card-body">

            <form action="/login" method="post">
              @csrf

              @if($errors->any())
              <h4 class="text-red-800">{{$errors->first()}}</h4>
              @endif

              <div class="form-control">
                <label class="label">
                  <span class="label-text">Username</span>
                </label>
                <input id="username" name="username" type="text" placeholder="username" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label" for="password">
                  <span class="label-text">Password</span>
                </label>
                <input id="password" name="password" type="password" placeholder="password" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label cursor-pointer justify-start">
                  <input id="remember" name="remember" type="checkbox" checked="checked" class="checkbox checkbox-sm mr-4" />
                  <span class="label-text">Remember me</span>
                </label>
              </div>
              <div class="form-control mt-2">
                <button class="btn btn-primary">Login</button>
              </div>
            </form>

          </div>
        </div>
      </div>
      <div class="h-12 w-full bg-gradient-to-b from-transparent to-base-200 bottom-0 absolute"></div>
    </div>
  </main>

  @include("partials.footer")
</body>

</html>
