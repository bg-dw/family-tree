<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Portofolio</h4>
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
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Judul Porto</th>
                                    <th class="text-center">Gambar Porto</th>
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
                                            <?= $baris->judul_porto ?>
                                        </td>
                                        <td>
                                            <img alt="image" src="<?= base_url() ?>assets/img/users/user-5.png" width="35">
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body" id="tbl_add" style="display: none;">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric">
                                <option>Tech</option>
                                <option>News</option>
                                <option>Political</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control inputtags">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric">
                                <option>Publish</option>
                                <option>Draft</option>
                                <option>Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Buat Acara</button>
                            <button class="btn btn-secondary" onclick="cancel_add()">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //tambah data
    function add_data() {
        $('#judul').text('Tambah Hubungan Keluarga');
        $('#btn-add').slideUp('slow');
        $('#tbl_data').slideUp('slow');
        $('#tbl_add').slideDown('slow');
    }
    //batal tambah
    function cancel_add() {
        $('#judul').text('Hubungan Keluarga');
        $('#tbl_add').slideUp('slow');
        $('#btn-add').slideDown('slow');
        $('#tbl_data').slideDown('slow');
    }
</script>