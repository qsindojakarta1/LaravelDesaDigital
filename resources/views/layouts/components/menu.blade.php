<!--App Sidebar-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user clearfix">
        <div class="user-pro-body">
            <div class="sideuser-img">
                <img src="{{ getDesaFromUrl()->light_logo ? asset('storage/'.getDesaFromUrl()->light_logo) : asset('assets/img/photos/1.jpg') }}" alt="user-img" class="">
                <span class="sidebar-icon"></span>
            </div>
            <div class="user-info">
                <h2 class="app-sidebar__user-name">{{ auth()->user()->name }}</h2>
                <span class="app-sidebar__title">{{ auth()->user()->roles()->first()->name }}</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <h3>Main</h3>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('dashboard') }}"><i class="side-menu__icon" data-eva="monitor-outline"></i><span class="side-menu__label">Dashboard</span></a>
        </li>
        @role('Utama')
        <li>
            <h3>Daftar Masyarakat</h3>
        </li>
        <li>
            <a class="side-menu__item" href="#"><i class="side-menu__icon" data-eva="layout-outline"></i><span class="side-menu__label">Daftar Masyarakat</span></a>
        </li>
        @endrole
        @role('Kabupaten')
        <li>
            <h3>Daftar Masyarakat</h3>
        </li>
        <li>
            <a class="side-menu__item" href="#"><i class="side-menu__icon" data-eva="layout-outline"></i><span class="side-menu__label">Daftar Masyarakat</span></a>
        </li>
        @endrole
        @role('Desa')
        <li>
            <h3>Permohonan Surat</h3>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.pengguna.index') }}"><i class="side-menu__icon" data-eva="person-done-outline"></i><span class="side-menu__label">Pengguna</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{  route('desa.loket.index') }}"><i class="side-menu__icon" data-eva="home-outline"></i><span class="side-menu__label">Loket</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{  route('desa.antrian.index') }}"><i class="side-menu__icon" data-eva="speaker-outline"></i><span class="side-menu__label d-flex justify-content-between"><div>Antrian</div> <div>{{ App\Models\Loket::where('desa_id',getDesaFromUrl()->id)->pluck('kuota')->first() ?? 'Kosong' }}</div></span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.permohonan.index') }}"><i class="side-menu__icon" data-eva="email-outline"></i><span class="side-menu__label">Permohonan Surat</span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('desa.cetak_surat.index') }}"><i class="side-menu__icon" data-eva="printer-outline"></i><span class="side-menu__label">Cetak Surat</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.playlist.index') }}"><i class="side-menu__icon" data-eva="video-outline"></i><span class="side-menu__label">Playlist</span></a>
        </li>
        

        <li>
            <h3>Informasi</h3>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('desa.tag.index') }}"><i class="side-menu__icon" data-eva="layout-outline"></i><span class="side-menu__label">Tag</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.page.index') }}"><i class="side-menu__icon" data-eva="shopping-cart-outline"></i><span class="side-menu__label">Page</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.warga.index') }}"><i class="side-menu__icon" data-eva="layout-outline"></i><span class="side-menu__label">Daftar Masyarakat</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.produk.index') }}"><i class="side-menu__icon" data-eva="shopping-cart-outline"></i><span class="side-menu__label">Produk Warga</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.gallery.index') }}"><i class="side-menu__icon" data-eva="grid-outline"></i><span class="side-menu__label">Gallery</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.aduan.index') }}"><i class="side-menu__icon" data-eva="file-text-outline"></i><span class="side-menu__label">Aduan</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.kategori_informasi.index') }}"><i class="side-menu__icon" data-eva="bookmark-outline"></i><span class="side-menu__label">Kategori Informasi</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.informasi.index') }}"><i class="side-menu__icon" data-eva="book-outline"></i><span class="side-menu__label">Informasi</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.marque.index') }}"><i class="side-menu__icon" data-eva="text-outline"></i><span class="side-menu__label">Marque</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.rates.index') }}"><i class="side-menu__icon" data-eva="layers-outline"></i><span class="side-menu__label">Rates</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.rating.index') }}"><i class="side-menu__icon" data-eva="star-outline"></i><span class="side-menu__label">Rating</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.slider.index') }}"><i class="side-menu__icon" data-eva="image-outline"></i><span class="side-menu__label">Slider</span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('desa.dokumen.index') }}"><i class="side-menu__icon" data-eva="file-text-outline"></i><span class="side-menu__label">Dokumen</span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('desa.profile.edit',getDesaFromUrl()->id) }}"><i class="side-menu__icon" data-eva="question-mark-circle-outline"></i><span class="side-menu__label">Profile</span></a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('desa.sejarah.edit',getDesaFromUrl()->id) }}"><i class="side-menu__icon" data-eva="info-outline"></i><span class="side-menu__label">Sejarah</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('desa.dusun.index') }}"><i class="side-menu__icon" data-eva="info-outline"></i><span class="side-menu__label">dusun</span></a>
        </li>

        <li>
            <h3>Setting</h3>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('setting') }}"><i class="side-menu__icon" data-eva="settings-outline"></i><span class="side-menu__label">Setting Profile</span></a>
        </li>
        @endrole
        @role('Warga')
        <li>
            <h3>Daftar Masyarakat</h3>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('warga.masyarakat.index') }}"><i class="side-menu__icon" data-eva="layout-outline"></i><span class="side-menu__label">Daftar Masyarakat</span></a>
        </li>
        @endrole
    </ul>
</aside>
<!--/App Sidebar-->