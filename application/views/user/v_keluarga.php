<section class="section" style="margin-top: -40px;">
  <div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
      <div class="card ">
        <?php if ($ortu): ?>
          <div class="card-header d-print-none">
            <h4 id="judul">Data Keluargaku</h4>
            <div class="card-header-action">
              <a href="#" class="btn btn-primary d-print-none"
                onclick="CreatePDFfromHTML('<?= $ortu[0]->name . '-' . date('d-m-Y H:i:s'); ?>');">Cetak <i
                  class="fas fa-print"></i></a>
            </div>
          </div>
          <div class="card-body print-area" style="font-family:sans-serif;">
            <div class="table-responsive">
              <h2 class="text-center" style="font-weight: bold;">DATA KELUARGA</h2>
              <h4 class="text-center">Enc.
                <?= md5($ortu[0]->id_user . $ortu[0]->generasi) ?>
              </h4>
              <div class="col-md-12 mb-3">
                <div class="row">
                  <div class="col-md-7">
                    <table>
                      <tr>
                        <th>Nama Kepala Keluarga</th>
                        <th style="width:10%;" class="text-center"> : </th>
                        <th>
                          <?= $ortu[0]->name ?>
                        </th>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <th style="width:10%;" class="text-center"> : </th>
                        <th>
                          <?= $ortu[0]->alamat ?>
                        </th>
                      </tr>
                      <tr>
                        <th>RT / RW</th>
                        <th style="width:10%;" class="text-center"> : </th>
                        <th>
                          <?= $ortu[0]->rt . " / " . $ortu[0]->rw ?>
                        </th>
                      </tr>
                      <tr>
                        <th>Desa / Kelurahan</th>
                        <th style="width:10%;" class="text-center"> : </th>
                        <th>
                          <?= $ortu[0]->desa ?>
                        </th>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-5">
                    <table class="ml-5">
                      <tr>
                        <th>Kecamatan</th>
                        <th style="width:10%;" class="text-center"> : </th>
                        <th>
                          <?= $ortu[0]->kec ?>
                        </th>
                      </tr>
                      <tr>
                        <th>Kabupaten / Kota</th>
                        <th style="width:10%;" class="text-center"> : </th>
                        <th>
                          <?= $ortu[0]->kab ?>
                        </th>
                      </tr>
                      <tr>
                        <th>Telp</th>
                        <th style="width:10%;" class="text-center"> : </th>
                        <th>
                          <?= $ortu[0]->telp ?>
                        </th>
                      </tr>
                      <tr>
                        <th>Provinsi</th>
                        <th style="width:10%;" class="text-center"> : </th>
                        <th>
                          <?= $ortu[0]->prov ?>
                        </th>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <table class="table table-hover table-md" border="1px">
                <tr style="background-color: #c2c2c2;">
                  <th data-width="40">No.</th>
                  <th>Nama Lengkap</th>
                  <th class="text-center">Status Hubungan Dalam Keluarga</th>
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Tempat Lahir</th>
                  <th class="text-center">Tanggal Lahir</th>
                  <th class="text-center">Jenis Pekerjaan</th>
                </tr>
                <?php $i = 1;
                foreach ($ortu as $val): ?>
                  <tr>
                    <td class="text-center">
                      <?= $i . "." ?>
                    </td>
                    <td>
                      <?= $val->name ?>
                    </td>
                    <td class="text-center">
                      <?php if ($val->sex == "male"):
                        echo "Kepala Keluarga";
                      else:
                        if (count($ortu) > 1):
                          echo "Istri";
                        else:
                          echo "Istri/Kepala Keluarga";
                        endif;
                      endif; ?>
                    </td>
                    <td class="text-center">
                      <?php if ($val->sex == "male"):
                        echo "Laki-laki";
                      else:
                        echo "Perempuan";
                      endif; ?>
                    </td>
                    <td class="text-center">
                      <?= $val->tempat_lahir ?>
                    </td>
                    <td class="text-center">
                      <?= date('d-m-Y', strtotime($val->birth_date)) ?>
                    </td>
                    <td class="text-center">
                      <?php if ($val->pekerjaan == ""):
                        echo "-";
                      else:
                        echo $val->pekerjaan;
                      endif; ?>
                    </td>
                  </tr>
                  <?php $i++;
                endforeach;
                if ($anak): foreach ($anak as $bar): ?>
                    <tr>
                      <td class="text-center">
                        <?= $i . "." ?>
                      </td>
                      <td>
                        <?= $bar->name ?>
                      </td>
                      <td class="text-center">
                        <?= "Anak"; ?>
                      </td>
                      <td class="text-center">
                        <?php if ($val->sex == "male"):
                          echo "Laki-laki";
                        else:
                          echo "Perempuan";
                        endif; ?>
                      </td>
                      <td class="text-center">
                        <?= $val->tempat_lahir ?>
                      </td>
                      <td class="text-center">
                        <?= date('d-m-Y', strtotime($val->birth_date)) ?>
                      </td>
                      <td class="text-center">
                        <?php if ($val->pekerjaan == ""):
                          echo "-";
                        else:
                          echo $val->pekerjaan;
                        endif; ?>
                      </td>
                    </tr>
                    <?php $i++;
                  endforeach;
                endif; ?>
              </table>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<script>
  //Create PDf from HTML...
  function CreatePDFfromHTML(name) {
    html2canvas($(".print-area")[0], {
      useCORS: true,
      allowTaint: true,
      scrollY: -window.scrollY,
    }).then(canvas => {
      const image = canvas.toDataURL('image/jpeg', 1.0);
      const doc = new jsPDF('l', 'px', 'a4');
      const pageWidth = doc.internal.pageSize.getWidth();
      const pageHeight = doc.internal.pageSize.getHeight();

      const widthRatio = pageWidth / canvas.width;
      const heightRatio = pageHeight / canvas.height;
      const ratio = widthRatio > heightRatio ? heightRatio : widthRatio;

      const canvasWidth = canvas.width * ratio;
      const canvasHeight = canvas.height * ratio;

      const marginX = (pageWidth - canvasWidth) / 2;
      const marginY = (pageHeight - canvasHeight) / 2;

      doc.addImage(image, 'JPEG', marginX, 0, canvasWidth, canvasHeight);
      doc.save(name + '.pdf');
      doc.output('dataurlnewwindow');
    });
  }
</script>