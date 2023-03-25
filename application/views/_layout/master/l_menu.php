<?php

$val_data = $this->M_keluarga->get_count_kel('temp_tbl_user')->row();
$val_hub = $this->M_keluarga->get_count_hub('temp_tbl_user_bio')->row();
?>
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
      <li class="dropdown <?php if ($this->uri->segment(1) == 'master-data-keluarga' || $this->uri->segment(1) == 'master-data-keluarga-validasi'):
        echo 'active';
      endif; ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Data
            Keluarga</span>
          <?php if ($val_data):
            if ($val_data->tot != 0): ?>
              <span class="badge col-3 mr-3">
                <i data-feather="bell" class="bell" style="color:royalblue;"></i>
              </span>
            <?php endif; endif; ?>
        </a>
        <ul class="dropdown-menu">
          <li class="<?php if ($this->uri->segment(1) == 'master-data-keluarga'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('master-data-keluarga') ?>">Data Keluarga</a>
          </li>
          <li class="<?php if ($this->uri->segment(1) == 'master-data-keluarga-validasi'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('master-data-keluarga-validasi') ?>">Menunggu Validasi<?php if ($val_data): ?>
                <span class="badge badge-primary col-3 ml-3">
                  <?= $val_data->tot; ?>
                </span>
              <?php endif; ?>
            </a>
          </li>
        </ul>
      </li>
      <li class="dropdown <?php if ($this->uri->segment(1) == 'master-hubungan-keluarga' || $this->uri->segment(1) == 'master-hubungan-keluarga-validasi'):
        echo 'active';
      endif; ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Hub.
            Keluarga</span>
          <?php if ($val_hub):
            if ($val_hub->tot != 0): ?>
              <span class="badge col-2 mr-3">
                <i data-feather="bell" class="bell" style="color:royalblue;"></i>
              </span>
            <?php endif; endif; ?>
        </a>
        <ul class="dropdown-menu">
          <li class="<?php if ($this->uri->segment(1) == 'master-hubungan-keluarga'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('master-hubungan-keluarga') ?>">Hubungan Keluarga</a>
          </li>
          <li class="<?php if ($this->uri->segment(1) == 'master-hubungan-keluarga-validasi'):
            echo 'active';
          endif; ?>"><a class="nav-link" href="<?= base_url('master-hubungan-keluarga-validasi') ?>">Menunggu
              Validasi
              <?php if ($val_hub): ?>
                <span class="badge badge-primary col-3 ml-3">
                  <?= $val_hub->tot ?>
                </span>
              <?php endif; ?>
            </a>
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