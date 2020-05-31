<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="breadcrumb__title">İletişim</h2>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="/">Anasayfa</a></li>
                        <li>İletişim</li>
                    </ul>
                    <div class="text-outline">İletişim</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START GOOGLE MAP
================================= -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3009.6227561896317!2d28.860504315414808!3d41.03350857929815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cabad25795187f%3A0x8266b79dd89a7f36!2zTWVya2V6LCBJc3RhbmJ1bCBDZCBObzo0OCwgMzQyMDAgQmHEn2PEsWxhci_EsHN0YW5idWw!5e0!3m2!1str!2str!4v1581924011863!5m2!1str!2str" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    <!-- end map -->
<!-- ================================
       END GOOGLE MAP
================================= -->

<!-- ================================
       START CONTACT AREA
================================= -->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="contact-item contact-item1">
                    <div class="hover-overlay"></div>
                    <span class="la la-user contact__icon"></span>
                    <h4 class="contact__title">Hakkımızda</h4>
                    <p class="contact__desc">
                        <?=$settings["general"]->setting_site_description?>
                    </p>
                </div><!-- end contact-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 col-sm-6">
                <div class="contact-item contact-item2">
                    <div class="hover-overlay"></div>
                    <span class="la la-map contact__icon"></span>
                    <h4 class="contact__title">Adresimiz</h4>
                    <p class="contact__desc">
                        Merkez Mah. İstanbul Cad. No:48/4 Bağcılar – İstanbul
                    </p>
                </div><!-- end contact-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 col-sm-6">
                <div class="contact-item contact-item3">
                    <div class="hover-overlay"></div>
                    <span class="la la-envelope-o contact__icon"></span>
                    <h4 class="contact__title">İletişim Bilgilerimiz</h4>
                    <ul class="contact__list">
                        <li><a href="mailto:bilgi@rampakademi.com"> bilgi@rampakademi.com</a></li>
                        <li><a href="tel:+<?php echo $settings["general"]->setting_site_phone; ?>"> <?php echo $settings["general"]->setting_site_phone; ?></a></li>
                        <li><a href="tel:+<?php echo $settings["general"]->setting_site_phone_2; ?>"> <?php echo $settings["general"]->setting_site_phone_2; ?></a></li>
                    </ul>
                </div><!-- end contact-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="row contact-form-wrap">
            <div class="col-lg-5">
                <div class="section-heading">
                    <p class="section__meta">İletişime Geçin</p>
                    <h2 class="section__title">İletişim Formumuz</h2>
                    <span class="section__divider"></span>
                    <p class="section__desc">
                        <?=$get_page->page_text?>
                    </p>
                    <ul class="section__list">
                        <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div><!-- end sec-heading -->
            </div><!-- end col-md-5 -->
            <div class="col-lg-7">
                <div class="contact-form-action">
                    <!--Contact Form-->
                    <form id="sendmail" name="sendmail" method="post" enctype="multipart/form-data" action="<?=base_url("save_contact")?>">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="Name" name="message_name_surname" placeholder="Adınız ve Soyadınız">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end col-lg-6 -->
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="email" id="Email" name="message_email" placeholder="Email Adresiniz">
                                    <span class="la la-envelope-o input-icon"></span>
                                </div>
                            </div><!-- end col-lg-6 -->
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="Phone" name="message_phone" placeholder="Telefon Numaranız">
                                    <span class="la la-phone input-icon"></span>
                                </div>
                            </div><!-- end col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="Subject" name="message_subject" placeholder="Konu">
                                    <span class="la la-book input-icon"></span>
                                </div>
                            </div><!-- end col-lg-6 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="message-control form-control" id="Comment" name="message_text" placeholder="Mesajınızı Buraya Yazın"></textarea>
                                    <span class="la la-pencil input-icon"></span>
                                </div>
                            </div><!-- end col-lg-12 -->
                            <div class="col-lg-12">
                                <button class="theme-btn" type="submit">Formu Gönder</button>
                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </form>
                </div><!-- end contact-form-action -->
            </div><!-- end col-md-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
       START CONTACT AREA
================================= -->
