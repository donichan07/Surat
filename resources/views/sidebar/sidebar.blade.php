<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu Utama</span>
                </li>
                @if (auth()->user()->role_name === 'Super Admin')
                <li class="{{ set_active(['contact_information.index']) }}">
                    <a href="{{ route('contact_information.index') }}">
                        <i class="fas fa-cog"></i> 
                        <span>Pengaturan</span>
                    </a>
                </li>
                
                @endif
                <li class="submenu {{set_active(['home','teacher/dashboard','student/dashboard'])}}">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        
                        <li><a href="{{ route('home') }}" class="{{set_active(['home'])}}"><i class="fas fa-home"></i>Tata Usaha</a></li>
                       
                        <li><a href="{{ route('teacher/dashboard') }}" class="{{set_active(['teacher/dashboard'])}}"><i class="fas fa-home"></i>Kepala Sekolah</a></li>
                       
                        <li><a href="{{ route('student/dashboard') }}" class="{{set_active(['student/dashboard'])}}"><i class="fas fa-home"></i>Siswa</a></li>
                    
                    </ul>
                </li>
                @if (auth()->user()->role_name === 'Super Admin')
                <li class="submenu {{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#">

                        <i class="fas fa-shield-alt"></i>
                        <span>Manajemen Pengguna</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('list/users') }}" class="{{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">Daftar Pengguna</a></li>
                    </ul>
                </li>
                @endif
                @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin' || auth()->user()->role_name === 'Teacher')
                <li class="submenu {{ set_active(['inbox.index', 'inbox.create']) }} {{ (request()->is('inbox/edit/*')) ? 'active' : '' }}">
    <a href="#"><i class="fas fa-envelope"></i>
        <span>Surat Masuk</span>
        <span class="menu-arrow"></span>
    </a>
    <ul>
        <li><a href="{{ route('inbox.index') }}" class="{{ set_active(['inbox.index']) }}">Daftar Surat Masuk</a></li>
        @if (auth()->user()->role_name === 'Super Admin')
        <li><a href="{{ route('inbox.create') }}" class="{{ set_active(['inbox.create']) }}">Tambah Surat</a></li>
        @endif
    </ul>
</li>

                @endif
                @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin')
                <li class="submenu  {{set_active(['teacher/add/page','teacher/list/page','teacher/grid/page','teacher/edit'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-envelope-open"></i>
                        <span>Surat Keluar</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('teacher/list/page') }}" class="{{set_active(['teacher/list/page','teacher/grid/page'])}}">Daftar Guru</a></li>
                        <li><a href="{{ route('lessons.index') }}" class="{{ request()->is('lessons*') ? 'active' : '' }}">Daftar Jadwal</a></li>
                        @if (auth()->user()->role_name === 'Super Admin')
                        <li><a href="{{ route('teacher/add/page') }}" class="{{set_active(['teacher/add/page'])}}">Tambah Data Guru</a></li>
                        @endif
                    </ul>
                </li>

                @endif
                @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin')
                <li class="submenu {{set_active(['subject/list/page','subject/add/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-file-alt"></i>
                        <span>Pengajuan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['subject/list/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}" href="{{ route('subject/list/page') }}">Daftar Mata Pelajaran</a></li>
                        @if (auth()->user()->role_name === 'Super Admin')
                        <li><a class="{{set_active(['subject/add/page'])}}" href="{{ route('subject/add/page') }}">Tambah Mata Pelajaran</a></li>
                        <li><a href="{{ route('classes.create') }}">Tambah Kelas Baru</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                
            </ul>
        </div>
    </div>
</div>
