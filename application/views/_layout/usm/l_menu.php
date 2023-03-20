<div class="main-sidebar sidebar-style-2 d-print-none">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('dashboard-usm') ?>"> <img alt="image" src="<?= base_url() ?>assets/img/logo.png"
          class="header-logo" />
        <span class="logo-name">IMAM MOERSYID</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="<?php if ($this->uri->segment(1) == 'dashboard-usm'):
        echo 'active';
      endif; ?>">
        <a href="<?= base_url('dashboard-usm') ?>" class="nav-link"><i
            data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <li class="dropdown <?php if ($this->uri->segment(1) == 'data-keluarga-usm' || $this->uri->segment(1) == 'data-keluarga-usm-validasi'):
        echo 'active';
      endif; ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Data
            Keluarga</span></a>
        <ul class="dropdown-menu">
          <li class="<?php if ($this->uri->segment(1) == 'data-keluarga-usm'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('data-keluarga-usm') ?>">Data Keluarga</a>
          </li>
          <li class="<?php if ($this->uri->segment(1) == 'data-keluarga-usm-validasi'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('data-keluarga-usm-validasi') ?>">Menunggu Validasi</a>
          </li>
        </ul>
      </li>
      <li class="dropdown <?php if ($this->uri->segment(1) == 'hubungan-keluarga-usm' || $this->uri->segment(1) == 'hubungan-keluarga-usm-validasi'):
        echo 'active';
      endif; ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Hubungan
            Keluarga</span></a>
        <ul class="dropdown-menu">
          <li class="<?php if ($this->uri->segment(1) == 'hubungan-keluarga-usm'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('hubungan-keluarga-usm') ?>">Hubungan Keluarga</a>
          </li>
          <li class="<?php if ($this->uri->segment(1) == 'hubungan-keluarga-usm-validasi'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('hubungan-keluarga-usm-validasi') ?>">Menunggu Validasi</a>
          </li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'portofolio-usm'):
        echo 'active';
      endif; ?>">
        <a class="nav-link" href="<?= base_url('portofolio-usm') ?>"><i
            data-feather="briefcase"></i><span>Portofolio</span></a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'acara-usm'):
        echo 'active';
      endif; ?>">
        <a class="nav-link" href="<?= base_url('acara-usm') ?>"><i data-feather="calendar"></i><span>Acara</span></a>
      </li>
      <li class="menu-header">Media</li>
      <li class="<?php if ($this->uri->segment(1) == 'galeri-usm'):
        echo 'active';
      endif; ?>">
        <a href="<?= base_url('galeri-usm') ?>" class="nav-link"><i data-feather="image"></i><span>Gallery</span></a>
      </li>
    </ul>
  </aside>
</div>