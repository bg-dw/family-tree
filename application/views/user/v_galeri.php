<div class="section-body" style="margin-top: -40px;">
    <div class="row">
        <div class="mx-auto" style="width: auto; min-width:500px;">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                            <a class="btn btn-outline-primary btn-icon rounded-circle" style="vertical-align: middle"
                                id="prev"><i class="fas fa-angle-left"></i></a>
                        </div>
                        <div class="col-md-10">
                            <div class="owl-carousel owl-theme slider" style="margin-bottom: -30px;margin-top: -20px;">
                                <?php foreach ($uploader as $by): ?>
                                    <div class="user-item" style="max-width: 90px;">
                                        <?php if ($by->u_pic): ?><img alt="image"
                                                src="<?= base_url() ?>assets/img/users/profile/<?= $by->u_pic ?>"
                                                style="max-width: 90px;" class="img-fluid">
                                        <?php else: ?>
                                            <img alt="image" src="<?= base_url() ?>assets/img/users/none.png"
                                                style="max-width: 90px;" class="img-fluid">
                                        <?php endif; ?>
                                        <div class="user-details" style="max-width: 90px;">
                                            <span>
                                                <?= $by->u_user ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <a class="btn btn-outline-primary rounded-circle" style="vertical-align: middle"
                                id="next"><i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-8" id="post-data" style="margin-left: 2%;">
                    <?php
                    $this->load->view('user/data_galeri', $posts);
                    ?>
                </div>
                <script async src="//www.instagram.com/embed.js"></script>
                <div class="col-md-4" id="panel" style="margin-right: -50%;">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Uploader</h4>
                        </div>
                        <div class="card-body" style="overflow-y: scroll;height: 400px;">
                            <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                <?php foreach ($uploader as $by): ?>
                                    <li class="media">
                                        <?php if ($by->u_pic): ?>
                                            <img alt="image" src="<?= base_url() ?>assets/img/users/profile/<?= $by->u_pic ?>"
                                                class="mr-3 rounded-circle" width="50">
                                        <?php else: ?>
                                            <img alt="image" src="<?= base_url() ?>assets/img/users/none.png"
                                                class="mr-3 rounded-circle" width="50">
                                        <?php endif; ?>
                                        <div class="media-body">
                                            <div class="media-title">
                                                <?= $by->u_user ?>
                                            </div>
                                            <div class="text-job text-muted">
                                                <?= $by->name ?>
                                            </div>
                                        </div>
                                        <div class="media-progressbar">
                                            <div class="progress-text">
                                                <?= $by->total . " Post" ?>
                                            </div>
                                            <div class="progress" data-height="6">
                                                <div class="progress-bar bg-primary" data-width="<?php if ($total == "" || $by->total == "") {
                                                    echo "0";
                                                } else {
                                                    echo ($by->total / $total) * 100;
                                                } ?>%">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </center>
            <div class="alert alert-light ajax-load text-center" style="display:none">
            </div>
        </div>
    </div>
</div>
<script>
    $(".owl-carousel").owlCarousel({
        items: 1,
        margin: 5,
        nav: false,
        // navText: ['<a href="#" class="btn btn-outline-primary rounded-circle"><</a>', '<a href="#" class="btn btn-outline-primary rounded-circle">></a>'],
        // autoplay: true,
        // autoplayTimeout: 2000,
        loop: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            578: {
                items: 4
            },
            768: {
                items: 4
            }
        }
    });
    var selector = $('.owl-carousel');

    $('#prev').click(function () {
        selector.trigger('prev.owl.carousel');
    });

    $('#next').click(function () {
        selector.trigger('next.owl.carousel');
    });
    $(document).ready(function () {
        panel();
    });

    function panel() {
        var x = detectMob();
        if (x == true) {
            $('#panel').hide();
        } else {
            $('#panel').show();
        }
    }

    function detectMob() {
        const toMatch = [
            /Android/i,
            /webOS/i,
            /iPhone/i,
            /iPad/i,
            /iPod/i,
            /BlackBerry/i,
            /Windows Phone/i
        ];

        return toMatch.some((toMatchItem) => {
            return navigator.userAgent.match(toMatchItem);
        });
    }
    var page = 0;
    $(window).scroll(function () {
        if (($(window).scrollTop() + $(window).height() + 1) >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });


    function loadMoreData(hal) {
        panel();
        $.ajax(
            {
                url: '<?= base_url("galeri-us") ?>',
                method: "GET",
                data: {
                    page: hal
                },
                beforeSend: function () {
                    $('.ajax-load').hide();
                    $('.lds-spinner').show();
                }
            })
            .done(function (data) {
                $('.lds-spinner').hide();
                if (data.length < 50) {//panjang data yang dikirim jika kosng 31 char(sebagai tag html)
                    $('.ajax-load').html("No more records found");
                    $('.ajax-load').fadeIn('slow');
                    return;
                }
                $(".el-load").ready(function () {
                    $(".el-load").fadeIn('slow');
                    $("#post-data").append(data);
                });
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }
</script>