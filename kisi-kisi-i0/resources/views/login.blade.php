@extends('layouts.main')

@section('container')
    <main class="max-w-4xl mx-auto">
        <div class="hero">
            <div class="hero-content flex-col md:flex-row-reverse">
                <h1 class="text-4xl">Login</h1>
                <form action="" method="post" class="p-8">
                    <p class="text-red-800">{{ $errors->first() }}</p>
                    @csrf
                    <div class="control-form">
                        <label for="username" class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" name="username" id="username" class="input input-bordered" required>
                    </div>
                    <div class="control-form">
                        <label for="password" class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" id="password" class="input input-bordered" required>
                    </div>
                    <div class="control-form justify-start flex">
                        <label for="remember" class="label">
                            <input type="checkbox" name="remember" id="remember" class="checkbox checkbox-sm">
                            <span class="label-text ml-2">Remember me</span>
                        </label>
                    </div>
                    <div class="control-form">
                        <input type="submit" value="Login" class="btn btn-primary w-full">
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
