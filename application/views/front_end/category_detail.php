<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="breadcrumb__title"><?=$category['detail'] -> category_name; ?></h2>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="<?=base_url()?>">Anasayfa</a></li>
                        <li><?=$category['detail'] -> category_name; ?></li>
                    </ul>
                    <div class="text-outline"><?=$category['detail'] -> category_name; ?></div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->


<!-- ================================
       START CLIENTLOGO AREA
================================= -->
<?php if(!empty($category['sub_categories'])):?>
    <section class="clientlogo-area pt-5">
        <div class="stroke-line">
            <span class="stroke__line"></span>
            <span class="stroke__line"></span>
            <span class="stroke__line"></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h5 class="section__meta"><?=strto("lower|upper",$category['detail'] -> category_name); ?></h5>
                        <h2 class="section__title"><?=$category['detail'] -> category_name; ?></h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-md-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="client-logo">
                        <?php foreach($category['sub_categories'] AS $sub_category): ?>
                            <div class="client-logo-item">
                                <a href="<?=$sub_category -> _url ?>"><img class="p-3" src="<?=$sub_category -> _photo ?>" alt="<?=$sub_category -> category_name; ?>"></a>
                                <h6><?=$sub_category -> category_name; ?></h6>
                            </div><!-- end client-logo-item -->
                        <?php endforeach;?>
                    </div><!-- end client-logo -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
        <div class="stroke-line2">
            <span class="stroke__line"></span>
            <span class="stroke__line"></span>
            <span class="stroke__line"></span>
        </div>
    </section><!-- end clientlogo-area -->
<?php endif;?>
<!-- ================================
       START CLIENTLOGO AREA
================================= -->

<!--======================================
        START GET BEST SELLING COURSE AREA
======================================-->
<section class="course-area pt-5">
    <div class="course-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h5 class="section__meta">İLGİLENDİĞİNİZ ALANDAKİ EĞİTİMLERİMİZİ KEŞFEDİN</h5>
                        <h2 class="section__title"><?=$category['detail'] -> category_name; ?></h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-wrapper -->
    <div class="course-content-wrapper">
        <div class="container">
            <div class="row course-item-wrap">
                <div class="col-lg-12">
                    <?php if (!empty($category['products'])): ?>
                        <div class="row course-block">
                            <?php foreach ($category['products'] as $product): ?>
                                <div class="col-lg-4">
                                    <div class="course-item">
                                        <div class="course-img">
                                            <a href="<?=$product -> product_link; ?>" class="course__img"><img src="<?=$product -> product_photo; ?>" alt=""></a>
                                            <div class="course-tooltip">
                                                <span class="tooltip-label">En Popüler</span>
                                            </div>
                                        </div><!-- end course-img -->
                                        <div class="course-content">
                                            <h3 class="course__title">
                                                <a href="<?=$product -> product_link; ?>"><?=$product -> product_name; ?></a>
                                            </h3>
                                            <div class="course-price-wrap">
                                                <span class="course__price">
                                                <?php
                                                    if (!empty($product -> product_price)):

                                                        if ($product -> product_discount_price):
                                                            echo '<del class="mr-2 text-secondary">'.$product -> product_price.'</del>';
                                                            echo '<b>'.$product -> product_discount_price.'</b>';
                                                        else:
                                                            echo '<b>'.$product -> product_price.'</b>';
                                                        endif;
                                                    endif;
                                                ?>
                                                </span>
                                                <a href="javascript:void(0)" class="course__btn">Kayıt Ol</a>
                                            </div><!-- end course-price-wrap -->
                                        </div><!-- end course-content -->
                                    </div><!-- end course-item -->
                                </div><!-- end col-lg-4 -->
                            <?php endforeach; ?>
                        </div><!-- end course-block -->
                    <?php else: echo '<b class="h3 text-danger d-block text-center">Hiç eğitim bulunamadı!</b>'; endif; ?>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-content-wrapper -->
</section><!-- end courses-area -->
<!--======================================
        END GET BEST SELLING COURSE AREA
======================================-->