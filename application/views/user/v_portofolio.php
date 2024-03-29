<div class="section-body" style="margin-top: -40px;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="text-center mt-1">
                    <h4>Portofolio
                        <?= "[ " . $total_post . " ]" ?>
                    </h4>
                </div>
            </div>
            <div class="col-md-12" id="post-data">
                <?php
                $this->load->view('user/data_porto', $posts);
                ?>
            </div>
            <div class="alert alert-light ajax-load text-center" style="display:none">
            </div>
        </div>
    </div>
</div>
<script>
    function detail(num) {
        if ($('.cont-' + num).css('display') == 'none') {
            $('.all-cont').hide();
            $('.all-dum').slideDown('slow');
            $('.dum-' + num).hide();
            $('.cont-' + num).slideDown('slow');
        } else {
            $('.cont-' + num).hide();
            $('.dum-' + num).slideDown('slow');
        }
    }
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
                url: '<?= base_url("portofolio-us") ?>',
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
    }
</script>