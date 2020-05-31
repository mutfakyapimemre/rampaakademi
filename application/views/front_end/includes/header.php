<!-- start cssload-loader -->
<div class="preloader">
    <div class="assets/cssload-loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
<section class="header-menu-area">
    <div class="header-menu-fluid">
        <div class="header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 pr-lg-0 pr-xl-0">
                        <div class="header-widget header-widget1">
                            <ul class="contact-info d-block d-sm-block d-md-flex d-lg-flex d-xl-flex list-inline align-items-center">
                                <li class="list-inline-item"><a href="tel:<?=$settings["general"]->setting_site_phone?>"><span class="la la-phone"></span><?=$settings["general"]->setting_site_phone?></a> </li>
                                <li class="list-inline-item"><a href="mailto:<?=$settings["general"]->setting_site_email?>"><span class="la la-envelope-o"></span><?=$settings["general"]->setting_site_email?></a></li>
                            </ul>
                        </div><!-- end header-widget -->
                    </div><!-- end col-lg-5 -->
                    <div class="col-lg-8 pl-lg-0 pl-xl-0">
                        <div class="header-widget header-widget2 d-flex align-items-center justify-content-end">
                            <div class="header-right-info w-100">
                                <a href="<?=base_url("egitim-kayit")?>" class="w-100">
                                    <marquee>Hemen Eğitimlerimize Kayıt Olun...</marquee>
                                </a>
                            </div>
                            <div class="header-right-info d-none d-sm-none d-md-none d-lg-flex d-xl-flex align-items-center">
                                <ul class="social-info d-flex align-items-center">
                                    <?php
                                        if ($settings['social_media'] -> social_media_instagram)
                                            echo '<li><a href="'.$settings['social_media'] -> social_media_instagram.'"><i class="fab fa-instagram"></i></a></li>';

                                        if ($settings['social_media'] -> social_media_facebook)
                                            echo '<li><a href="'.$settings['social_media'] -> social_media_facebook.'"><i class="fab fa-facebook"></i></a></li>';

                                        if ($settings['social_media'] -> social_media_youtube)
                                            echo '<li><a href="'.$settings['social_media'] -> social_media_youtube.'"><i class="fab fa-youtube"></i></a></li>';

                                        if ($settings['social_media'] -> social_media_twitter)
                                            echo '<li><a href="'.$settings['social_media'] -> social_media_twitter.'"><i class="fab fa-twitter"></i></a></li>';

                                        if ($settings['social_media'] -> social_media_linkedin)
                                            echo '<li><a href="'.$settings['social_media'] -> social_media_linkedin.'"><i class="fab fa-linkedin"></i></a></li>';
                                    ?>
                                </ul>
                            </div>
                        </div><!-- end header-widget -->
                    </div><!-- end col-lg-7 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-top -->
        <div class="header-menu-content">
            <div class="container-fluid">
                <div class="row align-items-center main-menu-content">
                    <div class="col-lg-3">
                        <div class="logo-box">
                            <a href="<?=base_url()?>" class="logo" title="Rampa Akademi"><img src="<?= base_url("public/uploads/{$settings['general']->setting_logo}") ?>" alt="<?=$settings["general"]->setting_site_name?>"></a>
                        </div>
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-9">
                        <div class="menu-wrapper">
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                        <a href="<?=base_url()?>">Anasayfa</a>
                                    </li>
                                    <?php
                                    $i = 0;
                                    foreach ($site_menus as $menu) :

                                        foreach ($site_menus as $sub_menu_count) :
                                            if ($menu->menu_id == $sub_menu_count->menu_top_menu_id) :
                                                $i++;
                                            endif;
                                        endforeach;

                                        if ($menu->menu_top_menu_id == 0) :
                                            if ($menu->menu_status) :

                                                if ($i == 0) :

                                                    echo '<li>';
                                                    if ($menu->menu_target) :
                                                        echo '<a href="' . $menu->menu_url . '" target="_blank">' . $menu->menu_name . '</a>';
                                                    else :
                                                        echo '<a href="' . $menu->menu_url . '">' . $menu->menu_name . '</a>';
                                                    endif;
                                                    echo '</li>';

                                                else :
                                                    echo '<li>';
                                                    echo '<a href="' . $menu->menu_url . '">' . $menu->menu_name . ' <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>';
                                                    echo '<ul class="dropdown-menu-item">';
                                                    foreach ($site_menus as $sub_menu) :
                                                        if ($menu->menu_id == $sub_menu->menu_top_menu_id) :
                                                            if ($sub_menu->menu_status) :
                                                                if ($sub_menu->menu_target)
                                                                    echo '<li><a href="' . $sub_menu->menu_url . '" target="_blank">' . $sub_menu->menu_name . '</a></li>';
                                                                else
                                                                    echo '<li><a href="' . $sub_menu->menu_url . '">' . $sub_menu->menu_name . '</a></li>';
                                                            endif;
                                                        endif;
                                                    endforeach;
                                                    $i = 0;
                                                    echo '</ul>';
                                                    echo '</li>';
                                                endif;

                                            endif;
                                        endif;

                                    endforeach;
                                    ?>
                                </ul><!-- end ul -->
                            </nav><!-- end main-menu -->
                            <div class="logo-right-button">
                                <div class="side-menu-open">
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                    <span class="menu__bar"></span>
                                </div>
                            </div><!-- end logo-right-button -->
                            <div class="side-nav-container">
                                <div class="humburger-menu">
                                    <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
                                </div><!-- end humburger-menu -->
                                <div class="side-menu-wrap">
                                    <ul class="side-menu-ul">
                                        <li class="sidenav__item">
                                            <a href="<?=base_url()?>">Anasayfa</a>
                                        </li>
                                        <?php
                                        $i = 0;
                                        foreach ($site_menus as $menu) :

                                            foreach ($site_menus as $sub_menu_count) :
                                                if ($menu->menu_id == $sub_menu_count->menu_top_menu_id) :
                                                    $i++;
                                                endif;
                                            endforeach;

                                            if ($menu->menu_top_menu_id == 0) :
                                                if ($menu->menu_status) :

                                                    if ($i == 0) :

                                                        echo '<li class="sidenav__item">';
                                                        if ($menu->menu_target) :
                                                            echo '<a href="' . $menu->menu_url . '" target="_blank">' . $menu->menu_name . '</a>';
                                                        else :
                                                            echo '<a href="' . $menu->menu_url . '">' . $menu->menu_name . '</a>';
                                                        endif;
                                                        echo '</li>';

                                                    else :
                                                        echo '<li class="sidenav__item">';
                                                        echo '<a href="' . $menu->menu_url . '">' . $menu->menu_name . ' <span class="menu-plus-icon"></span></a>';
                                                        echo '<ul class="side-sub-menu">';
                                                        foreach ($site_menus as $sub_menu) :
                                                            if ($menu->menu_id == $sub_menu->menu_top_menu_id) :
                                                                if ($sub_menu->menu_status) :
                                                                    if ($sub_menu->menu_target)
                                                                        echo '<li><a href="' . $sub_menu->menu_url . '" target="_blank">' . $sub_menu->menu_name . '</a></li>';
                                                                    else
                                                                        echo '<li><a href="' . $sub_menu->menu_url . '">' . $sub_menu->menu_name . '</a></li>';
                                                                endif;
                                                            endif;
                                                        endforeach;
                                                        $i = 0;
                                                        echo '</ul>';
                                                        echo '</li>';
                                                    endif;

                                                endif;
                                            endif;

                                        endforeach;
                                        ?>
                                    </ul>
                                </div><!-- end side-menu-wrap -->
                            </div><!-- end side-nav-container -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-9 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-menu-content -->
    </div><!-- end header-menu-fluid -->
</section><!-- end header-menu-area -->
<!--======================================
        END HEADER AREA
======================================-->
