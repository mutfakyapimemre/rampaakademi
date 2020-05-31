<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="breadcrumb__title"><?=$get_service -> service_title; ?></h2>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="<?=base_url()?>">Anasayfa</a></li>
                        <li><?=$get_service -> service_title; ?></li>
                    </ul>
                    <div class="text-outline"><?=$get_service -> service_title; ?></div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!--======================================
        START BLOG AREA
======================================-->
<section class="blog-area4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="blog-content-wrap">
                    <div class="blog-item">
                        <div class="blog-content">
                            <h3 class="blog__title"><?=$get_service -> service_title; ?></h3>
                            <p class="blog__desc">
                                <?=$get_service -> service_text; ?>
                            </p>
                        </div><!-- end blog-content -->
                    </div><!-- end blog-post-item -->
                </div><!-- end blog-post-wrapper -->
            </div><!-- end col-lg-12-->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!--======================================
        END BLOG AREA
======================================-->