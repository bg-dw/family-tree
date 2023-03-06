<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hubungan Keluarga</h4>
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
                                            <a class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $x++; endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>