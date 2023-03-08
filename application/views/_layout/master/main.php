<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>IMAM MOERSYID FAMILY</title>
  <?php $this->load->view('_layout/master/l_header'); ?>
</head>

<body>
  <!-- <div class="loader"></div> -->
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Pemberitahuan
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
                        fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now!
                    <span class="time">2 Min Ago</span>
                  </span>
                </a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?= base_url() ?>assets/img/users/<?php if ($this->session->userdata('pic')):
                  echo $this->session->userdata('pic');
                else:
                  echo 'none.png';
                endif; ?>" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">
                <?= $this->session->userdata('nama') ?>
              </div>
              <a href="<?= base_url('master/profile/') ?>" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> Profile
              </a>
              <a href="#" class="dropdown-item has-icon" data-toggle="modal" data-target="#update-username"> <i
                  class="fas fa-key"></i>
                Ganti Pengguna
              </a>
              <a href="#" class="dropdown-item has-icon" data-toggle="modal" data-target="#update-password"> <i
                  class="fas fa-lock"></i>
                Ganti Kata Sandi
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('login/logout/') ?>" class="dropdown-item has-icon text-danger"> <i
                  class="fas fa-sign-out-alt"></i>
                Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <?php $this->load->view('_layout/master/l_menu'); ?>
      <!-- Main Content -->
      <div class="main-content">
        <?php $this->load->view($content); ?>
        <!-- Vertically Center -->
        <div class="modal fade" id="update-username" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form method="post" action="<?= base_url('master/profile/update_username/') ?>"
                onsubmit="return confirm('Simpan, dan Masuk Ulang?')">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Ganti Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row" id="u_lama">
                      <div class="form-group col-12">
                        <label>Pengguna Lama</label>
                        <input type="hidden" class="form-control" value="<?= $this->session->userdata('id') ?>" required
                          id="id_us">
                        <input type="text" class="form-control" name="u_lama" onkeyup="cek_uname_lama(this)" required
                          id="in_lama">
                        <div class="valid-feedback" id="valuser" style="display:none;">
                          Valid!
                        </div>
                        <div class="invalid-feedback" id="inuser" style="display:none;">
                          Tidak ditemukan!
                        </div>
                      </div>
                    </div>
                    <div class="row" id="u_baru" style="display:none;">
                      <div class="form-group col-12">
                        <label>Pengguna Baru (Minimal 5 Karakter)</label>
                        <input type="text" class="form-control" name="u_baru" onkeyup="cek_uname_baru(this)" required
                          id="in_baru" pattern=".{5,}">
                        <div class="valid-feedback" id="valub" style="display:none;">
                          Valid!
                        </div>
                        <div class="invalid-feedback" id="inub" style="display:none;">
                          Tidak dapat digunakan!
                        </div>
                        <div class="invalid-feedback" id="inub2" style="display:none;">
                          Harap gunakan pengguna yang berbeda dari pengguna lama!
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="update-password" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <form method="post" class="needs-validation" action="<?= base_url('master/profile/update_password/') ?>"
                onsubmit="return confirm('Simpan, dan Masuk Ulang?')">
                <div class=" modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Ganti Kata Sandi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="row" id="f-lama">
                      <div class="form-group col-12">
                        <label>Kata Sandi Lama</label>
                        <input type="hidden" class="form-control" value="<?= $this->session->userdata('upass') ?>"
                          required id="pwd_lama">
                        <input type="password" class="form-control" onkeyup="cek_pwd_lama(this);" required>
                        <div class="valid-feedback" id="valpwd" style="display:none;">
                          Valid!
                        </div>
                        <div class="invalid-feedback" id="inpwd" style="display:none;">
                          Tidak sama!
                        </div>
                      </div>
                    </div>
                    <div id="f-baru" style="display:none;">
                      <div class="row">
                        <div class="form-group col-12">
                          <label>Kata Sandi Baru (Minimal 5 Karakter)</label>
                          <input type="password" class="form-control" name="pwd" onkeyup="ver_sandi()" required
                            id="in_pwd" pattern=".{5,}">
                        </div>
                      </div>
                      <div class="row" id="in-ver" style="display:none;">
                        <div class="form-group col-12">
                          <label>Verifikasi Kata Sandi Baru</label>
                          <input type="password" class="form-control" name="u_baru" onkeyup="ver_sandi()" required
                            id="in_conf">
                          <div class="valid-feedback" id="valpwdb" style="display:none;">
                            Valid!
                          </div>
                          <div class="invalid-feedback" id="inpwdb" style="display:none;">
                            Kata sandi baru tidak sama!
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                  <button type="submit" class="btn btn-primary" id="btn-save" style="display:none;">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <?php $this->load->view('_layout/master/l_footer'); ?>
  <?php $this->load->view('_layout/alert'); ?>

  <script>
    function cek_uname_lama(e) {
      var user = e.value;
      var id_us = $('#id_us').val();
      if (user.length >= 5) {
        $.ajax({
          url: '<?= base_url("master/dashboard/get_my/") ?>',
          type: "POST",
          data: { id: id_us, uname: user },
          dataType: 'json',
          success: function (data) {
            if (data == 1) {
              $('#inuser').hide();
              $('#valuser').show();
              setTimeout(
                function () {
                  $('#u_lama').slideUp();
                  $('#u_baru').slideDown("slow");
                  $('#in_baru').focus();
                }, 1000);
            } else {
              $('#inuser').show();
            }
          },
          error: function (data) {
            $('#u_baru').hide();
            $('#u_lama').show();
            alert(data.responseText)
          }
        });
      }
    }

    function cek_uname_baru(e) {
      var user_lama = $('#in_lama').val();
      var user = e.value;
      if (user.length >= 5) {
        $.ajax({
          url: '<?= base_url("master/dashboard/get_uname/") ?>',
          type: "POST",
          data: { uname: user },
          dataType: 'json',
          success: function (data) {
            if (data == 0) {
              $('#inub').hide();
              $('#inub2').hide();
              $('#valub').show();
            } else {
              if (user_lama == user) {
                $('#valub').hide();
                $('#inub').hide();
                $('#inub2').show();
              } else {
                $('#valub').hide();
                $('#inub2').hide();
                $('#inub').show();
              }
            }
          },
          error: function (data) {
            $('#u_baru').show();
            alert(data.responseText)
          }
        });
      }
    }

    function cek_pwd_lama(e) {
      var pwd_lama = $('#pwd_lama').val();
      var pwd = e.value;
      if (pwd_lama == pwd) {
        $('#inpwd').hide();
        $('#valpwd').show();
        $('#f-lama').slideUp();
        $('#f-baru').slideDown("slow");
        $('#in_pwd').focus();
      } else {
        $('#valpwd').hide();
        $('#inpwd').show();
      }
    }

    //verifikasi sandi
    function ver_sandi() {
      var pwd = $('#in_pwd').val();
      var conf = $('#in_conf').val();
      if (pwd.length >= 5) {
        $('#in-ver').show();
        if (pwd == conf) {
          $('#inpwdb').hide();
          $('#valpwdb').show();
          $('#btn-save').show();
        } else {
          $('#valpwdb').hide();
          $('#btn-save').hide();
          $('#inpwdb').show();
        }
      } else {
        $('#in-ver').hide();
      }
    }
  </script>

</body>

</html>