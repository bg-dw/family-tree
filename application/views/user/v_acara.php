<div class="section-body" style="margin-top: -40px;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="text-center mt-1">
                    <h4>Acara
                        <?= "[ " . $total_post . " ]" ?>
                    </h4>
                </div>
            </div>
            <div class="col-md-12" id="post-data">
                <?php
                $this->load->view('user/data_acara', $posts);
                ?>
            </div>
            <div class="alert alert-light ajax-load text-center" style="display:none">
            </div>
        </div>
    </div>
</div>
<script>
    var page = 0;
    $(window).scroll(function () {
        if (($(window).scrollTop() + $(window).height() + 1) >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });


    function loadMoreData(hal) {
        $.ajax(
            {
                url: '<?= base_url("acara-us") ?>',
                method: "GET",
                data: {
                    page: hal
                },
                beforeSend: function () {
                    $('.loader').show();
                    $('.ajax-load').show();
                }
            })
            .done(function (data) {
                if (data.length < 50) {//panjang data yang dikirim jika kosng 31 char(sebagai tag html)
                    $('.ajax-load').html("No more records found");
                    $('.loader').fadeOut("slow");
                    return;
                }
                $('.loader').fadeOut("slow");
                $('.ajax-load').fadeOut("slow");
                $("#post-data").append(data);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }</script>