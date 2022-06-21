<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="/images/jumbotron.png" class="img-fluid" alt="" srcset=""> 
        </div>  
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class="sidebar-link">
                        <i class="fas fa-school"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class='sidebar-title'>Pengguna</li>
                <li class="sidebar-item {{ Request::is('dashboard/users*') ? 'active' : '' }}">
                    <a href="/dashboard/users" class='sidebar-link'>
                        <i class="fas fa-user-check"></i>
                        <span>Data User</span>
                    </a>
                </li>
                <li class='sidebar-title'>Pendaftaran</li>
                <li class="sidebar-item {{ Request::is('dashboard/majors*') ? 'active' : '' }}">
                    <a href="/dashboard/majors" class='sidebar-link'>
                        <i class="fas fa-file"></i>
                        <span>Data Jurusan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('dashboard/students*') ? 'active' : '' }}">
                    <a href="/dashboard/students" class='sidebar-link'>
                        <i class="fas fa-child"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>
                <li class='sidebar-title'>Registrasi</li>
                <li class="sidebar-item">
                    <li class="sidebar-item {{ Request::is('dashboard/payments*') ? 'active' : '' }}">
                        <a href="/dashboard/payments" class='sidebar-link'>
                            <i class="fas fa-credit-card"></i>
                            <span>Data Pembayaran</span>
                        </a>
                    </li>  
                    <li class="sidebar-item {{ Request::is('dashboard/registrations*') ? 'active' : '' }}">
                        <a href="/dashboard/registrations" class='sidebar-link'>
                            <i class="fas fa-registered"></i>
                            <span>Data Registrasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::is('dashboard/revocations*') ? 'active' : '' }}">
                        <a href="/dashboard/revocations" class='sidebar-link'>
                            <i class="fas fa-backward"></i>
                            <span>Data Pencabutan</span>
                        </a>
                    </li>
                </li>
            </ul>
        </div>
    </div>
</div>