<div class="row">
    <?php
    foreach ($posts as $post): ?>
        <div class="col-12 col-md-4 col-lg-4">
            <article class="article article-style-c">
                <div class="article-header">
                    <?php if ($post->gambar_porto): ?>
                        <img src="<?= base_url() ?>assets/img/porto/<?= $post->gambar_porto ?>" class="article-image" alt="">
                    <?php else: ?>
                        <img src="<?= base_url() ?>assets/img/none.jpg" class="article-image" alt="">
                    <?php endif; ?>
                </div>
                <div class="article-details">
                    <?php
                    $tgl1 = new DateTime($post->create_at);
                    $tgl2 = new DateTime(date('Y-m-d H:i:s'));
                    $jarak = $tgl2->diff($tgl1);
                    ?>
                    <div class="article-category"><a href="#">Dibuat </a>
                        <div class="bullet"></div>
                        <a href="#">
                            <?php if ($jarak->d > 0 && $jarak->d <= 7):
                                echo $jarak->d . " yang lalu.";
                            elseif ($jarak->d < 1):
                                echo "Hari ini.";
                            else:
                                echo date('d M Y', strtotime($post->create_at));
                            endif; ?>
                        </a>
                    </div>
                    <div class="article-title">
                        <h2><a href="#">
                                <?= $post->judul_porto ?>
                            </a></h2>
                    </div>
                    <p>
                        <?= substr($post->isi_porto, 0, 50) . " . . . . . "; ?>
                    </p>
                    <div class="article-user">
                        <?php if ($post->u_pic): ?>
                            <img alt="image" src="<?= base_url() ?>assets/img/users/profile/<?= $post->u_pic ?>">
                        <?php else: ?>
                            <img alt="image" src="<?= base_url() ?>assets/img/users/none.png">
                        <?php endif; ?>
                        <div class="article-user-details">
                            <div class="user-detail-name">
                                <a href="#"></a>
                                <?= $post->name ?></a>
                            </div>
                            <div class="text-job">
                                <?= $post->pekerjaan ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>