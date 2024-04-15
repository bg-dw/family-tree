<!-- General CSS Files -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/app.min.css">
<!-- Template CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
<!-- Custom style CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
<link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>assets/img/favicon.ico' />
<link rel="stylesheet" href="<?= base_url() ?>assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet"
  href="<?= base_url() ?>assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/bundles/lightgallery/dist/css/lightgallery.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/bundles/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/bundles/ftree/main.css">

<!-- script -->
<script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<!-- <script src="<?= base_url() ?>assets/js/familytree.js"></script> -->
<script src="https://cdn.jsdelivr.net/gh/BenPortner/js_family_tree/js/d3-dag.js"></script>
<script src="<?= base_url() ?>assets/bundles/ftree/d3.v7.min.js"></script>
<script src="<?= base_url() ?>assets/bundles/ftree/data.js"></script>
<script src="<?= base_url() ?>assets/bundles/ftree/familytree.js"></script>
<script src="<?= base_url() ?>assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?= base_url() ?>assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="<?= base_url() ?>assets/bundles/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
<script src="<?= base_url() ?>assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
<style>
  .lds-spinner {
    color: official;
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
  }

  .lds-spinner div {
    transform-origin: 40px 40px;
    animation: lds-spinner 1.2s linear infinite;
  }

  .lds-spinner div:after {
    content: " ";
    display: block;
    position: absolute;
    top: 3px;
    left: 37px;
    width: 6px;
    height: 18px;
    border-radius: 20%;
    background: grey;
  }

  .lds-spinner div:nth-child(1) {
    transform: rotate(0deg);
    animation-delay: -1.1s;
  }

  .lds-spinner div:nth-child(2) {
    transform: rotate(30deg);
    animation-delay: -1s;
  }

  .lds-spinner div:nth-child(3) {
    transform: rotate(60deg);
    animation-delay: -0.9s;
  }

  .lds-spinner div:nth-child(4) {
    transform: rotate(90deg);
    animation-delay: -0.8s;
  }

  .lds-spinner div:nth-child(5) {
    transform: rotate(120deg);
    animation-delay: -0.7s;
  }

  .lds-spinner div:nth-child(6) {
    transform: rotate(150deg);
    animation-delay: -0.6s;
  }

  .lds-spinner div:nth-child(7) {
    transform: rotate(180deg);
    animation-delay: -0.5s;
  }

  .lds-spinner div:nth-child(8) {
    transform: rotate(210deg);
    animation-delay: -0.4s;
  }

  .lds-spinner div:nth-child(9) {
    transform: rotate(240deg);
    animation-delay: -0.3s;
  }

  .lds-spinner div:nth-child(10) {
    transform: rotate(270deg);
    animation-delay: -0.2s;
  }

  .lds-spinner div:nth-child(11) {
    transform: rotate(300deg);
    animation-delay: -0.1s;
  }

  .lds-spinner div:nth-child(12) {
    transform: rotate(330deg);
    animation-delay: 0s;
  }

  @keyframes lds-spinner {
    0% {
      opacity: 1;
    }

    100% {
      opacity: 0;
    }
  }
</style>