@extends('layouts.admin')

@section('container')
    <h1 class="text-4xl font-thin">Daftar Perusahaan</h1>
    <a href="/admin/company/add" class="flex bg-base-200 rounded-xl mt-4 p-2 max-w-[196px]">
        <img src="/assets/icons/add_circle_FILL0_wght400_GRAD0_opsz48.svg" class="w-8 h-8">
        <p class="ml-2">Tambah perusahaan</p>
    </a>
    <div class="mt-6 flex flex-wrap gap-4">
        @foreach ($companies as $company)
            <div class="card w-96 bg-base-200 p-4">
                <div class="logo">
                    <img src="/storage/{{ $company->logo }}" alt="">
                </div>
                <div class="desc">
                    <h4 class="text-xl">{{ $company->name }}</h4>
                    <a href="/admin/company/{{ $company->id }}" class="link link-primary">Lihat detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
