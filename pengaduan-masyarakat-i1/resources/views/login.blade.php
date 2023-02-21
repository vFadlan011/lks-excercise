<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="hero min-h-screen" style="background-image:  url('assets/images/photo-1670203336942-d4e3f1f38f68.jpg')">
        <div class="hero-content flex-col md:flex-row-reverse md:justify-between md:w-1/2">
            <h1 class="text-4xl font-semibold">Login sebagai admin</h1>
            <div class="card w-96 bg-base-100 rounded-md p-4 text-lg">
                <h4 class="text-sm text-red-700">{{ $errors->first() }}</h4>
                <form action="" method="post">
                    @csrf
                    <div class="control-form">
                        <label for="username" class="label"><span class="label-text">Username</span></label>
                        <input type="text" name="username" id="username" placeholder="username"
                            class="input input-md input-bordered w-full" value="{{ old('username') }}">
                    </div>
                    <div class="control-form">
                        <label for="password" class="label"><span class="label-text">Password</span></label>
                        <input type="password" name="password" id="password" placeholder="password"
                            class="input input-md input-bordered w-full">
                    </div>
                    <div class="control-form w-32">
                        <label for="remember" class="label">
                            <input type="checkbox" name="remmber" id="remember" class="checkbox checkbox-xs">
                            <span class="label-text">Remember Me</span>
                        </label>
                    </div>
                    <div class="control-form">
                        <input type="submit" value="Login" class="btn w-full mt-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
