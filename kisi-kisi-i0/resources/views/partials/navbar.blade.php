<div class="bg-indigo-900 text-base-300">
    <nav class="navbar max-w-7xl justify-between mx-auto">
        <a href="/">
            <img src="/assets/logo/logoipsum-248.svg" alt="Logo">
        </a>

        <div class="dropdown  dropdown-left">
            <label tabindex="0" class="btn btn-secondary">
                <img src="/assets/icons/menu.svg" alt="">
                <ul tabindex="0" class="dropdown-content menu bg-indigo-900 p-4 rounded-lg normal-case">
                    @if (Auth::user() == null)
                        <li><a class="hover:bg-indigo-800" href="{{ $title == 'Login' ? '#' : '/login' }}">Login</a>
                        </li>
                        <li><a class="hover:bg-indigo-800"
                                href="{{ $title == 'Registrasi' ? '#' : '/register' }}">Registrasi</a>
                        </li>
                    @else
                        <li><a class="hover:bg-indigo-800"
                                href="{{ $title == 'Profil Saya' ? '#' : '/profile' }}">Profil</a></li>
                        @if (Auth::user()['is_admin'] == 1)
                            <li><a class="hover:bg-indigo-800" href="/admin">Dashboard Admin</a></li>
                        @endif
                        <li><a class="hover:bg-indigo-800" href="/logout"
                                onclick="return confirm('Yakin logout?')">Logout</a></li>
                    @endif
                    <li><a class="hover:bg-indigo-800" href="{{ $title == 'Cari Loker' ? '#' : '/search' }}">Cari
                            Loker</a></li>
                    <li><a class="hover:bg-indigo-800" href="{{ $title == 'Daftar Loker' ? '#' : '/vacancy' }}">Daftar
                            Loker</a></li>
                    <li><a class="hover:bg-indigo-800"
                            href="{{ $title == 'Daftar Perusahaan' ? '#' : '/company' }}">Daftar Perusahaan</a></li>
                </ul>
            </label>
        </div>
    </nav>
</div>
