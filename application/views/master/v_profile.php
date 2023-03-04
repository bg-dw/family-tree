<section class="section">
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                    <div class="card-body">
                        <div class="author-box-center">
                            <img alt="image" src="<?= base_url() ?>assets/img/users/<?php if ($this->session->userdata('pic')):
                                  echo $this->session->userdata('pic');
                              else:
                                  echo 'none.png';
                              endif; ?>" class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            <div class="author-box-name">
                                <a href="#">
                                    <?= $this->session->userdata('nama_l') ?>
                                </a>
                            </div>
                            <div class="author-box-job">
                                <?= $this->session->userdata('work') ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Follow
                                    <?= $this->session->userdata('nama') ?> On
                                </div>
                            </div>
                            <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <div class="w-100 d-sm-none"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pribadi</h4>
                    </div>
                    <div class="card-body">
                        <div class="py-4">
                            <p class="clearfix">
                                <span class="float-left">
                                    Lahir di
                                </span>
                                <span class="float-right text-muted">
                                    <?= $this->session->userdata('born') . ", " . date('d M Y', strtotime($this->session->userdata('date'))) ?>
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Telp.
                                </span>
                                <span class="float-right text-muted">
                                    <?= $this->session->userdata('telp') ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="padding-20">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                    aria-selected="true">Tentang Saya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                    aria-selected="false">Perbaharui Data</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade show active" id="about" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-8 col-12">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control"
                                                value="<?= $this->session->userdata('nama_l') ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-4 col-12">
                                            <label>Nama Panggilan</label>
                                            <input type="text" class="form-control"
                                                value="<?= $this->session->userdata('nama') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label class="d-block">Jenis Kelamin</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    value="male" <?php if($this->session->userdata('sex')=='male'):echo "checked";endif; ?> disabled>
                                                <label class="form-check-label">Laki - Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    value="female" <?php if ($this->session->userdata('sex') == 'female'):
                                                        echo "checked"; endif; ?> disabled>
                                                <label class="form-check-label">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" value="<?= $this->session->userdata('born') ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" value="<?=date('Y-m-d',strtotime($this->session->userdata('date'))) ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                            <label>Pekerjaan</label>
                                            <input type="text" class="form-control" value="<?= $this->session->userdata('work')?>" readonly>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label>No. Telp</label>
                                            <input type="text" class="form-control" value="<?= $this->session->userdata('telp') ?>" minlength="5" maxlength="15" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-8 col-12">
                                            <label>alamat</label>
                                            <textarea
                                                class="form-control summernote-simple" readonly><?= $this->session->userdata('addr') ?></textarea>
                                        </div>
                                        <div class="form-group col-md-2 col-12">
                                            <label>RT</label>
                                            <input type="number" class="form-control" value="<?= $this->session->userdata('rt') ?>" min="1" readonly>
                                        </div>
                                        <div class="form-group col-md-2 col-12">
                                            <label>RW</label>
                                            <input type="text" class="form-control" value="<?= $this->session->userdata('rw') ?>" min="1" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Desa</label>
                                            <input type="text" class="form-control" value="<?= $this->session->userdata('desa') ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control" value="<?= $this->session->userdata('kec') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kabupaten</label>
                                            <input type="text" class="form-control" value="<?= $this->session->userdata('kab') ?>" readonly>
                                        </div> 
                                        <div class="form-group col-md-6 col-12">
                                            <label>Provinsi</label>
                                            <input type="text" class="form-control" value="<?= $this->session->userdata('prov') ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                                <form method="post" class="needs-validation" action="<?=base_url('master/profile/update/')?>">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-8 col-12">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_l"
                                                    value="<?= $this->session->userdata('nama_l') ?>" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi nama lengkap anda!
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 col-12">
                                                <label>Nama Panggilan</label>
                                                <input type="text" class="form-control" name="nama_p"
                                                    value="<?= $this->session->userdata('nama') ?>" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi nama panggilan anda!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label class="d-block">Jenis Kelamin</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jk" id="lk"
                                                        value="male" <?php if($this->session->userdata('sex')=='male'):echo "checked";endif; ?>>
                                                    <label class="form-check-label" for="lk">Laki - Laki</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jk" id="pr"
                                                        value="female" <?php if ($this->session->userdata('sex') == 'female'):
                                                            echo "checked"; endif; ?>>
                                                    <label class="form-check-label" for="pr">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-7 col-12">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" name="born" value="<?= $this->session->userdata('born') ?>"
                                                    required>
                                                <div class="invalid-feedback">
                                                    Mohon isi tempat lahir anda!
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5 col-12">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tgl" value="<?=date('Y-m-d',strtotime($this->session->userdata('date'))) ?>" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi tempat lahir anda!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-7 col-12">
                                                <label>Pekerjaan</label>
                                                <input type="text" class="form-control" name="pekerjaan" value="<?= $this->session->userdata('work')?>">
                                                <div class="invalid-feedback">
                                                    Mohon isi pekerjaan anda!
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5 col-12">
                                                <label>No. Telp</label>
                                                <input type="text" class="form-control" name="telp" value="<?= $this->session->userdata('telp') ?>" minlength="5" maxlength="15" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi nomor telp anda!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-8 col-12">
                                                <label>alamat</label>
                                                <textarea
                                                    class="form-control summernote-simple" name="alamat"><?= $this->session->userdata('addr') ?></textarea>
                                            </div>
                                            <div class="form-group col-md-2 col-12">
                                                <label>RT</label>
                                                <input type="number" class="form-control" name="rt" value="<?= $this->session->userdata('rt') ?>" min="1" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi RT anda!
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 col-12">
                                                <label>RW</label>
                                                <input type="number" class="form-control" name="rw" value="<?= $this->session->userdata('rw') ?>" min="1" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi RW anda!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Desa</label>
                                                <input type="text" class="form-control" name="desa" value="<?= $this->session->userdata('desa') ?>" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi desa anda!
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Kecamatan</label>
                                                <input type="text" class="form-control" name="kec" value="<?= $this->session->userdata('kec') ?>" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi kecamatan anda!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Kabupaten</label>
                                                <input type="text" class="form-control" name="kab" value="<?= $this->session->userdata('kab') ?>" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi kabupaten anda!
                                                </div>
                                            </div> 
                                            <div class="form-group col-md-6 col-12">
                                                <label>Provinsi</label>
                                                <input type="text" class="form-control" name="prov" value="<?= $this->session->userdata('prov') ?>" required>
                                                <div class="invalid-feedback">
                                                    Mohon isi provinsi anda!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>