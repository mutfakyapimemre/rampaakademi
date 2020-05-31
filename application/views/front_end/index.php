<!--================================
         START SLIDER AREA
=================================-->



    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
                $i = 1;
                foreach ($get_slider as $key => $value):
                    if ($i == 1)
                        echo '<li data-target="#carouselExampDeIndicators" data-slide-to="'.$key.'" class="active"></li>';
                    else
                        echo '<li data-target="#carouselExampDeIndicators" data-slide-to="'.$key.'"></li>';

                    $i++;
                endforeach;
            ?>
        </ol>
        <div class="carousel-inner">          
            <?php
                $i = 1;
                foreach ($get_slider as $key => $slider):
                    if ($i == 1):
                        echo '<div class="carousel-item active">';
                            echo '<img class="d-block w-100" src="'.base_url("public/uploads/slider/web/".$slider->slider_photo_name).'">';
                            echo '<div class="carousel-caption d-none d-md-block">';
                                echo '<h3 class="text-white">'.$slider -> slider_title.'</h5>';
                                echo '<a href="'.$slider -> slider_photo_link.'" class="btn btn-danger text-white">İncele</a>';
                            echo '</div>';
                        echo '</div>';
                    else:
                        echo '<div class="carousel-item">';
                            echo '<img class="d-block w-100" src="'.base_url("public/uploads/slider/web/".$slider->slider_photo_name).'">';
                        echo '</div>';
                    endif;

                    $i++;
                endforeach;
            ?>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Önceki</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sonraki</span>
        </a>
    </div>

<!--================================
        END SLIDER AREA
=================================-->

<!--======================================
        START FEATURE AREA
 ======================================-->
<section class="feature-area text-center" style="margin-top: 100px;">
    <div class="container">
        <div class="row feature-content-wrap">
            <div class="col-lg-4 col-sm-6">
                <div class="feature-item feature-item1">
                    <div class="hover-overlay"></div>
                    <i class="la la-user feature__icon"></i>
                    <h3 class="feature__title">Deneyimli Eğitmenlerimiz</h3>
                    <p class="feature__text">Tecrübelerine güvendiğimiz eğitmenlerimizden eğitim alma fırsatı</p>
                </div><!-- end feature-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4 col-sm-6">
                <div class="feature-item feature-item2">
                    <div class="hover-overlay"></div>
                    <i class="la la-paper-plane-o feature__icon"></i>
                    <h3 class="feature__title">Sertifika Almak Artık Çok Kolay</h3>
                    <p class="feature__text">Rampa Akademi size gereken bütün gereksinimleri kolaylıkla sağlacaktır.</p>
                </div><!-- end feature-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4 col-sm-6">
                <div class="feature-item feature-item3">
                    <div class="hover-overlay"></div>
                    <i class="la la-graduation-cap feature__icon"></i>
                    <h3 class="feature__title">Bitirme Sertifikası</h3>
                    <p class="feature__text">Tamamladığınız her eğitimimiz için onaylı bitirme sertifikası edinin</p>
                </div><!-- end feature-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end feature-area -->
<!--======================================
        END FEATURE AREA
    ======================================-->

<!--======================================
        START GET SUGGESTED COURSE AREA 
======================================-->
<?php if (!empty($get_suggested)): ?>
    <section class="course-area">
        <div class="course-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading text-center">
                            <h5 class="section__meta">İLGİLENDİĞİNİZ ALANDAKİ EĞİTİMLERİMİZİ KEŞFEDİN</h5>
                            <h2 class="section__title">Öne Çıkan Eğitimler</h2>
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
                        <div class="row course-block">
                            <?php foreach ($get_suggested as $product): ?>
                                <div class="col-lg-4">
                                    <div class="course-item">
                                        <div class="course-img">
                                            <a href="<?=$product -> product_link; ?>" class="course__img"><img src="<?=$product -> product_photo; ?>" alt=""></a>
                                            <div class="course-tooltip">
                                                <span class="tooltip-label">Öne Çıkan</span>
                                            </div>
                                        </div><!-- end course-img -->
                                        <div class="course-content">
                                            <h3 class="course__title">
                                                <a href="<?=$product -> product_link; ?>"><?=$product -> product_name; ?></a>
                                            </h3>
                                            <div class="course-price-wrap">
                                                <span class="course__price">
                                                <?php
                                                    if (!empty($product -> product_price) && $product->product_price > 0):

                                                        if ($product -> product_discount_price):
                                                            echo '<del class="mr-2 text-secondary">'.$product -> product_price.'</del>';
                                                            echo '<b>'.$product -> product_discount_price.'</b>';
                                                        else:
                                                            echo '<b>'.$product -> product_price.'</b>';
                                                        endif;
                                                    endif;
                                                ?>
                                                </span>
                                                <a href="<?=base_url("egitim-kayit")?>" class="course__btn">Hemen Kayıt Olun</a>
                                            </div><!-- end course-price-wrap -->
                                        </div><!-- end course-content -->
                                    </div><!-- end course-item -->
                                </div><!-- end col-lg-4 -->
                            <?php endforeach; ?>
                        </div><!-- end course-block -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end course-content-wrapper -->
    </section><!-- end courses-area -->
<?php endif; ?>
<!--======================================
        END GET SUGGESTED COURSE AREA
======================================-->

<!--======================================
        START GET BEST SELLING COURSE AREA
======================================-->
<?php if (!empty($get_services)): ?>
    <section class="course-area">
        <div class="course-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading text-center">
                            <h5 class="section__meta">HİZMETLERİMİZ</h5>
                            <h2 class="section__title">HİZMETLERİMİZ</h2>
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
                        <div class="row course-block">
                            <?php foreach ($get_services as $service): ?>
                                <div class="col-lg-4">
                                    <div class="course-item">
                                        <div class="course-img">
                                            <a href="<?=base_url("h/".$service -> service_url); ?>" class="course__img"><img src="<?=base_url("public/uploads/services/".$service -> service_photo); ?>" alt=""></a>
                                        </div><!-- end course-img -->
                                        <div class="course-content">
                                            <h3 class="course__title">
                                                <a href="<?=base_url("h/".$service -> service_url); ?>"><?=$service -> service_title; ?></a>
                                            </h3>
                                        </div><!-- end course-content -->
                                    </div><!-- end course-item -->
                                </div><!-- end col-lg-4 -->
                            <?php endforeach; ?>
                        </div><!-- end course-block -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end course-content-wrapper -->
    </section><!-- end courses-area -->
<?php endif; ?>
<!--======================================
        END GET BEST SELLING COURSE AREA
======================================-->

<div class="section-divider"></div>

<!--======================================
        START GET-START AREA
======================================-->
<section class="get-start-area">
    <div id="perticles-js"></div>
    <div class="box-icons">
        <div class="box-one"></div>
        <div class="box-two"></div>
        <div class="box-three"></div>
        <div class="box-four"></div>
    </div><!-- end box-icons -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-heading">
                    <h5 class="section__meta section__meta2">Sektörel Anlamda Gelişmeniz İçin En Doğru Yerdesiniz</h5>
                    <h2 class="section__title section__title2">Rampa Akademi'den Alacağınız Eğitimler Size Güvence Sağlıyor</h2>
                    <span class="section__divider section__divider2"></span>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="box-icons2">
        <div class="box-one"></div>
        <div class="box-two"></div>
        <div class="box-three"></div>
        <div class="box-four"></div>
        <div class="box-five"></div>
    </div><!-- end box-icons2 -->
</section><!-- end get-start-area -->
<!--======================================
        END GET-START AREA
======================================-->

<!--======================================
        START BENEFIT AREA
======================================-->
<section class="benefit-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="benefit-heading">
                    <div class="section-heading">
                        <h5 class="section__meta">RAMPA AKADEMİ</h5>
                        <h2 class="section__title">Eğitimin Doğru Adresi</h2>
                        <span class="section__divider"></span>
                        <p class="section__desc">
                        Akademik çalışmalarınızda sıklıkla ihtiyaç duyduğunuz çeviri ve revizyon çalışmalarında, hızlı ve güvenilir çözümler sunmak
                        <br>
                        <br>
                        Yapacağımız çeviriler ücret ve kalite garantilidir.
                        <br>
                        <br>
                        Çevirisi yapılacak dokümanı bu adrese email atmanız yeterli.
                        <br>
                        <br>
                        Hem ücret hem de süre konusunda 1-2 saat içinde emailinize cevap gönderilecektir.
                        <br>
                        <br>
                        Türkçe-İngilizce çevirilerin ücreti 18 TL (1000 Karakter)
                        <br>
                        İngilizce-Türkçe çevirilerin ücreti 16 TL (1000 Karakter)
                        <br>
                        Proof Ücreti 12 TL (1000 Karakter)
                        </p>
                        <div class="row benefit-course-box">
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item1">
                                    <span class="la la-mouse-pointer benefit__icon"></span>
                                    <h4 class="benefit__title">Farklı Alanlarda Eğitimler</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item2">
                                    <span class="la la-bolt benefit__icon"></span>
                                    <h4 class="benefit__title">Teorik ve Uygulamalı Eğitimler</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4">
                                <div class="benefit-item benefit-item3">
                                    <span class="la la-users benefit__icon"></span>
                                    <h4 class="benefit__title">Canlı Topluluklar</h4>
                                </div><!-- end benefit-item -->
                            </div><!-- end col-lg-4 -->
                        </div><!-- end row -->
                        <div class="get-start-btn">
                            <a href="<?=base_url('s/hakkimizda'); ?>" class="theme-btn">Ve Dahası</a>
                        </div>
                    </div><!-- end section-heading -->
                </div><!-- end benefit-heading -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="benefit-img">
                    <img src="<?=base_url("public/front_end/images/img13.jpg")?>" alt="">
                    <img src="<?=base_url("public/front_end/images/img14.jpg")?>" alt="">
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end benefit-area -->
<!--======================================
        END BENEFIT AREA
======================================-->

<div class="section-divider"></div>

<!--======================================
        START REGISTER AREA
======================================-->
<section class="register-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="register-heading">
                    <div class="section-heading bg-white">
                        <h5 class="section__meta">EĞİTİMLERİMİZE KAYIT OLUN</h5>
                        <h2 class="section__title">Tecrübe Kazanın</h2>
                        <span class="section__divider"></span>
                        <p class="section__desc register__desc">
                            Deneyimli eğitmenlerimizin bilgileri doğrultusunda sertifika almaya hak kazanın.
                        </p>
                        <p class="section__desc register__desc2">
                            Sertifikalarınızı dilerseniz referans olarak kariyer yolunuzda ilgili firmalara tanıtın.
                        </p>
                    </div><!-- end section-heading -->
                </div><!-- end register-heading -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end register-area -->
<!--======================================
        END REGISTER AREA
======================================-->

<div class="section-divider"></div>

<!-- ================================
       START CLIENTLOGO AREA
================================= -->
<?php if(!empty($get_galleries)):?>
    <section class="clientlogo-area">
        <div class="stroke-line">
            <span class="stroke__line"></span>
            <span class="stroke__line"></span>
            <span class="stroke__line"></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <h5 class="section__meta">RESİM GALERİMİZ</h5>
                        <h2 class="section__title">Resim Galerimiz</h2>
                        <span class="section__divider"></span>
                    </div><!-- end section-heading -->
                </div><!-- end col-md-12 -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="client-logo">
                        <?php foreach($get_galleries AS $gallery): ?>
                            <div class="client-logo-item">
                                <img class="p-3" src="<?=base_url("public/uploads/galleries/450x450/".$gallery -> gallery_photo_name); ?>" alt="Rampa Akademi">
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