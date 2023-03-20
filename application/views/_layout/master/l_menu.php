<div class="main-sidebar sidebar-style-2 d-print-none">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('master-dashboard') ?>"> <img alt="image" src="<?= base_url() ?>assets/img/logo.png"
          class="header-logo" />
        <span class="logo-name">IMAM MOERSYID</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="<?php if ($this->uri->segment(1) == 'master-dashboard'):
        echo 'active';
      endif; ?>">
        <a href="<?= base_url('master-dashboard') ?>" class="nav-link"><i
            data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <li class="dropdown <?php if ($this->uri->segment(1) == 'master-data-keluarga' || $this->uri->segment(1) == 'master-hubungan-keluarga'):
        echo 'active';
      endif; ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Pengguna</span></a>
        <ul class="dropdown-menu">
          <li class="<?php if ($this->uri->segment(1) == 'master-data-keluarga'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('master-data-keluarga') ?>">Data Keluarga</a>
          </li>
          <li class="<?php if ($this->uri->segment(1) == 'master-hubungan-keluarga'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('master-hubungan-keluarga') ?>">Hubungan Keluarga</a>
          </li>
        </ul>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'master-portofolio'):
        echo 'active';
      endif; ?>">
        <a class="nav-link" href="<?= base_url('master-portofolio') ?>"><i
            data-feather="briefcase"></i><span>Portofolio</span></a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'master-acara'):
        echo 'active';
      endif; ?>">
        <a class="nav-link" href="<?= base_url('master-acara') ?>"><i data-feather="calendar"></i><span>Acara</span></a>
      </li>
      <li class="menu-header">Media</li>
      <li class="<?php if ($this->uri->segment(1) == 'master-galeri'):
        echo 'active';
      endif; ?>">
        <a href="<?= base_url('master-galeri') ?>" class="nav-link"><i data-feather="image"></i><span>Gallery</span></a>
      </li>
    </ul>
  </aside>
</div>