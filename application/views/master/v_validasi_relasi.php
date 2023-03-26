<div class="section-body" style="margin-top: -40px;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 id="judul">Permintaan Hubungan Keluarga</h4>
                </div>
                <div class="card-body" id="tbl_data">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">Nama Ayah</th>
                                    <th class="text-center">Nama Pasangan</th>
                                    <th class="text-center">Permintaan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($rec):
                                    $x = 1;
                                    for ($i = 0; $i < count($rec); $i++): ?>
                                        <tr>
                                            <td>
                                                <?= $x . "." ?>
                                            </td>
                                            <td>
                                                <?= $rec[$i]['nama'] ?>
                                            </td>
                                            <td>
                                                <?php if ($rec[$i]['ibu']):
                                                    echo $rec[$i]['ibu'];
                                                else:
                                                    echo "-";
                                                endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($rec[$i]['ayah']):
                                                    echo $rec[$i]['ayah'];
                                                else:
                                                    echo "-";
                                                endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($rec[$i]['pasangan']):
                                                    echo $rec[$i]['pasangan'];
                                                else:
                                                    echo "-";
                                                endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($rec[$i]['aksi'] == "add"): ?>
                                                    <div class="badge badge-success badge-shadow">Tambah Data</div>
                                                <?php elseif ($rec[$i]['aksi'] == "update"): ?>
                                                    <div class="badge badge-warning badge-shadow">Ubah Data</div>
                                                <?php else: ?>
                                                    <div class="badge badge-danger badge-shadow">Hapus Data</div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($rec[$i]['acc_admin'] == "waiting"): ?>
                                                    <div class="badge badge-warning badge-shadow">Menunggu Persetujuan</div>
                                                <?php else: ?>
                                                    <div class="badge badge-danger badge-shadow">Ditolak</div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($rec[$i]['acc_admin'] != "rejected"): ?>
                                                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Lihat"
                                                        onclick="lihat_data('<?= $rec[$i]['aksi'] ?>','<?= $rec[$i]['id_temp_bio'] ?>','<?= $rec[$i]['id_user'] ?>','<?= $rec[$i]['id_bio'] ?>')"><i
                                                            class="fas fa-file-alt"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Hapus"
                                                    onclick="hapus_data('<?= $rec[$i]['id_temp_bio'] ?>','<?= $rec[$i]['nama'] ?>')"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $x++; endfor; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body" id="tbl_permintaan_add" style="display:none;">
                    <form action="<?= base_url('master-add-relasi-val') ?>" method="post"
                        onsubmit="return cek_form('a');" id="f-permintaan-add">
                        <div class="form-group row mb-4">
                            <input type="hidden" name="id_temp_bio" id="a-id-temp-bio" required>
                            <input type="hidden" name="aksi_val" id="a-ak" required>
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Anda</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_user" id="a-sel-user" required
                                    style="width:100%;" readonly="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="a-f-pasangan">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pasangan</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_pasangan" id="a-sel-pasangan"
                                    style="width:100%;">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="a-f-ibu">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ibu</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_ibu" id="a-sel-ibu" style="width:100%;"
                                    onchange="set_gen_ibu('a');">
                                </select>
                            </div>
                            <input type="hidden" name="gen_ibu" id="a-inp-gen-ibu">
                        </div>
                        <div class="form-group row mb-4" id="a-f-ayah">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_ayah" id="a-sel-ayah" style="width:100%;"
                                    onchange="set_gen_ayah('a');">
                                </select>
                            </div>
                            <input type=" hidden" name="gen_ayah" id="a-inp-gen-ayah">
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7 text-right">
                                <button type="button" class="btn btn-primary btn-add-permintaan"
                                    onclick="return aksi_validasi_add('setuju')">Setuju</button>
                                <button type="button" class="btn btn-danger btn-add-permintaan"
                                    onclick="return aksi_validasi_add('tolak')">Tolak</button>
                                <button class="btn btn-secondary" type="button" onclick="cancel_add()">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body" id="tbl_permintaan_update" style="display:none;">
                    <form action="<?= base_url('master-update-relasi-val') ?>" method="post"
                        onsubmit="return cek_form('u');" id="f-permintaan-update">
                        <input type="hidden" name="id_temp_bio" id="u-id-temp-bio" required>
                        <input type="hidden" name="id_bio" id="u-id-bio" required>
                        <input type="hidden" name="aksi_val" id="u-ak" required>
                        <div class="table-responsive">
                            <table width="100%" border="1">
                                <tr>
                                    <th class="text-center">Attribut</th>
                                    <th class="text-center">Data Lama</th>
                                    <th class="text-center">Data Baru</th>
                                    <th class="text-center">Hasil</th>
                                </tr>
                                <tr>
                                    <th>Nama Anda</th>
                                    <th>
                                        <select class="form-control select2" id="l-sel-user" style="width:100%;"
                                            disabled>
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control select2" name="id_user" id="u-sel-user" required
                                            style="width:100%;" readonly="">
                                        </select>
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Nama Pasangan</th>
                                    <th>
                                        <select class="form-control select2" id="l-sel-pasangan" style="width:100%;"
                                            disabled>
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control select2" name="id_pasangan" id="u-sel-pasangan"
                                            style="width:100%;">
                                        </select>
                                    </th>
                                    <th class="text-center" style="color:white" id="r-pas"></th>
                                </tr>
                                <tr>
                                    <th>Nama Ibu</th>
                                    <th>
                                        <select class="form-control select2" id="l-sel-ibu" style="width:100%;"
                                            disabled>
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control select2" name="id_ibu" id="u-sel-ibu"
                                            style="width:100%;" onchange="set_gen_ibu('u');">
                                        </select>
                                        <input type="hidden" name="gen_ibu" id="u-inp-gen-ibu">
                                    </th>
                                    <th class="text-center" style="color:white" id="r-ibu"></th>
                                </tr>
                                <tr>
                                    <th>Nama Ayah</th>
                                    <th>
                                        <select class="form-control select2" id="l-sel-ayah" style="width:100%;"
                                            disabled>
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-control select2" name="id_ayah" id="u-sel-ayah"
                                            style="width:100%;" onchange="set_gen_ayah('u');>
                                        </select>
                                        <input type=" hidden" name="gen_ayah" id="u-inp-gen-ayah">
                                    </th>
                                    <th class="text-center" style="color:white" id="r-ayah"></th>
                                </tr>
                            </table>
                            <div class="col-md-12">
                                <div class="form-group row mb-4 mt-4 pull-right">
                                    <button type="button" class="btn btn-primary btn-add-permintaan mr-1"
                                        onclick="return aksi_validasi_update('setuju')">Setuju</button>
                                    <button type="button" class="btn btn-danger btn-add-permintaan mr-1"
                                        onclick="return aksi_validasi_update('tolak')">Tolak</button>
                                    <button class="btn btn-secondary" type="button"
                                        onclick="cancel_update()">Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body" id="tbl_permintaan_delete" style="display:none;">
                    <form action="<?= base_url('master-delete-relasi-val') ?>" method="post"
                        onsubmit="return cek_form('d');" id="f-permintaan-del">
                        <div class="form-group row mb-4">
                            <input type="hidden" name="id_temp_bio" id="d-id-temp-bio" required>
                            <input type="hidden" name="id_bio" id="d-id-bio" required>
                            <input type="hidden" name="aksi_val" id="d-ak" required>
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Anda</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_user" id="d-sel-user" required
                                    style="width:100%;" disabled>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="a-f-pasangan">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pasangan</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_pasangan" id="d-sel-pasangan"
                                    style="width:100%;" disabled>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="a-f-ibu">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ibu</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_ibu" id="d-sel-ibu" style="width:100%;"
                                    disabled>
                                </select>
                            </div>
                            <input type="hidden" name="gen_ibu" id="d-inp-gen-ibu">
                        </div>
                        <div class="form-group row mb-4" id="a-f-ayah">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_ayah" id="d-sel-ayah" style="width:100%;"
                                    disabled>
                                </select>
                            </div>
                            <input type="hidden" name="gen_ayah" id="d-inp-gen-ayah">
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7 text-right">
                                <button type="button" class="btn btn-primary btn-add-permintaan"
                                    onclick="return aksi_validasi_del('setuju')">Setuju</button>
                                <button type="button" class="btn btn-danger btn-add-permintaan"
                                    onclick="return aksi_validasi_del('tolak')">Tolak</button>
                                <button class="btn btn-secondary" type="button" onclick="cancel_add()">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" id="modal-notif">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-notif"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h4 id="text-notif"></h4>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" id="modal-conf">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-conf"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master-delete-permintaan-relasi') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="h_id" required>
                    <div class="text-center">
                        <h4 id="text-conf"></h4>
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
    //lihat data
    function lihat_data(aksi, id, id_user, id_bio) {
        var permintaan = "";
        if (aksi == "add") {
            add(id, "a");
            permintaan = "Tambah Relasi";
            $('#tbl_permintaan_add').slideDown('slow');
        } else if (aksi == "update") {
            update(id, "u");
            data_lama(id_bio);
            permintaan = "Ganti Relasi";
            $('#tbl_permintaan_update').slideDown('slow');
        } else if (aksi == "delete") {
            delete_data(id, "d");
            permintaan = "Hapus Relasi";
            $('#tbl_permintaan_delete').slideDown('slow');
        }
        $('#judul').text('Lihat Permintaan ' + permintaan);
        $('#tbl_data').slideUp('slow');
    }

    //permintaan tambah data
    function add(id, par) {
        $.ajax({
            url: "<?= base_url('master-get-bio') ?>",
            method: "POST",
            data: { id_temp_bio: id },
            dataType: 'json',
            success: function (data) {
                $('#' + par + '-id-temp-bio').val(data.id_temp_bio);
                $('#' + par + '-sel-user').append('<option value="' + data.id_user + '" selected>' + data.name + '</option>');
                add_pasangan(data.id_user, data.sex, data.ibu, data.ayah, data.pasangan, par);
                setTimeout(() => {
                    set_gen_ibu('a');
                    set_gen_ayah('a');
                }, 200);//milisecond
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }
    function aksi_validasi_add(val) {
        $('#a-ak').val(val);
        if (val == "setuju") {
            var x = confirm("Terima Permintaan Tambah Relasi?");
            if (x == true) {
                $('#f-permintaan-add').submit();
            } else {
                return false;
            }
        } else if (val == "tolak") {
            var x = confirm("Tolak Permintaan Tambah Relasi?");
            if (x == true) {
                $('#f-permintaan-add').submit();
            } else {
                return false;
            }
        }
    }
    //batal add
    function cancel_add() {
        $('#judul').text('Permintaan Hubungan Keluarga');
        $('#tbl_permintaan_add').slideUp('slow');
        $('#tbl_data').slideDown('slow');
    }

    //permintaan update data
    function update(id, par) {
        $.ajax({
            url: "<?= base_url('master-get-bio') ?>",
            method: "POST",
            data: { id_temp_bio: id },
            dataType: 'json',
            success: function (data) {
                $('#' + par + '-id-temp-bio').val(data.id_temp_bio);
                $('#' + par + '-id-bio').val(data.id_bio);
                $('#' + par + '-sel-user').append('<option value="' + data.id_user + '" selected class="opt-sel">' + data.name + '</option>');
                add_pasangan(data.id_user, data.sex, data.ibu, data.ayah, data.pasangan, par);
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }
    function data_lama(id) {
        $.ajax({
            url: "<?= base_url('master-get-bio-lama') ?>",
            method: "POST",
            data: { id_bio: id },
            dataType: 'json',
            success: function (data) {
                $('#l-id-temp-bio').val(data.id_temp_bio);
                $('#l-sel-user').append('<option value="' + data.id_user + '" selected>' + data.name + '</option>');
                add_pasangan(data.id_user, data.sex, data.ibu, data.ayah, data.pasangan, "l");
                setTimeout(() => {
                    cek_data();
                }, 200);//milisecond
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }

    function aksi_validasi_update(val) {
        $('#u-ak').val(val);
        if (val == "setuju") {
            var x = confirm("Terima Permintaan Hapus?");
            if (x == true) {
                $('#f-permintaan-update').submit();
            } else {
                return false;
            }
        } else if (val == "tolak") {
            var x = confirm("Tolak Permintaan Hapus?");
            if (x == true) {
                $('#f-permintaan-update').submit();
            } else {
                return false;
            }
        }
    }
    //batal update
    function cancel_update() {
        $('#judul').text('Permintaan Hubungan Keluarga');
        $('#tbl_permintaan_update').slideUp('slow');
        $('#tbl_data').slideDown('slow');
    }

    function cek_form(par) {
        var us = $("#" + par + "-sel-user").val();
        var ps = $("#" + par + "-sel-pasangan").val();
        var ibu = $("#" + par + "-sel-ibu").val();
        var ayah = $("#" + par + "-sel-ayah").val();
        if (us == "") {
            $("#modal-notif").modal('show');
            $("#judul-notif").text("Peringatan!");
            $("#text-notif").text("Silahkan pilih nama anda!");
            return false;
        } else {
            if (ps != "") {
                if (ps == ibu || ps == ayah) {
                    $("#modal-notif").modal('show');
                    $("#judul-notif").text("Peringatan!");
                    $("#text-notif").text("Pasangan tidak boleh sama dengan orang tua!");
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }
        }
    }

    function add_pasangan(id, sex, id_ibu, id_ayah, id_pas, par) {
        var id_pil = id + "," + sex;
        $.ajax({
            url: "<?= base_url('master-get-pasangan') ?>",
            method: "POST",
            data: { id_user: id_pil },
            dataType: 'json',
            success: function (data) {
                $('#' + par + '-sel-pasangan').html(data);
                $('#' + par + '-sel-pasangan').val(id_pas).trigger('change');
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
        update_ortu("male", id_ibu, id_ayah, par);//ayah
        update_ortu("female", id_ibu, id_ayah, par);//ibu
    }

    function update_ortu(sex, id_ibu, id_ayah, par) {
        var id = $('#' + par + '-sel-user').val();
        $.ajax({
            url: "<?= base_url('master-get-ortu') ?>",
            method: "POST",
            data: { jk: sex, id_user: id },
            dataType: 'json',
            success: function (data) {
                if (sex == "male") {
                    $('#' + par + '-sel-ayah').html(data);
                    $('#' + par + '-sel-ayah').val(id_ayah).trigger('change');
                } else {
                    $('#' + par + '-sel-ibu').html(data);
                    $('#' + par + '-sel-ibu').val(id_ibu).trigger('change');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }
    function cek_data() {
        if ($('#u-sel-pasangan').val() != $('#l-sel-pasangan').val()) {
            $('#r-pas').text("Berubah"); $('#r-pas').css("background-color", "red");
        }
        if ($('#u-sel-ibu option:selected').text() != $('#l-sel-ibu option:selected').text()) {
            $('#r-ibu').text("Berubah"); $('#r-ibu').css("background-color", "red");
        }
        if ($('#u-sel-ayah').val() != $('#l-sel-ayah').val()) {
            $('#r-ayah').text("Berubah"); $('#r-ayah').css("background-color", "red");
        }
        set_gen_ibu('u');
        set_gen_ayah('u');
    }

    //set gen ibu
    function set_gen_ibu(par) {
        var x = $("#" + par + "-sel-ibu").find(":selected").text();
        var a = x.split('Gen-');
        $("#" + par + "-inp-gen-ibu").val(a[1]);
    }
    //set gen ayah
    function set_gen_ayah(par) {
        var x = $("#" + par + "-sel-ayah").find(":selected").text();
        var a = x.split('Gen-');
        $("#" + par + "-inp-gen-ayah").val(a[1]);
    }

    //permintaan delete data
    function delete_data(id, par) {
        $.ajax({
            url: "<?= base_url('master-get-bio') ?>",
            method: "POST",
            data: { id_temp_bio: id },
            dataType: 'json',
            success: function (data) {
                $('#d-id-temp-bio').val(data.id_temp_bio);
                $('#d-id-bio').val(data.id_bio);
                $('#' + par + '-id-temp-bio').val(data.id_temp_bio);
                $('#' + par + '-sel-user').append('<option value="' + data.id_user + '" selected>' + data.name + '</option>');
                add_pasangan(data.id_user, data.sex, data.ibu, data.ayah, data.pasangan, par);
                setTimeout(() => {
                    set_gen_ibu('d');
                    set_gen_ayah('d');
                }, 200);//milisecond
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }
    function aksi_validasi_del(val) {
        $('#d-ak').val(val);
        if (val == "setuju") {
            var x = confirm("Terima Permintaan Hapus Relasi?");
            if (x == true) {
                $('#f-permintaan-del').submit();
            } else {
                return false;
            }
        } else if (val == "tolak") {
            var x = confirm("Tolak Permintaan Hapus Relasi?");
            if (x == true) {
                $('#f-permintaan-del').submit();
            } else {
                return false;
            }
        }
    }
    //batal add
    function cancel_del() {
        $('#judul').text('Permintaan Hubungan Keluarga');
        $('#tbl_permintaan_delete').slideUp('slow');
        $('#tbl_data').slideDown('slow');
    }
    //hapus data
    function hapus_data(id, nama) {
        $('#h_id').val(id);
        $('#judul-conf').text('Hapus Permintaan?');
        $('#text-conf').text(nama);
        $('#modal-conf').modal('show');
    }
</script>