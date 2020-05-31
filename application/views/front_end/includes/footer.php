<!-- ================================
         END FOOTER AREA
================================= -->
<section class="footer-area">
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <a href="<?=base_url()?>">
                        <img src="<?= base_url("public/front_end/images/rampawhite.png") ?>" alt="<?=$settings["general"]->setting_site_name?>" class="footer__logo">
                    </a>
                    <ul class="footer-address">
                        <li><a href="tel:<?=$settings["general"]->setting_site_phone?>"><?=$settings["general"]->setting_site_phone?></a></li>
                        <li><a href="tel:+<?=$settings["general"]->setting_site_phone_2?>"><?=$settings["general"]->setting_site_phone_2?></a></li>
                        <li><a style="text-transform:none" href="mailto:<?=$settings["general"]->setting_site_email?>" class="mail"><?=$settings["general"]->setting_site_email?></a></li>
                        <li><?=$settings["general"]->setting_site_adress?></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">Kurumsal</h3>
                    <span class="section__divider"></span>
                    <ul class="footer-link">
                        <li><a href="<?=base_url("s/hakkimizda")?>">Hakkımızda</a></li>
                        <li><a href="<?=base_url("s/cerez-kullanimi")?>">Çerez Kullanımı</a></li>
                        <li><a href="<?=base_url("s/sikca-sorulan-sorular")?>">Sıkça Sorulan Sorular</a></li>
                        <li><a href="<?=base_url("s/gizlilik-ve-guvenlik-politikasi")?>">Gizlilik ve Güvenlik Politikası</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">Linkler</h3>
                    <span class="section__divider"></span>
                    <ul class="footer-link">
                        <li><a href="<?=base_url("sitemap.xml")?>">Sitemap</a></li>
                        <li><a href="<?=base_url("s/site-kullanim-sartlari")?>">Site Kullanım Şartları</a></li>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-title">Sosyal Medya</h3>
                    <span class="section__divider"></span>
                    <ul class="footer-link social-link">
                        <?php
                            if ($settings['social_media'] -> social_media_instagram)
                                echo '<li><a href="'.$settings['social_media'] -> social_media_instagram.'"><i class="la la-instagram"></i> Instagram</a></li>';

                            if ($settings['social_media'] -> social_media_facebook)
                                echo '<li><a href="'.$settings['social_media'] -> social_media_facebook.'"><i class="la la-facebook"></i> Facebook</a></li>';

                            if ($settings['social_media'] -> social_media_youtube)
                                echo '<li><a href="'.$settings['social_media'] -> social_media_youtube.'"><i class="la la-youtube"></i> Youtube</a></li>';

                            if ($settings['social_media'] -> social_media_twitter)
                                echo '<li><a href="'.$settings['social_media'] -> social_media_twitter.'"><i class="la la-twitter"></i> Twitter</a></li>';

                            if ($settings['social_media'] -> social_media_linkedin)
                                echo '<li><a href="'.$settings['social_media'] -> social_media_linkedin.'"><i class="la la-linkedin"></i> Linkedin</a></li>';
                        ?>
                    </ul>
                </div><!-- end footer-widget -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->		 
        <div class="row copyright-content align-items-center">
            <div class="col-lg-10">
                <p class="copy__desc"><?=$settings["general"]->setting_site_copyright?></p>
            </div><!-- end col-lg-11 -->
            <div class="col-lg-2"><p class="copy__desc"><a target="_blank" href="https://mutfakyapim.com/"><img src="<?=base_url("public/front_end/images/my.png")?>" alt="<?=$settings["general"]->setting_site_author?>" class="img-fluid"></a></p></div>
        </div><!-- end copyright-content -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
          END FOOTER AREA
================================= -->
		
		<div class="container my-4">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<img src="<?php echo base_url('public/front_end/images/igu.png'); ?>" class="img-fluid">
				</div>
			</div>	
		</div>

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

