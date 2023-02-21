<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <main class="hero min-h-screen" style="background-image: url('assets/images/photo-1670203336942-d4e3f1f38f68.jpg')">
        <div class="hero-content flex flex-col md:flex-row-reverse">
            <h1 class="text-3xl font-semibold">Login sebagai admin</h1>
            <div class="card bg-base-100 p-4">
                <form action="" method="post">
                    @csrf
                    <div class="form-control">
                        <p class="text-red-700">{{ $errors->first() }}</p>
                        <label for="username" class="label"><span class="label-text">Username</span></label>
                        <input type="text" name="username" id="username" class="input input-bordered">
                    </div>
                    <div class="form-control">
                        <label for="password" class="label"><span class="label-text">Password</span></label>
                        <input type="password" name="password" id="password" class="input input-bordered">
                    </div>
                    <div class="form-control">
                        <label for="remember" class="label max-w-[144px]">
                            <input type="checkbox" name="remember" id="remember" class="checkbox checkbox-xs">
                            <span class="label-text">Remember me</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>
