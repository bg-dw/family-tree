<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Data Keluarga</h4>
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
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Tanggal Lahir</th>
                  <th class="text-center">Pekerjaan</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">Akses Login</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($rec as $baris): ?>
                  <tr>
                    <td>
                      <?= $i . "." ?>
                    </td>
                    <td>
                      <?= $baris->name ?>
                    </td>
                    <td class="text-center">
                      <?= date('d M Y', strtotime($baris->birth_date)) ?>
                    </td>
                    <td>
                      <?= $baris->pekerjaan ?>
                    </td>
                    <td>
                      <?= $baris->alamat ?>
                    </td>
                    <td class="text-center">
                      <?php if ($baris->login == "acc"): ?>
                        <div class="badge badge-success badge-shadow">Bisa</div>
                      <?php else: ?>
                        <div class="badge badge-danger badge-shadow">Tidak Bisa</div>
                      <?php endif; ?>
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