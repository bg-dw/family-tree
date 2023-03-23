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
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Link Media</th>
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
                                        <?php $i++;
                                    endforeach;
                                endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body" id="tbl_add" style="display: none;">
                    <form action="<?= base_url('usm-galeri-add') ?>" method="post"
                        onsubmit="return confirm('Simpan Data?');">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Media</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="url" class="form-control" name="link" required>
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
                    <form action="<?= base_url('usm-galeri-update') ?>" method="post"
                        onsubmit="return confirm('Simpan Data?');">
                        <input type="hidden" name="id_galeri" id="u-id-galeri">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Media</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="url" class="form-control" name="link" required id="u-link">
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
            <form action="<?= base_url('usm-galeri-delete') ?>" method="post">
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

    function update_galeri(id) {
        $.ajax({
            url: "<?= base_url('usm-galeri-get') ?>",
            method: "POST",
            dataType: 'json',
            data: { id_galeri: id },
            success: function (data) {
                $('#u-id-galeri').val(data.id_galeri);
                $('#u-link').val("https://www.instagram.com/" + data.media_galeri + "embed/");
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