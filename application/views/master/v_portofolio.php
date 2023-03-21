<div class="section-body" style="margin-top: -40px;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 id="judul">Daftar Portofolio</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary" onclick="add_data()" id="btn-add">Tambah <i
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
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Judul Porto</th>
                                    <th class="text-center">Gambar Porto</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($rec):
                                    $i = 1;
                                    foreach ($rec as $baris): ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i . "." ?>
                                            </td>
                                            <td>
                                                <?= $baris->name ?>
                                            </td>
                                            <td>
                                                <?= $baris->judul_porto ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($baris->gambar_porto): ?>
                                                    <img alt="image"
                                                        src="<?= base_url() ?>assets/img/porto/<?= $baris->gambar_porto ?>"
                                                        width="120" height="50" data-toggle="modal" data-target="#upload-foto-porto"
                                                        title="Klik untuk edit"
                                                        onclick="upload_foto('<?= $baris->id_porto ?>','<?= $baris->gambar_porto ?>')">
                                                <?php else: ?>
                                                    <img alt="image" src="<?= base_url() ?>assets/img/users/none.png" width="120"
                                                        height="50" data-toggle="modal" data-target="#upload-foto-porto"
                                                        title="Klik untuk edit"
                                                        onclick="upload_foto('<?= $baris->id_porto ?>','<?= $baris->gambar_porto ?>')">
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                    onclick="update_porto('<?= $baris->id_porto ?>')"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                    onclick="hapus_data('<?= $baris->id_porto ?>','<?= $baris->judul_porto ?>','<?= $baris->gambar_porto ?>')"><i
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
                    <form action="<?= base_url('master-portofolio-add') ?>" method="post"
                        onsubmit="return confirm('Simpan Data?');">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="isi" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7 text-right">
                                <button class="btn btn-primary" type="submit">Buat Portofolio</button>
                                <button class="btn btn-secondary" type="button" onclick="cancel_add()">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body" id="tbl_update" style="display: none;">
                    <form action="<?= base_url('master-portofolio-update') ?>" method="post"
                        onsubmit="return confirm('Simpan Data?');">
                        <input type="hidden" name="id_porto" id="u-id-porto">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="judul" id="u-judul" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="isi" required id="u-isi-porto"></textarea>
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

<div class="modal fade" id="upload-foto-porto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master-update-foto-porto') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_porto" id="u-foto-porto" required>
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
            <form action="<?= base_url('master-delete-porto') ?>" method="post">
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
    //tambah data
    function add_data() {
        $('#judul').text('Tambah Portofolio');
        $('#btn-add').slideUp('slow');
        $('#tbl_data').slideUp('slow');
        $('#tbl_add').slideDown('slow');
    }
    //batal tambah
    function cancel_add() {
        $('#judul').text('Daftar Portofolio');
        $('#tbl_add').slideUp('slow');
        $('#btn-add').slideDown('slow');
        $('#tbl_data').slideDown('slow');
    }

    //upload foto Porto
    function upload_foto(id, foto) {
        $('#u-foto-porto').val(id);
        $('#u-foto-lama').val(foto);
        $('#upload-foto-porto').modal('show');
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

    function update_porto(id) {
        $.ajax({
            url: "<?= base_url('master-get-porto') ?>",
            method: "POST",
            dataType: 'json',
            data: { id_porto: id },
            success: function (data) {
                $('#u-id-porto').val(data.id_porto);
                $('#u-judul').val(data.judul_porto);
                $('#u-isi-porto').summernote("code", data.isi_porto);
            },
            error: function (data) {
                alert(data.responseText)
            }
        });
        $('#judul').text('Update Portofolio');
        $('#btn-add').slideUp('slow');
        $('#tbl_data').slideUp('slow');
        $('#tbl_update').slideDown('slow');
    }

    //batal update
    function cancel_update() {
        $('#judul').text('Daftar Portofolio');
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