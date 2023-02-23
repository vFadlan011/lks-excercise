@extends('layouts.main')

@section('container')
    <main>
        <div class="hero min-h-screen">
            <div class="hero-content justify-start w-full flex-col md:flex-row-reverse">
                <div>
                    <img src="assets/images/11906661_4861019.jpg" alt="">
                </div>
                <div class="bg-slate-900 bg-opacity-10 p-8 rounded-xl text-slate-900 w-96">
                    <h1 class="text-5xl">LokerNet</h1>
                    <p>Jaringan lowongan pekerjaan pertama di Indonesia</p>
                    <a href="/vacancy" class="btn btn-primary mt-8 normal-case flex">
                        Lihat lowongan pekerjaan >
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
