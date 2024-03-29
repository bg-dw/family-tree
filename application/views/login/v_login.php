<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>IMAM MOERSYID FAMILY</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bundles/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>/assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Masuk</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?= base_url('login/auth/') ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="us">Pengguna</label>
                    <input id="us" type="text" class="form-control" name="uname" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Username mohon diisi!
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Kata Sandi</label>
                      <div class="float-right">
                        <a href="#" class="text-small" onclick="alert('Harap Hubungi Admin Master');">
                          Lupa Kata Sandi?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="upass" tabindex="2" required>
                    <div class="invalid-feedback">
                      Password mohon diisi!
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Masuk
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?= base_url() ?>assets/js/app.min.js"></script>
  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url() ?>assets/js/custom.js"></script>
  <script src="<?= base_url() ?>assets/bundles/izitoast/js/iziToast.min.js"></script>
  <?php if ($this->session->flashdata('success')):
    ?>
    <script>
      iziToast.success({
        title: 'Success!',
        message: '<?= $this->session->flashdata('success') ?>',
        position: 'topCenter'
      });
    </script>
    <?php
  endif; ?>
  <?php if ($this->session->flashdata('error')):
    ?>
    <script>
      iziToast.error({
        title: 'error!',
        message: '<?= $this->session->flashdata('error') ?>',
        position: 'topCenter'
      });
    </script>
    <?php
  endif; ?>
</body>

</html>