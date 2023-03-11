<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 id="judul">Hubungan Keluarga</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary" id="btn-add" onclick="add_data();">Tambah <i
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
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">Nama Ayah</th>
                                    <th class="text-center">Nama Pasangan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1;
                                for ($i = 0; $i < count($rec); $i++): ?>
                                    <tr>
                                        <td>
                                            <?= $x . "." ?>
                                        </td>
                                        <td>
                                            <?= $rec[$i]['nama'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $rec[$i]['ibu'] ?>
                                        </td>
                                        <td>
                                            <?= $rec[$i]['ayah'] ?>
                                        </td>
                                        <td>
                                            <?= $rec[$i]['pasangan'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                onclick="update_data('<?= $rec[$i]['id_bio'] ?>','<?= $rec[$i]['id_user'] ?>','<?= $rec[$i]['nama'] ?>','<?= $rec[$i]['sex'] ?>','<?= $rec[$i]['id_ibu'] ?>','<?= $rec[$i]['id_ayah'] ?>','<?= $rec[$i]['id_pasangan'] ?>')"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Hapus"
                                                onclick="hapus_data('<?= $rec[$i]['id_bio'] ?>','<?= $rec[$i]['nama'] ?>')"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $x++; endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="<?= base_url('master-add-relasi') ?>" method="post" onsubmit="return cek_form();"
                    id="tbl_add" style="display:none;">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Anda</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_user" id="sel-user" required
                                    style="width:100%;" onchange="pasangan(this)">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="f-pasangan" style="display:none;">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pasangan</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_pasangan" id="sel-pasangan"
                                    style="width:100%;">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="f-ibu" style="display:none;">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ibu</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_ibu" id="sel-ibu" style="width:100%;"
                                    onchange="set_gen_ibu()">
                                </select>
                                <input type="hidden" name="gen_ibu" id="inp-gen-ibu">
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="f-ayah" style="display:none;">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_ayah" id="sel-ayah" style="width:100%;"
                                    onchange="set_gen_ayah()">
                                </select>
                                <input type="hidden" name="gen_ayah" id="inp-gen-ayah">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7 text-right">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="button" onclick="cancel_add()">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="<?= base_url('master-update-relasi') ?>" method="post"
                    onsubmit="return cek_form_update();" id="tbl_update" style="display:none;">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <input type="hidden" name="id_bio" id="u-id-bio" required>
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Anda</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_user" id="u-sel-user" required
                                    style="width:100%;" readonly="">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="u-f-pasangan">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pasangan</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_pasangan" id="u-sel-pasangan"
                                    style="width:100%;">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="u-f-ibu">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ibu</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_ibu" id="u-sel-ibu" style="width:100%;">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4" id="u-f-ayah">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control select2" name="id_ayah" id="u-sel-ayah" style="width:100%;">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7 text-right">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="button" onclick="cancel_update()">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
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
            <form action="<?= base_url('master-delete-relasi') ?>" method="post">
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
    //ajax load
    function show() {
        $.ajax({
            url: "<?= base_url('master-get-user-relasi') ?>",
            dataType: 'json',
            success: function (data) {
                $("#sel-user").html(data);
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }

    function ortu(sex) {
        var id = $("#sel-user").val();
        $.ajax({
            url: "<?= base_url('master-get-ortu') ?>",
            method: "POST",
            data: { jk: sex, id_user: id },
            dataType: 'json',
            success: function (data) {
                if (sex == "male") {
                    $("#sel-ayah").html(data);
                    $("#f-ayah").slideDown();
                } else {
                    $("#sel-ibu").html(data);
                    $("#f-ibu").slideDown()
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }

    function pasangan(e) {
        var id_pil = e.value;
        $.ajax({
            url: "<?= base_url('master-get-pasangan') ?>",
            method: "POST",
            data: { id_user: id_pil },
            dataType: 'json',
            success: function (data) {
                $("#sel-pasangan").html(data);
                $("#f-pasangan").slideDown();
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
        ortu("male");//ayah
        ortu("female");//ibu
    }

    //tambah data
    function add_data() {
        $('#judul').text('Tambah Hubungan Keluarga');
        $('#btn-add').slideUp('slow');
        $('#tbl_data').slideUp('slow');
        $('#tbl_add').slideDown('slow');
        show();
    }

    //batal tambah
    function cancel_add() {
        $('#judul').text('Hubungan Keluarga');
        $('#tbl_add').slideUp('slow');
        $('#btn-add').slideDown('slow');
        $('#tbl_data').slideDown('slow');
    }

    //set gen ibu
    function set_gen_ibu() {
        var x = $("#sel-ibu").find(":selected").text();
        var a = x.split('Gen-');
        $("#inp-gen-ibu").val(a[1]);
    }
    //set gen ayah
    function set_gen_ayah() {
        var x = $("#sel-ayah").find(":selected").text();
        var a = x.split('Gen-');
        $("#inp-gen-ayah").val(a[1]);
    }

    function cek_form() {
        var us = $("#sel-user").val();
        var ps = $("#sel-pasangan").val();
        var ibu = $("#sel-ibu").val();
        var ayah = $("#sel-ayah").val();
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
                    var x = confirm("Simpan data?");
                    if (x == true) {
                        return true;
                    } else { return false; }
                }
            } else {
                var x = confirm("Simpan data?");
                if (x == true) {
                    return true;
                } else { return false; }
            }
        }
    }

    function update_pasangan(id, sex, id_ibu, id_ayah, id_pas) {
        var id_pil = id + "," + sex;
        $.ajax({
            url: "<?= base_url('master-get-pasangan') ?>",
            method: "POST",
            data: { id_user: id_pil },
            dataType: 'json',
            success: function (data) {
                $("#u-sel-pasangan").html(data);
                $('#u-sel-pasangan').val(id_pas).trigger('change');
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
        update_ortu("male", id_ibu, id_ayah);//ayah
        update_ortu("female", id_ibu, id_ayah);//ibu
    }
    function update_ortu(sex, id_ibu, id_ayah) {
        var id = $("#u-sel-user").val();
        $.ajax({
            url: "<?= base_url('master-get-ortu') ?>",
            method: "POST",
            data: { jk: sex, id_user: id },
            dataType: 'json',
            success: function (data) {
                if (sex == "male") {
                    $("#u-sel-ayah").html(data);
                    $('#u-sel-ayah').val(id_ayah).trigger('change');
                } else {
                    $("#u-sel-ibu").html(data);
                    $('#u-sel-ibu').val(id_ibu).trigger('change');
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });
    }

    //update data
    function update_data(id_bio, id, nama, sex, id_ibu, id_ayah, id_pas) {
        $('#judul').text('Update Hubungan Keluarga');
        $('#btn-add').slideUp('slow');
        $('#tbl_data').slideUp('slow');
        $('#u-id-bio').val(id_bio);
        $('#u-sel-user').append('<option value="' + id + '" selected>' + nama + '</option>')
        $('#tbl_update').slideDown('slow');
        update_pasangan(id, sex, id_ibu, id_ayah, id_pas);
    }

    //batal update
    function cancel_update() {
        $('#judul').text('Hubungan Keluarga');
        $('#tbl_update').slideUp('slow');
        $('#btn-add').slideDown('slow');
        $('#tbl_data').slideDown('slow');
    }
    function cek_form_update() {
        var us = $("#u-sel-user").val();
        var ps = $("#u-sel-pasangan").val();
        var ibu = $("#u-sel-ibu").val();
        var ayah = $("#u-sel-ayah").val();
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
                    var x = confirm("Simpan data?");
                    if (x == true) {
                        return true;
                    } else { return false; }
                }
            } else {
                var x = confirm("Simpan data?");
                if (x == true) {
                    return true;
                } else { return false; }
            }
        }
    }

    //hapus data
    function hapus_data(id_bio, nama) {
        $('#h_id').val(id_bio);
        $('#judul-conf').text('Hapus Hubungan?');
        $('#text-conf').text(nama);
        $('#modal-conf').modal('show');
    }
</script>