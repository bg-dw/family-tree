<div class="row">
    <?php
    foreach ($posts as $post): ?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
                <div class="article-header">
                    <?php if ($post->gambar_acara): ?>
                        <img src="<?= base_url() ?>assets/img/acara/<?= $post->gambar_acara ?>" class="article-image" alt="">
                    <?php else: ?>
                        <img src="<?= base_url() ?>assets/img/none.jpg" class="article-image" alt="">
                    <?php endif; ?>
                    <div class="article-title">
                        <h2>
                            <a href="#">
                                <?= $post->nama_acara ?>
                            </a>
                        </h2>
                    </div>
                </div>
                <div class="article-details">
                    <p>
                        <?= substr($post->isi_acara, 0, 50) . " . . . . . "; ?>
                    </p>
                    <div class="article-cta">
                        <a href="#" class="btn btn-primary">Detail Acara</a>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>