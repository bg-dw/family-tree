<div class="section-body" style="margin-top: -40px;">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 id="judul">Data Keluarga</h4>
          <div class="card-header-action">
            <a href="#" class="btn btn-primary" onclick="add_data();" id="btn-add">Tambah <i
                class="fas fa-plus"></i></a>
          </div>
        </div>
        <div class="card-body" id="tbl_data">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">
                    #
                  </th>
                  <th class="text-center">Foto</th>
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Tanggal Lahir</th>
                  <th class="text-center">Pekerjaan</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">Akses Login</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($rec as $baris): ?>
                  <tr>
                    <td>
                      <?= $i . "." ?>
                    </td>
                    <td>
                      <?php if ($baris->u_pic): ?>
                        <img src="<?= base_url() ?>assets/img/users/profile/<?= $baris->u_pic ?>" class="user-img" alt=""
                          width="50px" height="50px" onclick="upload_foto('<?= $baris->id_user ?>','<?= $baris->u_pic ?>')">
                      <?php else: ?>
                        <img src="<?= base_url() ?>assets/img/users/none.png" class="user-img" alt="" width="50px"
                          height="50px" onclick="upload_foto('<?= $baris->id_user ?>','<?= $baris->u_pic ?>')">
                      <?php endif; ?>
                    </td>
                    <td>
                      <?= $baris->name ?>
                    </td>
                    <td class="text-center">
                      <?= date('d M Y', strtotime($baris->birth_date)) ?>
                    </td>
                    <td>
                      <?= $baris->pekerjaan ?>
                    </td>
                    <td>
                      <?= $baris->alamat ?>
                    </td>
                    <td class="text-center">
                      <?php if ($baris->login == "acc"): ?>
                        <div class="badge badge-success badge-shadow">Bisa</div>
                      <?php else: ?>
                        <div class="badge badge-danger badge-shadow">Tidak Bisa</div>
                      <?php endif; ?>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"
                        onclick="update_data('<?= $baris->id_user ?>');"><i class="fas fa-pencil-alt"></i></a>
                      <?php if ($baris->u_level != "um"): ?>
                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Hapus"
                          onclick="hapus_data('<?= $baris->id_user ?>','<?= $baris->name ?>','<?= $baris->u_pic ?>')"><i
                            class="fas fa-trash"></i></a>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php $i++; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <form action="<?= base_url('master-add-pengguna') ?>" method="post" onsubmit="return confirm('Simpan data?');"
          id="tbl_add" style="display:none;">
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_l" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Nama Panggilan</label>
                <input type="text" class="form-control" name="nama" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Jenis Kelalmin</label><br>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="cr1" name="jk" value="male" class="custom-control-input" checked>
                  <label class="custom-control-label" for="cr1">Laki - Laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="cr2" name="jk" value="female" class="custom-control-input">
                  <label class="custom-control-label" for="cr2">Perempuan</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" required=""></textarea>
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>No. Telp</label>
                <input type="text" class="form-control" name="telp" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-2">
                <label>RT</label>
                <input type="number" min="1" class="form-control" name="rt" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-2">
                <label>RW</label>
                <input type="number" min="1" class="form-control" name="rw" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Desa</label>
                <input type="text" class="form-control" name="desa" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Kecamatan</label>
                <input type="text" class="form-control" name="kecamatan" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Kabupaten</label>
                <input type="text" class="form-control" name="kabupaten" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Provinsi</label>
                <input type="text" class="form-control" name="prov" required="">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Level Pengguna</label>
                <select class="form-control" name="level" required>
                  <option value="usm">Admin</option>
                  <option value="us" selected>Pengguna</option>
                </select>
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Pengguna (Username minimal 5 karakter)</label>
                <input type="text" class="form-control" name="uname" required="" pattern=".{5,}"
                  onkeyup="cek_uname(this)">
                <div class="valid-feedback" id="u_val">
                  Tersedia!
                </div>
                <div class="invalid-feedback" id="u_in">
                  Harap gunakan pengguna lain!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Kata Sandi (Password)</label>
                <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="pass" required="">
                <div id="pwindicator" class="pwindicator">
                  <div class="bar"></div>
                  <div class="label"></div>
                </div>
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary" id="btn-save-add" style="display:none;">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="cancel_add()">Batal</button>
          </div>
        </form>

        <form action="<?= base_url('master-update-pengguna') ?>" method="post"
          onsubmit="return confirm('Simpan data?');" id="tbl_update" style="display:none;">
          <div class="card-body">
            <div class="form-row">
              <input type="hidden" class="form-control" name="id" required="" id="uid">
              <div class="form-group col-md-4">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_l" required="" id="unl">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Nama Panggilan</label>
                <input type="text" class="form-control" name="nama" required="" id="unm">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Jenis Kelalmin</label><br>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="ucr1" name="jk" value="male" class="custom-control-input">
                  <label class="custom-control-label" for="ucr1">Laki - Laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="ucr2" name="jk" value="female" class="custom-control-input">
                  <label class="custom-control-label" for="ucr2">Perempuan</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat" required="" id="utl">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl" required="" id="utgl">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" id="upk">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" required="" id="ual"></textarea>
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>No. Telp</label>
                <input type="text" class="form-control" name="telp" required="" id="utel">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-2">
                <label>RT</label>
                <input type="number" min="1" class="form-control" name="rt" required="" id="urt">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-2">
                <label>RW</label>
                <input type="number" min="1" class="form-control" name="rw" required="" id="urw">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Desa</label>
                <input type="text" class="form-control" name="desa" required="" id="uds">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Kecamatan</label>
                <input type="text" class="form-control" name="kecamatan" required="" id="ukec">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Kabupaten</label>
                <input type="text" class="form-control" name="kabupaten" required="" id="ukab">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Provinsi</label>
                <input type="text" class="form-control" name="prov" required="" id="uprov">
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Akses Login</label><br>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="ual1" name="akses" value="acc" class="custom-control-input">
                  <label class="custom-control-label" for="ual1">Bisa Login</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="ual2" name="akses" value="ban" class="custom-control-input">
                  <label class="custom-control-label" for="ual2">Tidak Bisa</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Level Pengguna</label>
                <select class="form-control" name="level" required id="ulv">
                  <option value="um">Admin Master</option>
                  <option value="usm">Admin</option>
                  <option value="us">Pengguna</option>
                </select>
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Pengguna (Username minimal 5 karakter)</label>
                <input type="text" class="form-control" name="uname" required="" onkeyup="cek_uname_update(this)"
                  pattern=".{5,}" id="uus">
                <div class="valid-feedback" id="u-val">
                  Tersedia!
                </div>
                <div class="invalid-feedback" id="u-in">
                  Harap gunakan username lain!
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Kata Sandi (Password)</label>
                <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="pass" required=""
                  id="upw">
                <div id="pwindicator2" class="pwindicator">
                  <div class="bar"></div>
                  <div class="label"></div>
                </div>
                <div class="valid-feedback">
                  Valid!
                </div>
                <div class="invalid-feedback">
                  Tidak Valid!
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary" id="btn-save-update">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="cancel_update()">Batal</button>
          </div>
        </form>
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
          aria-hidden="true" id="modal-hapus">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('master-delete-pengguna') ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="id" id="h_id" required>
                  <input type="hidden" name="old" id="h_old" required>
                  <div class="text-center">
                    <h4 id="h_text"></h4>
                  </div>
                </div>
                <div class="modal-footer text-right">
                  <button class="btn btn-danger mr-1" type="submit">Hapus</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="upload-foto-pengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('master-update-foto-pengguna') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id_user" id="u-foto-id" required>
          <input type="hidden" name="old" id="u-foto-lama">
          <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
              <div class="alert-title">Info</div>
              Maksimal ukuran 2Mb, maksimal resolusi HD(1920x1080 pixel) dan jenis foto
              ( jpg, png, jpeg )
            </div>
          </div>
          <center>
            <div id="image-preview" class="image-preview">
              <label for="image-upload" id="image-label">Pilih Foto</label>
              <input type="file" name="image" id="image-upload" required />
            </div>
          </center>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="type" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(".pwstrength").pwstrength();
  //tambah data
  function add_data() {
    $('#judul').text('Tambah Data Keluarga');
    $('#btn-add').slideUp('slow');
    $('#tbl_data').slideUp('slow');
    $('#tbl_add').slideDown('slow');
  }
  function cek_uname(e) {
    var user = e.value;
    if (user.length >= 5) {
      $.ajax({
        url: '<?= base_url("master-get-uname") ?>',
        type: "POST",
        data: { uname: user },
        dataType: 'json',
        success: function (data) {
          if (data == 0) {
            $('#u_in').hide();
            $('#btn-save-add').show();
            $('#u_val').show();
          } else {
            $('#btn-save-add').hide();
            $('#u_val').hide();
            $('#u_in').show();
          }
        },
        error: function (data) {
          alert(data.responseText)
        }
      });
    }
  }

  //batal tambah
  function cancel_add() {
    $('#judul').text('Data Keluarga');
    $('#tbl_add').slideUp('slow');
    $('#btn-add').slideDown('slow');
    $('#tbl_data').slideDown('slow');
  }

  //update data
  function update_data(id) {
    $('#judul').text('Update Data Keluarga');
    $('#tbl_data').slideUp('slow');
    $('#btn-add').slideUp('slow');
    $('#tbl_update').slideDown('slow');

    $.ajax({
      url: "<?= base_url('master-get-user') ?>",
      method: "POST",
      dataType: 'json',
      data: { id_user: id },
      success: function (data) {
        $('#uid').val(data.id_user);
        $('#unl').val(data.name);
        $('#unm').val(data.nick_name);
        if (data.sex == 'male') {
          $('#ucr1').prop('checked', true);
        } else if (data.sex == 'female') {
          $('#ucr2').prop('checked', true);
        } if (data.login == 'acc') {
          $('#ual1').prop('checked', true);
        } else if (data.login == 'ban') {
          $('#ual2').prop('checked', true);
        }
        $('#utl').val(data.tempat_lahir);
        $('#utgl').val(data.birth_date);
        $('#upk').val(data.pekerjaan);
        $('#ual').val(data.alamat);
        $('#utel').val(data.telp);
        $('#urt').val(data.rt);
        $('#urw').val(data.rw);
        $('#uds').val(data.desa);
        $('#ukec').val(data.kec);
        $('#ukab').val(data.kab);
        $('#uprov').val(data.prov);
        $('#ulv').val(data.u_level);
        $('#uus').val(data.u_user);
        $('#upw').val(data.u_pass);
      },
      error: function (data) {
        alert(data.responseText)
      }
    });
  }

  //cek username
  function cek_uname_update(e) {
    var user = e.value;
    if (user.length >= 5) {
      $.ajax({
        url: '<?= base_url("master-get-uname") ?>',
        type: "POST",
        data: { uname: user },
        dataType: 'json',
        success: function (data) {
          if (data == 0) {
            $('#u-in').hide();
            $('#btn-save-update').show();
            $('#u-val').show();
          } else {
            if (user == "<?= $this->session->userdata('user') ?>") {

              $('#u-in').hide();
              $('#btn-save-update').show();
              $('#u-val').show();
            } else {
              $('#btn-save-update').hide();
              $('#u-val').hide();
              $('#u-in').show();
            }
          }
        },
        error: function (data) {
          alert(data.responseText)
        }
      });
    }
  }

  //batal tambah
  function cancel_update() {
    $('#judul').text('Data Keluarga');
    $('#tbl_update').slideUp('slow');
    $('#tbl_data').slideDown('slow');
    $('#btn-add').slideDown('slow');
  }

  //hapus data
  function hapus_data(id, nama, old) {
    $('#h_id').val(id);
    $('#h_old').val(old);
    $('#h_text').text(nama);
    $('#modal-hapus').modal('show');
  }

  function upload_foto(id, foto) {
    $('#u-foto-id').val(id);
    $('#u-foto-lama').val(foto);
    $('#upload-foto-pengguna').modal('show');
  }

  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Pilih Foto",   // Default: Choose File
    label_selected: "Ganti Foto",  // Default: Change File
    no_label: false,                // Default: false
    success_callback: null          // Default: null
  });
</script>