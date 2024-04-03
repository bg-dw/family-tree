<section class="section" style="margin-top: -40px;">
  <div class="row ">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon card-icon l-bg-purple">
          <i class="fas fa-user-check"></i>
        </div>
        <div class="card-wrap">
          <div class="padding-20">
            <div class="text-right">
              <h3 class="font-light mb-0">
                <i class="ti-arrow-up text-success"></i>
                <?= $all->tot ?>
              </h3>
              <span class="text-muted">Pengguna Terdaftar</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon card-icon l-bg-cyan">
          <i class="fas fa-male"></i>
        </div>
        <div class="card-wrap">
          <div class="padding-20">
            <div class="text-right">
              <h3 class="font-light mb-0">
                <i class="ti-arrow-up text-success"></i>
                <?= $male->M ?>
              </h3>
              <span class="text-muted">Orang Laki-laki</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon card-icon l-bg-orange">
          <i class="fas fa-female"></i>
        </div>
        <div class="card-wrap">
          <div class="padding-20">
            <div class="text-right">
              <h3 class="font-light mb-0">
                <i class="ti-arrow-up text-success"></i>
                <?= $female->F ?>
              </h3>
              <span class="text-muted">Orang Perempuan</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon card-icon l-bg-green">
          <i class="fas fa-sitemap"></i>
        </div>
        <div class="card-wrap">
          <div class="padding-20">
            <div class="text-right">
              <h3 class="font-light mb-0">
                <i class="ti-arrow-up text-success"></i>
                <?= $gen->tot ?>
              </h3>
              <span class="text-muted">Generasi</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
      <div class="card ">
        <div class="card-body">
          <div class="row">
            <div style="width:100%; height:700px;" id="tree-fam">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="<?= base_url() ?>assets/bundles/ftree/d3.v7.min.js"></script>
<!-- <script src="<?= base_url() ?>assets/bundles/ftree/d3-dag.js.js"></script> -->
<script src="https://cdn.jsdelivr.net/gh/BenPortner/js_family_tree/js/d3-dag.js"></script>
<script src="<?= base_url() ?>assets/bundles/ftree/data2.js"></script>
<script src="<?= base_url() ?>assets/bundles/ftree/familytree.js"></script>
<script>

  const svg = d3.select("#tree-fam").append("svg")
    .attr("width", document.body.offsetWidth)
    .attr("height", document.documentElement.clientHeight);

  // make family tree object
  let FT = new FamilyTree(data, svg)
    .orientation("vertical");

  // draw family tree
  FT.draw();
  $(document).ready(function () {
    $.ajax({
      url: "<?= base_url('master-get-fam') ?>",
      method: "POST",
      dataType: 'json',
      success: function (data) {
        console.log("Pohon keluarga berhasil dibuat");
      },
      error: function (data) {
        alert(data.responseText)
      }
    })
  });
</script>
<script>
</script>