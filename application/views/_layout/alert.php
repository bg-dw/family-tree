<?php if ($this->session->flashdata('success')):
    ?>
    <script>
        iziToast.success({
            title: 'Success!',
            message: '<?= $this->session->flashdata('success') ?>',
            position: 'topCenter'
        });
    </script>
    <?php
endif; ?>
<?php if ($this->session->flashdata('error')):
    ?>
    <script>
        iziToast.error({
            title: 'error!',
            message: '<?= $this->session->flashdata('error') ?>',
            position: 'topCenter'
        });
    </script>
    <?php
endif; ?>