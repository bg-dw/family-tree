<div class="section-body" style="margin-top: -40px;">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Daftar Acara</h4>
          <div class="card-header-action">
            <a href="#" class="btn btn-primary" onclick="add_acara()" id="btn-add">Tambah <i
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
                  <th class="text-center">Nama Acara</th>
                  <th class="text-center">Foto Acara</th>
                  <th class="text-center">Tgl. Acara</th>
                  <th class="text-center">Waktu Acara</th>
                  <th class="text-center">Pembuat Acara</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($rec):
                  $i = 1;
                  foreach ($rec as $baris):
                    $a = explode(" ", $baris->waktu_acara) ?>
                    <tr>
                      <td class="text-center">
                        <?= $i . "." ?>
                      </td>
                      <td>
                        <?= $baris->nama_acara ?>
                      </td>
                      <td class="text-center">
                        <?php if ($baris->gambar_acara): ?>
                          <img alt="image" src="<?= base_url() ?>assets/img/acara/<?= $baris->gambar_acara ?>" width="120"
                            height="50" data-toggle="modal" data-target="#upload-foto-acara" title="Klik untuk edit"
                            onclick="upload_foto('<?= $baris->id_acara ?>','<?= $baris->gambar_acara ?>')">
                        <?php else: ?>
                          <img alt="image" src="<?= base_url() ?>assets/img/users/none.png" width="120" height="50"
                            data-toggle="modal" data-target="#upload-foto-acara" title="Klik untuk edit"
                            onclick="upload_foto('<?= $baris->id_acara ?>','<?= $baris->gambar_acara ?>')">
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <?= date("d M Y", strtotime($a[0])) ?>
                      </td>
                      <td class="text-center">
                        <?= date("H:i", strtotime($a[1])) ?>
                        <?php if (date("A", strtotime($a[1])) == "AM"):
                          echo " Pagi"; ?>
                        <?php else:
                          echo " Malam";
                        endif; ?>
                        <?= " | " . date("h:i A", strtotime($a[1])) ?>
                      </td>
                      <td>
                        <?= $baris->name ?>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"
                          onclick="update_acara('<?= $baris->id_acara ?>')"><i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Hapus"
                          onclick="hapus_data('<?= $baris->id_acara ?>','<?= $baris->nama_acara ?>','<?= $baris->gambar_acara ?>')"><i
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
        <div class="card-body" id="tbl_add" style="display: none;">
          <form action="<?= base_url('usm-acara-add') ?>" method="post" onsubmit="return confirm('Simpan Data?');">
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Acara</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="judul" required>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Waktu Acara</label>
              <div class="col-sm-12 col-md-7">
                <input type="datetime-local" class="form-control" name="waktu" required>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Acara</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="summernote" name="isi" required></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7 text-right">
                <button class="btn btn-primary" type="submit">Buat Acara</button>
                <button class="btn btn-secondary" type="button" onclick="cancel_add()">Batal</button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body" id="tbl_update" style="display: none;">
          <form action="<?= base_url('usm-acara-update') ?>" method="post" onsubmit="return confirm('Simpan Data?');">
            <input type="hidden" name="id" id="u-id-acara" required>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Acara</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="judul" required id="u-judul">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Waktu Acara</label>
              <div class="col-sm-12 col-md-7">
                <input type="datetime-local" class="form-control" name="waktu" required id="u-waktu">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Acara</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="summernote" name="isi" required id="u-isi"></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7 text-right">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-secondary" type="button" onclick="cancel_update()">Batal</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="upload-foto-acara" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('usm-acara-update-foto') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id_acara" id="u-foto-acara" required>
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
      <form action="<?= base_url('usm-acara-delete') ?>" method="post">
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
<script>
  function add_acara() {
    $('#tbl_data').slideUp();
    $('#btn-add').slideUp();
    $('#tbl_add').slideDown('slow');
  }

  //cancell add
  function cancel_add() {
    $('#tbl_add').slideUp();
    $('#btn-add').slideDown('slow');
    $('#tbl_data').slideDown('slow');
  }

  //upload foto Acara
  function upload_foto(id, foto) {
    $('#u-foto-acara').val(id);
    $('#u-foto-lama').val(foto);
    $('#upload-foto-acara').modal('show');
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

  function update_acara(id) {
    $.ajax({
      url: "<?= base_url('usm-get-acara') ?>",
      method: "POST",
      dataType: 'json',
      data: { id_acara: id },
      success: function (data) {
        $('#u-id-acara').val(data.id_acara);
        $('#u-judul').val(data.nama_acara);
        $('#u-waktu').val(data.waktu_acara);
        $('#u-isi').summernote("code", data.isi_acara);
        console.log(data);
      },
      error: function (data) {
        alert(data.responseText)
      }
    });
    $('#judul').text('Update Acara');
    $('#btn-add').slideUp('slow');
    $('#tbl_data').slideUp('slow');
    $('#tbl_update').slideDown('slow');
  }

  //batal update
  function cancel_update() {
    $('#judul').text('Daftar Acara');
    $('#tbl_update').slideUp('slow');
    $('#btn-add').slideDown('slow');
    $('#tbl_data').slideDown('slow');
  }

  //hapus data
  function hapus_data(id, judul, old) {
    $('#h_id').val(id);
    $('#h_old').val(old);
    $('#h_text').text(judul);
    $('#modal-hapus').modal('show');
  }
</script>