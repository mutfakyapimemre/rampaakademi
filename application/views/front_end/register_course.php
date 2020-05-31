<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <h2 class="breadcrumb__title">Eğitimlerimize Kayıt Olun</h2>
                    <ul class="breadcrumb__list">
                        <li class="active__list-item"><a href="<?=base_url()?>">Anasayfa</a></li>
                        <li>Eğitimlerimize Kayıt Olun</li>
                    </ul>
                    <div class="text-outline">Eğitimlerimize Kayıt Olun</div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START ADMISSION AREA
================================= -->
<section class="admission-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h5 class="section__meta">Eğitimlerimize Kayıt Olun</h5>
                    <h2 class="section__title">Kayıt Formu</h2>
                    <span class="section__divider"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="admission-body">
                    <div class="contact-form-action">
                        <!--Contact Form-->
                        <form method="post" action="<?=base_url("register_course")?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Adınız*</label>
                                    <input class="form-control" type="text" name="reservation_name" placeholder="Adınız">
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Soyadınız*</label>
                                    <input class="form-control" type="text" name="reservation_surname" placeholder="Soyadınız">
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Hangi Eğitime Kayıt Olmak İstiyorsunuz?*</label>
                                    <div class="course-filter">
                                        <div class="courses-ordering">
                                            <select class="target-course" name="product_id">
                                            <option value="">Eğitim Seçiniz</option>
                                                <?php foreach ($get_products as $key => $value): 
                                                    $reservation_count = $this-> Front_End_Model ->get_reservation_count(["product_id" => $value->product_id,"reservation_status" => 1]);?>
                                                    <option value="<?=$value->product_id?>"><?=$value->product_name?> | <?=$reservation_count?> Toplam Katılımcı | <?=$value->product_quota?> Kontenjan</option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div><!-- end courses-ordering -->
                                    </div><!-- end course-filter -->
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Doğum Tarihiniz*</label>
                                    <div class="course-filter birthday-filter">
                                        <div class="courses-ordering">
                                        <span>
                                            <select class="target-course target-day" name="reservation_birth_day">
                                                <option value="" selected>Gün</option>
                                                <?php for($i=1;$i<=31;$i++):?>
                                                    <option value="<?=($i < 10 ? '0'.$i : $i)?>"><?=$i?></option>
                                                <?php endfor;?>
                                            </select>
                                        </span>
                                            <span>
                                            <select class="target-course target-month" name="reservation_birth_month">
                                                <option value="" selected>Ay</option>
                                                <option value="01">Ocak</option>
                                                <option value="02">Şubat</option>
                                                <option value="03">Mart</option>
                                                <option value="04">Nisan</option>
                                                <option value="05">Mayıs</option>
                                                <option value="06">Haziran</option>
                                                <option value="07">Temmuz</option>
                                                <option value="08">Ağustos</option>
                                                <option value="09">Eylül</option>
                                                <option value="10">Ekim</option>
                                                <option value="11">Kasım</option>
                                                <option value="12">Aralık</option>
                                            </select>
                                        </span>
                                            <span>
                                                <select class="target-course target-year" name="reservation_birth_year">
                                                    <option value="" selected>Yıl</option>
                                                    <?php 
                                                        $year = intval(date("Y"));
                                                        for($i=$year; $i>=$year-105;$i--):
                                                    ?>
                                                        <option value="<?=$i?>"><?=$i?></option>
                                                    <?php endfor;?>
                                                </select>
                                            </span>
                                        </div><!-- end courses-ordering -->
                                    </div><!-- end course-filter -->
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-12 form-group">
                                    <label class="form-label">Adresiniz*</label>
                                    <input class="form-control" type="text" name="reservation_address" placeholder="Adresiniz">
                                </div><!-- end col-lg-12 -->

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">İl*</label>
                                    <input class="form-control" type="text" name="reservation_city" placeholder="İl">
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Ülke*</label>
                                    <input class="form-control" type="text" name="reservation_country" placeholder="Ülke">
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Telefon Numaranız*</label>
                                    <input class="form-control" type="text" name="reservation_phone" placeholder="Telefon Numaranız">
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6 form-group">
                                    <label class="form-label">Email Adresiniz*</label>
                                    <input class="form-control" type="email" name="reservation_email" placeholder="Email Adresiniz">
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-6 form-group gender-group">
                                    <label class="form-label">Cinsiyetiniz*</label>
                                    Erkek <input class="gender-control" type="radio" name="reservation_gender" value="Erkek">
                                    Kadın <input class="gender-control" type="radio" name="reservation_gender" value="Kadın">
                                </div><!-- end col-lg-6 -->

                                <div class="col-lg-12">
                                    <button class="theme-btn" type="submit">Formu Gönderin</button>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form-action -->
                </div><!-- end admission-body -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end admission-area -->
<!-- ================================
       END ADMISSION AREA
================================= -->