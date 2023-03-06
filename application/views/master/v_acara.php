<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Daftar Acara</h4>
          <div class="card-header-action">
            <a href="#" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">
                    #
                  </th>
                  <th>Acara</th>
                  <th>Tgl. Acara</th>
                  <th>Waktu Acara</th>
                  <th>Pembuat Acara</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($rec as $baris):
                  $a = explode(" ", $baris->waktu_acara) ?>
                  <tr>
                    <td class="text-center">
                      <?= $i . "." ?>
                    </td>
                    <td>
                      <?= $baris->nama_acara ?>
                    </td>
                    <td>
                      <?= date("d m Y", strtotime($a[0])) ?>
                    </td>
                    <td>
                      <?= $a[1] ?>
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
      </div>
    </div>
  </div>
</div>