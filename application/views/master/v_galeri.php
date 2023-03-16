<div class="section-body" style="margin-top: -40px;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 id="judul">Daftar Galeri</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary" onclick="add_data()" id="btn-add">Tambah <i
                                class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body" id="tbl_data">
                    <div style="max-width: 200px;">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Judul Galeri</th>
                                    <th class="text-center">Link Media</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($rec as $baris): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $i . "." ?>
                                        </td>
                                        <td>
                                            <?= $baris->name ?>
                                        </td>
                                        <td>
                                            <?= $baris->judul_galeri ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $baris->media_galeri ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                onclick="update_galeri('<?= $baris->id_galeri ?>')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                onclick="hapus_data('<?= $baris->id_galeri ?>','<?= $baris->media_galeri ?>')"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body" id="tbl_add" style="display: none;">
                    <form action="<?= base_url('master-galeri-add') ?>" method="post"
                        onsubmit="return confirm('Simpan Data?');">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Media</label
                                label><br>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="cr1" name="media" value="foto" class="custom-control-input"
                                        checked>
                                    <label class="custom-control-label" for="cr1">Gambar</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="cr2" name="media" value="video"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="cr2">Video</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Media</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="url" class="form-control" name="link" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Galeri</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Galeri</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="isi" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7 text-right">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="button" onclick="cancel_add()">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body" id="tbl_update" style="display: none;">
                    <form action="<?= base_url('master-galeri-update') ?>" method="post"
                        onsubmit="return confirm('Simpan Data?');">
                        <input type="hidden" name="id_galeri" id="u-id-galeri">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Media</label
                                label><br>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="ucr1" name="media" value="foto" class="custom-control-input"
                                        checked>
                                    <label class="custom-control-label" for="ucr1">Gambar</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="ucr2" name="media" value="video"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="ucr2">Video</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Media</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="url" class="form-control" name="link" required id="u-link">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="judul" id="u-judul" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="isi" required id="u-isi-galeri"></textarea>
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master-galeri-delete') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="h_id" required>
                    <div class="text-center">
                        <iframe src="" frameborder="0" id="h_media" scrolling="no" style="zoom: 0.750;"></iframe>
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
<script async src="//www.instagram.com/embed.js"></script>
<script>
    //tambah data
    function add_data() {
        $('#judul').text('Tambah Galeri');
        $('#btn-add').slideUp('slow');
        $('#tbl_data').slideUp('slow');
        $('#tbl_add').slideDown('slow');
    }
    //batal tambah
    function cancel_add() {
        $('#judul').text('Daftar Galeri');
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

    function update_galeri(id) {
        $.ajax({
            url: "<?= base_url('master-galeri-get') ?>",
            method: "POST",
            dataType: 'json',
            data: { id_galeri: id },
            success: function (data) {
                $('#u-id-galeri').val(data.id_galeri);
                if (data.jenis_media == "foto") {
                    $('#ucr1').prop('checked', true);
                } else {
                    $('#ucr2').prop('checked', true);
                }
                $('#u-link').val("https://www.instagram.com/" + data.media_galeri + "embed/");
                $('#u-judul').val(data.judul_galeri);
                $('#u-isi-galeri').summernote("code", data.isi_galeri);
            },
            error: function (data) {
                alert(data.responseText)
            }
        });
        $('#judul').text('Update Galeri');
        $('#btn-add').slideUp('slow');
        $('#tbl_data').slideUp('slow');
        $('#tbl_update').slideDown('slow');
    }

    //batal update
    function cancel_update() {
        $('#judul').text('Daftar Galeri');
        $('#tbl_update').slideUp('slow');
        $('#btn-add').slideDown('slow');
        $('#tbl_data').slideDown('slow');
    }

    //hapus data
    function hapus_data(id, media) {
        $('#h_id').val(id);
        $('#h_media').attr("src", "https://www.instagram.com/" + media + "embed");
        $('#modal-hapus').modal('show');
    }
</script>