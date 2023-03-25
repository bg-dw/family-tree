<div class="section-body" style="margin-top: -40px;">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 id="judul">Validasi Permintaan</h4>
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
                  <th class="text-center">Alamat</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Permintaan</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($rec):
                  $i = 1;
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
                        <?= $baris->alamat ?>
                      </td>
                      <td class="text-center">
                        <?php if ($baris->acc_admin == "waiting"): ?>
                          <div class="badge badge-warning badge-shadow">Menunggu Persetujuan</div>
                        <?php else: ?>
                          <div class="badge badge-danger badge-shadow">Ditolak</div>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <?php if ($baris->aksi == "add"): ?>
                          <div class="badge badge-success badge-shadow">Tambah Data</div>
                        <?php elseif ($baris->aksi == "update"): ?>
                          <div class="badge badge-warning badge-shadow">Ubah Data</div>
                        <?php elseif ($baris->aksi == "update-foto"): ?>
                          <div class="badge badge-info badge-shadow">Ubah Foto</div>
                        <?php else: ?>
                          <div class="badge badge-danger badge-shadow">Hapus Data</div>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Lihat"
                          onclick="lihat_data('<?= $baris->aksi ?>','<?= $baris->id_temp_user ?>','<?= $baris->id_user ?>');"><i
                            class="fas fa-file-alt"></i></a>
                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Hapus"
                          onclick="hapus_data('<?= $baris->id_temp_user ?>','<?= $baris->name ?>','<?= $baris->u_pic ?>')"><i
                            class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php $i++;
                  endforeach;
                endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div id="tbl_permintaan_add" style="display:none;">
          <div class="card-body">
            <form action="<?= base_url('master-permintaan-add') ?>" method="post" id="f-permintaan-add">
              <div class="form-row">
                <input type="hidden" class="form-control" name="id_temp" required="" id="uid">
                <input type="hidden" class="form-control" name="aksi_val" required="" id="uakv">
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
                  <input type="text" class="form-control" name="uname" required="" onkeyup="cek_uname_update()"
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
                  <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="pass"
                    required="" id="upw">
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
            </form>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-primary btn-add-permintaan"
              onclick="return aksi_validasi_add('setuju')">Setuju</button>
            <button type="button" class="btn btn-danger btn-add-permintaan"
              onclick="return aksi_validasi_add('tolak')">Tolak</button>
            <button type="button" class="btn btn-secondary" onclick="cancel_permintaan_add()">Kembali</button>
          </div>
        </div>

        <div id="tbl_permintaan_update" style="display:none;">
          <div class="card-body">
            <form action="<?= base_url('master-permintaan-update') ?>" method="post" id="f-permintaan-update">
              <div class="form-row">
                <input type="hidden" class="form-control" name="id_temp" required="" id="eid">
                <input type="hidden" class="form-control" name="id_user" required="" id="eid_us">
                <input type="hidden" class="form-control" name="aksi_val" required="" id="eakv">
                <table width="100%" border="1">
                  <tr>
                    <th class="text-center" style="width: 30%;">Attribut</th>
                    <th class="text-center">Data Lama</th>
                    <th class="text-center">Data Baru</th>
                    <th class="text-center">Hasil</th>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <th>
                      <input type="text" class="form-control" id="anl" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="nama_l" required="" id="enl">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rnm" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Nama Panggilan</th>
                    <th>
                      <input type="text" class="form-control" id="anm" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="nama" required="" id="enm">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rnp" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <th>
                      <input type="text" class="form-control" id="ajk" disabled>
                    </th>
                    <th>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="ecr1" name="ujk" value="male" class="custom-control-input">
                        <label class="custom-control-label" for="ecr1">Laki - Laki</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="ecr2" name="ujk" value="female" class="custom-control-input">
                        <label class="custom-control-label" for="ecr2">Perempuan</label>
                      </div>
                    </th>
                    <th class="text-center" id="rjk" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Tempat Lahir</th>
                    <th>
                      <input type="text" class="form-control" id="atl" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="tempat" required="" id="etl">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rtl" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Tanggal Lahir</th>
                    <th>
                      <input type="text" class="form-control" id="atgl" disabled>
                    </th>
                    <th>
                      <input type="date" class="form-control" name="tgl" required="" id="etgl">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rtgl" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Pekerjaan</th>
                    <th>
                      <input type="text" class="form-control" id="apk" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="pekerjaan" id="epk">
                    </th>
                    <th class="text-center" id="rpk" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <th>
                      <input type="text" class="form-control" id="aal" disabled>
                    </th>
                    <th>
                      <textarea class="form-control" name="alamat" required="" id="eal"></textarea>
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="ral" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>No. Telp</th>
                    <th>
                      <input type="text" class="form-control" id="atel" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="telp" required="" id="etel">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rtel" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>RT</th>
                    <th>
                      <input type="text" class="form-control" id="art" disabled>
                    </th>
                    <th>
                      <input type="number" min="1" class="form-control" name="rt" required="" id="ert">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rrt" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>RW</th>
                    <th>
                      <input type="text" class="form-control" id="arw" disabled>
                    </th>
                    <th>
                      <input type="number" min="1" class="form-control" name="rw" required="" id="erw">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rrw" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Desa</th>
                    <th>
                      <input type="text" class="form-control" id="ads" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="desa" required="" id="eds">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rds" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Kecamatan</th>
                    <th>
                      <input type="text" class="form-control" id="akec" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="kecamatan" required="" id="ekec">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rkec" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Kabupaten</th>
                    <th>
                      <input type="text" class="form-control" id="akab" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="kabupaten" required="" id="ekab">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rkab" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <th>
                      <input type="text" class="form-control" id="aprov" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="prov" required="" id="eprov">
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rprov" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Akses Login</th>
                    <th>
                      <input type="text" class="form-control" id="alog" disabled>
                    </th>
                    <th>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="eal1" name="uakses" value="acc" class="custom-control-input">
                        <label class="custom-control-label" for="eal1">Bisa Login</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="eal2" name="uakses" value="ban" class="custom-control-input">
                        <label class="custom-control-label" for="eal2">Tidak Bisa</label>
                      </div>
                    </th>
                    <th class="text-center" id="rak" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Level Pengguna</th>
                    <th>
                      <input type="text" class="form-control" id="alv" disabled>
                    </th>
                    <th>
                      <select class="form-control" name="level" required id="elv">
                        <option value="usm">Admin</option>
                        <option value="us">Pengguna</option>
                      </select>
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rlv" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Pengguna (Username minimal 5 karakter)</th>
                    <th>
                      <input type="text" class="form-control" id="aus" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control" name="uname" required="" onkeyup="cek_uname_update()"
                        pattern=".{5,}" id="eus">
                      <div class="valid-feedback" id="e-val">
                        Tersedia!
                      </div>
                      <div class="invalid-feedback" id="e-in">
                        Harap gunakan username lain!
                      </div>
                    </th>
                    <th class="text-center" id="rus" style="color:white"></th>
                  </tr>
                  <tr>
                    <th>Password</th>
                    <th>
                      <input type="text" class="form-control" id="apw" disabled>
                    </th>
                    <th>
                      <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="pass"
                        required="" id="epw">
                      <div id="epwindicator2" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                      <div class="valid-feedback">
                        Valid!
                      </div>
                      <div class="invalid-feedback">
                        Tidak Valid!
                      </div>
                    </th>
                    <th class="text-center" id="rpw" style="color:white"></th>
                  </tr>
                </table>
              </div>
            </form>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-primary btn-update-permintaan"
              onclick="return aksi_validasi_update('setuju')">Setuju</button>
            <button type="button" class="btn btn-danger btn-update-permintaan"
              onclick="return aksi_validasi_update('tolak')">Tolak</button>
            <button type="button" class="btn btn-secondary" onclick="cancel_permintaan_update()">Kembali</button>
          </div>
        </div>

        <div id="tbl_permintaan_update_foto" style="display:none;">
          <div class="card-body">
            <form action="<?= base_url('master-permintaan-update-foto') ?>" method="post" id="f-permintaan-update-foto">
              <div class="form-row">
                <input type="hidden" class="form-control" name="id_temp" required="" id="fid">
                <input type="hidden" class="form-control" name="id_user" required="" id="fid_us">
                <input type="hidden" class="form-control" name="aksi_val" required="" id="fakv">
                <table width="100%" border="1">
                  <tr>
                    <th class="text-center" width="50%">Data Lama</th>
                    <th class="text-center">Data Baru</th>
                  </tr>
                  <tr>
                    <th class="text-center">
                      <img src="" alt="" id="foto-lama">
                    </th>
                    <th class="text-center">
                      <img src="" alt="" id="foto-baru">
                    </th>
                  </tr>
                </table>
              </div>
            </form>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-primary btn-update-permintaan"
              onclick="return aksi_validasi_update_foto('setuju')">Setuju</button>
            <button type="button" class="btn btn-danger btn-update-permintaan"
              onclick="return aksi_validasi_update_foto('tolak')">Tolak</button>
            <button type="button" class="btn btn-secondary" onclick="cancel_permintaan_update_foto()">Kembali</button>
          </div>
        </div>

        <div id="tbl_permintaan_delete" style="display:none;">
          <div class="card-body">
            <form action="<?= base_url('master-permintaan-delete') ?>" method="post" id="f-permintaan-delete">
              <div class="form-row">
                <input type="hidden" class="form-control" name="id_user" required="" id="lid">
                <input type="hidden" class="form-control" name="id_temp" required="" id="lid_temp">
                <input type="hidden" class="form-control" name="aksi_val" required="" id="lakv">
                <input type="hidden" class="form-control" name="old" required="" id="lold">
                <div class="form-group col-md-4">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_l" id="lnl">
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>Nama Panggilan</label>
                  <input type="text" class="form-control" name="nama" id="lnm">
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
                    <input type="radio" id="lcr1" name="jk" value="male" class="custom-control-input">
                    <label class="custom-control-label" for="lcr1">Laki - Laki</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="lcr2" name="jk" value="female" class="custom-control-input">
                    <label class="custom-control-label" for="lcr2">Perempuan</label>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat" id="ltl">
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl" id="ltgl">
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" id="lpk">
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
                  <textarea class="form-control" name="alamat" id="lal"></textarea>
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>No. Telp</label>
                  <input type="text" class="form-control" name="telp" id="ltel">
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
                <div class="form-group col-md-2">
                  <label>RT</label>
                  <input type="number" min="1" class="form-control" name="rt" id="lrt">
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
                <div class="form-group col-md-2">
                  <label>RW</label>
                  <input type="number" min="1" class="form-control" name="rw" id="lrw">
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
                  <input type="text" class="form-control" name="desa" id="lds">
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>Kecamatan</label>
                  <input type="text" class="form-control" name="kecamatan" id="lkec">
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>Kabupaten</label>
                  <input type="text" class="form-control" name="kabupaten" id="lkab">
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
                  <input type="text" class="form-control" name="prov" id="lprov">
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
                    <input type="radio" id="lal1" name="akses" value="acc" class="custom-control-input">
                    <label class="custom-control-label" for="lal1">Bisa Login</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="lal2" name="akses" value="ban" class="custom-control-input">
                    <label class="custom-control-label" for="lal2">Tidak Bisa</label>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Level Pengguna</label>
                  <select class="form-control" name="level" id="llv">
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
                  <input type="text" class="form-control" name="uname" onkeyup="cek_uname_update()" pattern=".{5,}"
                    id="lus">
                  <div class="valid-feedback" id="l-val">
                    Tersedia!
                  </div>
                  <div class="invalid-feedback" id="l-in">
                    Harap gunakan username lain!
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label>Kata Sandi (Password)</label>
                  <input type="text" class="form-control pwstrength" data-indicator="pwindicator" name="pass" id="lpw">
                  <div class="valid-feedback">
                    Valid!
                  </div>
                  <div class="invalid-feedback">
                    Tidak Valid!
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-primary btn-add-permintaan"
              onclick="return aksi_validasi_del('setuju')">Setuju</button>
            <button type="button" class="btn btn-danger btn-add-permintaan"
              onclick="return aksi_validasi_del('tolak')">Tolak</button>
            <button type="button" class="btn btn-secondary" onclick="cancel_permintaan_del()">Kembali</button>
          </div>
        </div>

        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
          aria-hidden="true" id="modal-hapus">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Hapus Permintaan?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('master-delete-permintaan') ?>" method="post">
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
<script>
  $(".pwstrength").pwstrength();

  //lihat data
  function lihat_data(aksi, id, id_user) {
    var permintaan = "";
    if (aksi == "add") {
      add(id);
      permintaan = "Tambah Data";
      $('#tbl_permintaan_add').slideDown('slow');
    } else if (aksi == "update") {
      update(id, id_user);
      permintaan = "Ubah Data";
      $('#tbl_permintaan_update').slideDown('slow');
    } else if (aksi == "update-foto") {
      update_foto(id, id_user);
      permintaan = "Ubah Foto";
      $('#tbl_permintaan_update_foto').slideDown('slow');
    } else if (aksi == "delete") {
      delete_data(id_user, id);
      permintaan = "Hapus Data";
      $('#tbl_permintaan_delete').slideDown('slow');
    }
    $('#judul').text('Lihat Permintaan ' + permintaan);
    $('#tbl_data').slideUp('slow');
  }

  function add(id) {
    $.ajax({
      url: "<?= base_url('master-get-permintaan') ?>",
      method: "POST",
      dataType: 'json',
      data: { id_temp_user: id },
      success: function (data) {
        $('#uid').val(id);
        $('#unl').val(data.name);
        $('#unm').val(data.nick_name);
        if (data.sex == 'male') {
          $('#ucr1').prop('checked', true);
        } else if (data.sex == 'female') {
          $('#ucr2').prop('checked', true);
        }
        if (data.login == 'acc') {
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
        cek_uname_update();
      },
      error: function (data) {
        alert(data.responseText)
      }
    });
  }

  function aksi_validasi_add(val) {
    $('#uakv').val(val);
    if (val == "setuju") {
      var x = confirm("Terima Permintaan Tambah Data?");
      if (x == true) {
        $('#f-permintaan-add').submit();
      } else {
        return false;
      }
    } else if (val == "tolak") {
      var x = confirm("Tolak Permintaan Tambah Data?");
      if (x == true) {
        $('#f-permintaan-add').submit();
      } else {
        return false;
      }
    }
  }

  //batal acc
  function cancel_permintaan_add() {
    $('#judul').text('Validasi Permintaan');
    $('#tbl_permintaan_add').slideUp('slow');
    $('#tbl_data').slideDown('slow');
  }

  function update(id, id_user) {
    $.ajax({
      url: "<?= base_url('master-get-permintaan') ?>",
      method: "POST",
      dataType: 'json',
      data: { id_temp_user: id },
      success: function (data) {
        data_lama(id_user);
        $('#eid').val(id);
        $('#eid_us').val(id_user);
        $('#enl').val(data.name);
        $('#enm').val(data.nick_name);
        if (data.sex == 'male') {
          $('#ecr1').prop('checked', true);
        } else if (data.sex == 'female') {
          $('#ecr2').prop('checked', true);
        } if (data.login == 'acc') {
          $('#eal1').prop('checked', true);
        } else if (data.login == 'ban') {
          $('#eal2').prop('checked', true);
        } else {
          $('#eal2').prop('checked', true);
        }
        $('#etl').val(data.tempat_lahir);
        $('#etgl').val(data.birth_date);
        $('#epk').val(data.pekerjaan);
        $('#eal').val(data.alamat);
        $('#etel').val(data.telp);
        $('#ert').val(data.rt);
        $('#erw').val(data.rw);
        $('#eds').val(data.desa);
        $('#ekec').val(data.kec);
        $('#ekab').val(data.kab);
        $('#eprov').val(data.prov);
        $('#elv').val(data.u_level);
        $('#eus').val(data.u_user);
        $('#epw').val(data.u_pass);
        cek_uname_update();
      },
      error: function (data) {
        alert(data.responseText)
      }
    });
  }

  function data_lama(id) {
    $.ajax({
      url: "<?= base_url('master-get-user') ?>",
      method: "POST",
      dataType: 'json',
      data: { id_user: id },
      success: function (data) {
        $('#aid').val(id);
        $('#anl').val(data.name);
        $('#anm').val(data.nick_name);
        if (data.sex == 'male') {
          $('#ajk').val("Laki - Laki");
        } else if (data.sex == 'female') {
          $('#ajk').val("Perempuan");
        } if (data.login == 'acc') {
          $('#alog').val("Bisa Login");
        } else if (data.login == 'ban') {
          $('#alog').val("Tidak Bisa");
        }
        $('#atl').val(data.tempat_lahir);
        $('#atgl').val(data.birth_date);
        $('#apk').val(data.pekerjaan);
        $('#aal').val(data.alamat);
        $('#atel').val(data.telp);
        $('#art').val(data.rt);
        $('#arw').val(data.rw);
        $('#ads').val(data.desa);
        $('#akec').val(data.kec);
        $('#akab').val(data.kab);
        $('#aprov').val(data.prov);
        if (data.u_level == 'usm') {
          $('#alv').val("Admin");
        } else {
          $('#alv').val("Pengguna");
        }
        $('#aus').val(data.u_user);
        $('#apw').val(data.u_pass);
        cek_data();
      },
      error: function (data) {
        alert(data.responseText)
      }
    });
  }

  function cek_data() {
    if ($('#enl').val() != $('#anl').val()) { $('#rnm').text("Berubah"); $('#rnm').css("background-color", "red"); }
    if ($('#enm').val() != $('#anm').val()) { $('#rnp').text("Berubah"); $('#rnp').css("background-color", "red"); }
    if ($('input[name="ujk"]:checked').val() != $('#ajk').val()) { $('#rjk').text("Berubah"); $('#rjk').css("background-color", "red"); }
    if ($('#etl').val() != $('#atl').val()) { $('#rtl').text("Berubah"); $('#rtl').css("background-color", "red"); }
    if ($('#etgl').val() != $('#atgl').val()) { $('#rtgl').text("Berubah"); $('#rtgl').css("background-color", "red"); }
    if ($('#epk').val() != $('#apk').val()) { $('#rpk').text("Berubah"); $('#rpk').css("background-color", "red"); }
    if ($('#eal').val() != $('#aal').val()) { $('#ral').text("Berubah"); $('#ral').css("background-color", "red"); }
    if ($('#etel').val() != $('#atel').val()) { $('#rtel').text("Berubah"); $('#rtel').css("background-color", "red"); }
    if ($('#ert').val() != $('#art').val()) { $('#rrt').text("Berubah"); $('#rrt').css("background-color", "red"); }
    if ($('#erw').val() != $('#arw').val()) { $('#rrw').text("Berubah"); $('#rrw').css("background-color", "red"); }
    if ($('#eds').val() != $('#ads').val()) { $('#rds').text("Berubah"); $('#rds').css("background-color", "red"); }
    if ($('#ekec').val() != $('#akec').val()) { $('#rkec').text("Berubah"); $('#rkec').css("background-color", "red"); }
    if ($('#ekab').val() != $('#akab').val()) { $('#rkab').text("Berubah"); $('#rkab').css("background-color", "red"); }
    if ($('#eprov').val() != $('#aprov').val()) { $('#rprov').text("Berubah"); $('#rprov').css("background-color", "red"); }
    if ($('input[name="uakses"]:checked').text() != $('#alog').val()) { $('#rak').text("Berubah"); $('#rak').css("background-color", "red"); }
    if ($("#elv option:selected").text() != $('#alv').val()) { $('#rlv').text("Berubah"); $('#rlv').css("background-color", "red"); }
    if ($('#eus').val() != $('#aus').val()) { $('#rus').text("Berubah"); $('#rus').css("background-color", "red"); }
    if ($('#epw').val() != $('#apw').val()) { $('#rpw').text("Berubah"); $('#rpw').css("background-color", "red"); }
  }

  //batal update
  function cancel_permintaan_update() {
    $('#judul').text('Validasi Permintaan');
    $('#tbl_permintaan_update').slideUp('slow');
    $('#tbl_data').slideDown('slow');
  }

  function aksi_validasi_update(val) {
    $('#eakv').val(val);
    if (val == "setuju") {
      var x = confirm("Terima Permintaan Perubahan Data?");
      if (x == true) {
        $('#f-permintaan-update').submit();
      } else {
        return false;
      }
    } else if (val == "tolak") {
      var x = confirm("Tolak Permintaan Perubahan Data?");
      if (x == true) {
        $('#f-permintaan-update').submit();
      } else {
        return false;
      }
    }
  }

  function update_foto(id, id_user) {
    $.ajax({
      url: "<?= base_url('master-get-permintaan') ?>",
      method: "POST",
      dataType: 'json',
      data: { id_temp_user: id },
      success: function (data) {
        foto_lama(id_user);
        var src = "<?= base_url('assets/img/users/profile/') ?>" + data.u_pic;
        $('#foto-baru').attr('src', src);
        $('#fid').val(id);
      },
      error: function (data) {
        alert(data.responseText)
      }
    });
  }
  function foto_lama(id_user) {
    var src;
    $.ajax({
      url: "<?= base_url('master-get-user') ?>",
      method: "POST",
      dataType: 'json',
      data: { id_user: id_user },
      success: function (data) {
        if (data.u_pic == "") {
          src = "<?= base_url('assets/img/users/none.png') ?>";
        } else {
          src = "<?= base_url('assets/img/users/profile/') ?>" + data.u_pic;
        }
        $('#foto-lama').attr('src', src);
        $('#fid_us').val(id_user);
      },
      error: function (data) {
        alert(data.responseText)
      }
    });
  }
  function aksi_validasi_update_foto(val) {
    $('#fakv').val(val);
    if (val == "setuju") {
      var x = confirm("Terima Permintaan Ganti Foto?");
      if (x == true) {
        $('#f-permintaan-update-foto').submit();
      } else {
        return false;
      }
    } else if (val == "tolak") {
      var x = confirm("Tolak Permintaan Ganti Foto?");
      if (x == true) {
        $('#f-permintaan-update-foto').submit();
      } else {
        return false;
      }
    }
  }

  //batal acc
  function cancel_permintaan_update_foto() {
    $('#judul').text('Validasi Permintaan');
    $('#tbl_permintaan_update_foto').slideUp('slow');
    $('#tbl_data').slideDown('slow');
  }
  //cek username
  function cek_uname_update() {
    var user = $('#uus').val();
    if (user.length >= 5) {
      $.ajax({
        url: '<?= base_url("master-get-uname") ?>',
        type: "POST",
        data: { uname: user },
        dataType: 'json',
        success: function (data) {
          if (data == 0) {
            $('#u-in').hide();
            $('.btn-add-permintaan').show();
            $('#u-val').show();
          } else {
            if (user == "<?= $this->session->userdata('user') ?>") {
              $('#u-in').show();
              $('.btn-add-permintaan').hide();
              $('#u-val').hide();
            } else {
              $('.btn-add-permintaan').hide();
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

  function delete_data(id, id_temp) {
    $.ajax({
      url: "<?= base_url('master-get-user') ?>",
      method: "POST",
      dataType: 'json',
      data: { id_user: id },
      success: function (data) {
        console.table(data);
        $('#lid').val(id);
        $('#lid_temp').val(id_temp);
        $('#lold').val(data.u_pic);
        $('#lnl').val(data.name);
        $('#lnm').val(data.nick_name);
        if (data.sex == 'male') {
          $('#lcr1').prop('checked', true);
        } else if (data.sex == 'female') {
          $('#lcr2').prop('checked', true);
        }
        if (data.login == 'acc') {
          $('#lal1').prop('checked', true);
        } else if (data.login == 'ban') {
          $('#lal2').prop('checked', true);
        }
        $('#ltl').val(data.tempat_lahir);
        $('#ltgl').val(data.birth_date);
        $('#lpk').val(data.pekerjaan);
        $('#lal').val(data.alamat);
        $('#ltel').val(data.telp);
        $('#lrt').val(data.rt);
        $('#lrw').val(data.rw);
        $('#lds').val(data.desa);
        $('#lkec').val(data.kec);
        $('#lkab').val(data.kab);
        $('#lprov').val(data.prov);
        $('#llv').val(data.u_level);
        $('#lus').val(data.u_user);
        $('#lpw').val(data.u_pass);
      },
      error: function (data) {
        alert(data.responseText)
      }
    });
  }

  function aksi_validasi_del(val) {
    $('#lakv').val(val);
    if (val == "setuju") {
      var x = confirm("Terima Permintaan Hapus Data?");
      if (x == true) {
        $('#f-permintaan-delete').submit();
      } else {
        return false;
      }
    } else if (val == "tolak") {
      var x = confirm("Tolak Permintaan Hapus Data?");
      if (x == true) {
        $('#f-permintaan-delete').submit();
      } else {
        return false;
      }
    }
  }

  //batal delete
  function cancel_permintaan_del() {
    $('#judul').text('Validasi Permintaan');
    $('#tbl_permintaan_delete').slideUp('slow');
    $('#tbl_data').slideDown('slow');
  }
  //hapus data
  function hapus_data(id, nama, old) {
    $('#h_id').val(id);
    $('#h_old').val(old);
    $('#h_text').text(nama);
    $('#modal-hapus').modal('show');
  }
</script>