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
<?php if ($this->session->flashdata('warning')):
    ?>
    <script>
        iziToast.error({
            title: 'error!',
            message: '<?= $this->session->flashdata('warning') ?>',
            position: 'topCenter'
        });
    </script>
    <?php
endif; ?>

<?php if ($this->session->flashdata('error')):
    ?>
    <script>swal('Error', "<?= $this->session->flashdata('error') ?>", 'error');</script>
    <?php
endif; ?>