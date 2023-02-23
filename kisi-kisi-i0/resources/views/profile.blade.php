@extends('layouts.main')

@section('container')
    <main class="max-w-4xl mx-auto">
        <div class="card p-8">
            <h1 class="text-4xl">{{ $profile['username'] }}</h1>
            <p>{{ $profile['name'] }}</p>
            <p>Tanggal lahir: {{ date('D, d M Y', $profile['birthdate']) }}</p>
            <p><?= $profile['description'] ?></p>
        </div>
    </main>
@endsection
