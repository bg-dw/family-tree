<section class="section">
  <div class="row ">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon l-bg-purple">
          <i class="fas fa-cart-plus"></i>
        </div>
        <div class="card-wrap">
          <div class="padding-20">
            <div class="text-right">
              <h3 class="font-light mb-0">
                <i class="ti-arrow-up text-success"></i> 524
              </h3>
              <span class="text-muted">Order Received</span>
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
            <div style="width:100%; height:700px;" id="tree" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>

  $(document).ready(function () {

    // ${FamilyTree.gradientCircleForDefs('male_circle', '#039BE5', 60, 5)}
    $.ajax({
      url: "<?= base_url('master/dashboard/get_fam/') ?>",
      method: "POST",
      dataType: 'json',
      success: function (data) {
        console.log(data);
        function pdf(nodeId) {
          family.exportPDF({
            format: "A4",
            header: 'POHON KELUARGA',
            footer: 'Pohon Keluarga. Page {current-page} of {total-pages}'
          });
        }
        // FamilyTree.templates.john.defs = 'svg.tommy .node.female>circle {fill: #FFFFFF;}';
        FamilyTree.templates.tommy_male.plus =
          '<circle cx="0" cy="0" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>'
          + '<line x1="-11" y1="0" x2="11" y2="0" stroke-width="1" stroke="#aeaeae"></line>'
          + '<line x1="0" y1="-11" x2="0" y2="11" stroke-width="1" stroke="#aeaeae"></line>';
        FamilyTree.templates.tommy_male.minus =
          '<circle cx="0" cy="0" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>'
          + '<line x1="-11" y1="0" x2="11" y2="0" stroke-width="1" stroke="#aeaeae"></line>';
        FamilyTree.templates.tommy_female.plus =
          '<circle cx="0" cy="0" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>'
          + '<line x1="-11" y1="0" x2="11" y2="0" stroke-width="1" stroke="#aeaeae"></line>'
          + '<line x1="0" y1="-11" x2="0" y2="11" stroke-width="1" stroke="#aeaeae"></line>';
        FamilyTree.templates.tommy_female.minus =
          '<circle cx="0" cy="0" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>'
          + '<line x1="-11" y1="0" x2="11" y2="0" stroke-width="1" stroke="#aeaeae"></line>';

        FamilyTree.templates.tommy_female.defs = '<g transform="matrix(0.05,0,0,0.05,-12,-9)" id="heart"><path fill="#F57C00" d="M438.482,58.61c-24.7-26.549-59.311-41.655-95.573-41.711c-36.291,0.042-70.938,15.14-95.676,41.694l-8.431,8.909  l-8.431-8.909C181.284,5.762,98.663,2.728,45.832,51.815c-2.341,2.176-4.602,4.436-6.778,6.778 c-52.072,56.166-52.072,142.968,0,199.134l187.358,197.581c6.482,6.843,17.284,7.136,24.127,0.654 c0.224-0.212,0.442-0.43,0.654-0.654l187.29-197.581C490.551,201.567,490.551,114.77,438.482,58.61z"/><g>';
        FamilyTree.templates.tommy_male.defs = '<g transform="matrix(0.05,0,0,0.05,-12,-9)" id="heart"><path fill="#F57C00" d="M438.482,58.61c-24.7-26.549-59.311-41.655-95.573-41.711c-36.291,0.042-70.938,15.14-95.676,41.694l-8.431,8.909  l-8.431-8.909C181.284,5.762,98.663,2.728,45.832,51.815c-2.341,2.176-4.602,4.436-6.778,6.778 c-52.072,56.166-52.072,142.968,0,199.134l187.358,197.581c6.482,6.843,17.284,7.136,24.127,0.654 c0.224-0.212,0.442-0.43,0.654-0.654l187.29-197.581C490.551,201.567,490.551,114.77,438.482,58.61z"/><g>';

        var family = new FamilyTree(document.getElementById("tree"), {
          // template: 'hugo',
          template: 'john',
          editForm: { readOnly: true },
          scaleInitial: FamilyTree.match.width,
          menu: {
            export_pdf: {
              text: "Export PDF",
              icon: FamilyTree.icon.pdf(24, 24, "#7A7A7A"),
              onClick: pdf
            },
            png: { text: "Export PNG" },
            svg: { text: "Export SVG" },
            csv: { text: "Export CSV" },
            json: { text: "Export JSON" }
          },
          nodeBinding: {
            field_0: "name",
            img_0: "img",
          },
          nodes: data
        });
        family.on('expcollclick', function (sender, isCollapsing, nodeId) {
          var node = family.getNode(nodeId);
          if (isCollapsing) {
            family.expandCollapse(nodeId, [], node.ftChildrenIds)
          }
          else {
            family.expandCollapse(nodeId, node.ftChildrenIds, [])
          }
          return false;
        });

        family.on('render-link', function (sender, args) {
          if (args.cnode.ppid != undefined)
            args.html += '<use data-ctrl-ec-id="' + args.node.id + '" xlink:href="#heart" x="' + (args.p.xb) + '" y="' + (args.p.ya) + '"/>';
          if (args.cnode.isPartner && args.node.partnerSeparation == 30)
            args.html += '<use data-ctrl-ec-id="' + args.node.id + '" xlink:href="#heart" x="' + (args.p.xb) + '" y="' + (args.p.yb) + '"/>';

        });
      },
      error: function (data) {
        alert(data.responseText)
      }
    })
  });
</script>