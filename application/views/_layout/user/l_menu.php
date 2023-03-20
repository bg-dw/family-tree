<div class="main-sidebar sidebar-style-2 d-print-none">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('dashboard-us') ?>"> <img alt="image" src="<?= base_url() ?>assets/img/logo.png"
          class="header-logo" />
        <span class="logo-name">IMAM MOERSYID</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="<?php if ($this->uri->segment(1) == 'dashboard-us'):
        echo 'active';
      endif; ?>">
        <a href="<?= base_url('dashboard-us') ?>" class="nav-link"><i
            data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'data-keluarga-us'):
        echo 'active';
      endif; ?>">
        <a class="nav-link" href="<?= base_url('data-keluarga-us') ?>"><i data-feather="user-check"></i><span>Data
            Keluarga</span></a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'portofolio-us'):
        echo 'active';
      endif; ?>">
        <a class="nav-link" href="<?= base_url('portofolio-us') ?>"><i
            data-feather="briefcase"></i><span>Portofolio</span></a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'acara-us'):
        echo 'active';
      endif; ?>">
        <a class="nav-link" href="<?= base_url('acara-us') ?>"><i data-feather="calendar"></i><span>Acara</span></a>
      </li>
      <li class="menu-header">Media</li>
      <li class="<?php if ($this->uri->segment(1) == 'galeri-us'):
        echo 'active';
      endif; ?>">
        <a href="<?= base_url('galeri-us') ?>" class="nav-link"><i data-feather="image"></i><span>Gallery</span></a>
      </li>
    </ul>
  </aside>
</div>