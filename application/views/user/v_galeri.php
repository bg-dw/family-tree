<div class="section-body" style="margin-top: -40px;">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-8" id="post-data" style="margin-left: 4%;">
                    <?php
                    $this->load->view('user/data_galeri', $posts);
                    ?>
                </div>
                <script async src="//www.instagram.com/embed.js"></script>
                <div class="col-md-3" style="position: fixed; right:50px;" id="panel">
                    <div class="card">tejhka</div>
                </div>
            </div>
            <div class="alert alert-light ajax-load text-center" style="display:none">
            </div>
        </div>
    </div>
</div>
<script>
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
                console.log(detectMob());
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }
</script>