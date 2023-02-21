<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register | BukuBagus</title>
  @vite('resources/css/app.css')
</head>
<body>
  <div class="hero min-h-screen bg-base-200" style="background-image: url(/assets/images/photo-1670203336942-d4e3f1f38f68.jpg)">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl font-bold">Let's get started!</h1>
      <p class="py-6 max-w-lg">Register and share your opinions for books around the world!</p>
    </div>
    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
      <div class="card-body">
        <form action="" method="post">
          @csrf
          <h4 class="text-red-700">{{$errors->first()}}</h4>
          <div class="form-control">
            <label for="first_name" class="label">
              <span class="label-text">First Name</span>
            </label>
            <input id="first_name" name="first_name" type="text" placeholder="first name" class="input input-bordered" required />
          </div>
          <div class="form-control">
            <label for="last_name" class="label">
              <span class="label-text">Last Name</span>
            </label>
            <input id="last_name" name="last_name" type="text" placeholder="last name" class="input input-bordered" required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Username</span>
            </label>
            <input id="username" name="username" type="text" placeholder="username" class="input input-bordered" required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input id="password" name="password" type="password" placeholder="password" class="input input-bordered"  required/>
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary">Login</button>
          </div>
          <p class="text-sm mt-4">
            Already have an account yet? <a href="/login" class="link link-primary link-hover">Login here!</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>