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
                <div class="article-details table-responsive">
                    <span class="badge badge-light mb-3">Tanggal :
                        <?= date('d M Y', strtotime($post->waktu_acara)) . " | " . date('H:i', strtotime($post->waktu_acara)) . " WIB" ?>
                    </span>
                    <p class="dum-<?= $post->id_acara ?> all-dum"> . . . . . . . . . . . . .</p>
                    <div class="cont-<?= $post->id_acara ?> all-cont" style="display: none;">
                        <p>
                            <?= $post->isi_acara; ?>
                        </p>
                    </div>
                    <div class="article-cta mt-3">
                        <button class="btn btn-primary" onclick="detail('<?= $post->id_acara ?>')">Detail Acara</button>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>