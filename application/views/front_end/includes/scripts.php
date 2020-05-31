    <!-- theme js files -->
    <script src="<?=base_url("public/front_end/js/jquery.min.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/bootstrap.bundle.min.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/owl.carousel.min.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/magnific-popup.min.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/isotope.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/waypoints.min.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/jquery.counterup.min.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/particles.min.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/particlesRun.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/fancybox.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/wow.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/smooth-scrolling.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/iziToast.min.js")?>"></script>
    <script src="<?=base_url("public/front_end/js/main.js")?>"></script>
    <?php
    // TOAST MESSAGE
        $alert = $this->session->userdata("alert");
        if($alert){
            if($alert["success"]){ ?>
                <script>
                    iziToast.success({
                        title: '<?=$alert["title"]; ?>',
                        message: '<?=$alert["msg"]; ?>',
                    });
                </script>
            <?php } else { ?>
                <script>
                    iziToast.error({
                        title: '<?=$alert["title"]; ?>',
                        message: '<?=$alert["msg"]; ?>',
                    });
                </script>
            <?php } ?>
    <?php } ?>
</body>

</html>