<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area breadcrumb-area2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="breadcrumb__title"><?=$get_product->product_name?></h2>
                    <ul class="breadcrumb__list">
                        <li><a href="<?=base_url()?>">Rampa Akademi</a> Tarafından Hazırlandı.</li>
                    </ul>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!--======================================
        START COURSE DETAIL
======================================-->
<section class="course-detail">
    <div class="container">
        <div class="row course-item-wrap">
            <div class="col-lg-8">
                <div class="course-item-content">
                    <div class="description-wrap p-3">
                        <h3 class="description__title course-detail__title"><?=$get_product->product_name?></h3>
                        <p class="description__text">
                            <?=$get_product -> product_text; ?>
                        </p>
                    </div><!-- end description-wrap -->
                </div><!-- end course-item-content -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar-component">
                    <div class="sidebar">
                        <div class="sidebar-widget sidebar-preview">
                           <div class="sidebar-preview-titles">
                               <h3 class="widget__title">Eğitim Görseli</h3>
                               <span class="section__divider"></span>
                           </div>
                            <div class="preview-video-and-details">
                                <div class="preview-course-video">
                                    <img src="<?=$get_product -> product_photo; ?>" alt="" width="100%" height="315">
                                </div>
                                <div class="preview-course-content">
                                    <?php if(!empty($get_product -> product_price) && $get_product -> product_price >0):?>
                                    <p class="preview-course__price d-flex align-items-center">
                                        <span class="price-current"><?php
                                        if ($get_product -> product_discount_price):
                                            echo $get_product -> product_discount_price;
                                        endif;
                                        ?></span>
                                        <span class="price-before"><?=$get_product -> product_price;?></span>
                                        Eğitim Ücreti
                                    </p>
                                    <?php endif;?>
                                    <div class="buy-course-btn">
                                        <a href="<?=base_url("egitim-kayit")?>" class="theme-btn" type="button">Bu Eğitime Kayıt Olun</a>
                                    </div>
                                    <p class="preview-course__price d-flex align-items-center">
                                        <span class="price-current"><?=$get_product -> reservation_count;?></span>
                                        Toplam Katılımcı
                                        <span class="ml-2 price-current"><?=$get_product -> product_quota;?></span>
                                        Kontenjan
                                    </p>
                                    <div class="preview-course-incentives">
                                        <p class="preview-course-incentives__title">Eğitim Şunları İçeriyor:</p>
                                        <ul class="preview-course-incentives__list">
                                            <li><span class="la la-certificate"></span>Bitirme Sertifikası</li>
                                        </ul>
                                    </div><!-- end preview-course-incentives -->
                                </div><!-- end preview-course-content -->
                            </div><!-- end preview-video-and-details -->
                        </div><!-- end sidebar-widget -->
                        <div class="sidebar-widget sidebar-feature">
                            <h3 class="widget__title">Eğitim Özellikleri</h3>
                            <span class="section__divider"></span>
                            <ul class="widget__list">
                                <li>
                                    <span class="la la-language course-feature__icon"></span>Dil
                                    <span class="course-feature__meta">Türkçe</span>
                                </li>
                                <li>
                                    <span class="la la-certificate course-feature__icon"></span>Sertifika
                                    <span class="course-feature__meta">Var</span>
                                </li>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <?php if(!empty($site_categories)):?>
                        <div class="sidebar-widget category-widget">
                            <h3 class="widget__title">Kategoriler</h3>
                            <span class="section__divider"></span>
                            <ul class="widget__list">
                                <?php foreach($site_categories as $site_category):?>
                                <li><a href="<?=base_url("k/{$site_category->category_url}")?>"><?=$site_category->category_name?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <?php endif;?>
                        <?php if(!empty($get_product->product_meta_keywords)):?>
                        <div class="sidebar-widget tag-widget">
                            <h3 class="widget__title">Eğitim Etiketleri</h3>
                            <span class="section__divider"></span>
                            <ul class="widget__list">
                                <?php foreach($get_product->product_meta_keywords as $meta_keyword):?>
                                <li><a href="javascript:void(0)"><?=$meta_keyword?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        <?php endif;?>
                    </div><!-- end sidebar -->
                </div><!-- end sidebar-component -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end course-detail -->
<!--======================================
        END COURSE DETAIL
======================================-->
