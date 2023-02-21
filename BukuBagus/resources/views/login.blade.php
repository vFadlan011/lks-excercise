<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | BukuBagus</title>
  @vite('resources/css/app.css')
</head>

<body>
  <div class="hero min-h-screen bg-base-200"
    style="background-image: url(/assets/images/photo-1670203336942-d4e3f1f38f68.jpg)">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Login now!</h1>
        <p class="max-w-lg py-6">Login and share your opinions for every books around the world!</p>
      </div>
      <div class="card w-full max-w-sm flex-shrink-0 bg-base-100 shadow-2xl">
        <div class="card-body">
          <form action="" method="post">
            @csrf
            <h4 class="text-red-700">{{ $errors->first() }}</h4>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Username</span>
              </label>
              <input id="username" name="username" type="text" placeholder="username"
                class="input-bordered input" />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Password</span>
              </label>
              <input id="password" name="password" type="password" placeholder="password"
                class="input-bordered input" />
            </div>
            <div class="form-control">
              <label for="remember" class="label cursor-pointer justify-start">
                <input type="checkbox" name="remember" id="remember" class="checkbox checkbox-sm mr-4">
                <span class="label-text">Remember me</span>
              </label>
            </div>
            <div class="form-control mt-6">
              <button class="btn-primary btn">Login</button>
            </div>
            <p class="mt-4 text-sm">
              Don't have an account yet? <a href="/register" class="link-hover link-primary link">Register
                here!</a>
            </p>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
