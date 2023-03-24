<?php
foreach ($posts as $post): ?>
    <div class="col-lg-11 el-load">
        <article class="article article-style-c">
            <div class="col-12 col-lg-12 col-lg-6 col-lg-6">
                <iframe src="https://www.instagram.com/<?= $post->media_galeri ?>embed/" title="description" scrolling="no"
                    frameBorder="0" height=" 100%" width="100%"></iframe>
            </div>
            <div class="article-details">
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