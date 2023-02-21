<div class="w-full bg-base-200 pb-8">
    <footer class="footer max-w-5xl mx-auto p-2 text-base-content">
        <div class="">
            <span class="footer-title text-slate-800">Halaman</span>
            <a href="{{ $title == 'Home' ? '#' : '/' }}" class="link link-hover">Home</a>
            <a href="{{ $title == 'Cari Aduan' ? '#' : '/search' }}">Cari Aduan</a>
            <a href="{{ $title == 'Login' ? '#' : '/login' }}">Login (khusus admin)</a>
        </div>
    </footer>
</div>
