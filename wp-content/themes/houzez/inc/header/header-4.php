<?php
if ( is_page_template( 'template/template-splash.php' ) ) {
    $css_class = 'header-section slpash-header';
} else {
    $css_class = 'header-section-4 not-splash-header';
}

$allowed_html = array();

global $current_user, $post;
wp_get_current_user();
$userID  =  $current_user->ID;
$user_custom_picture =  get_the_author_meta( 'fave_author_custom_picture' , $userID );
$header_layout = houzez_option('header_4_width');
$main_menu_sticky = houzez_option('main-menu-sticky');
$header_4_menu_align = houzez_option('header_4_menu_align');
$top_bar = houzez_option('top_bar');

$trans_class = '';
$fave_main_menu_trans = get_post_meta( $post->ID, 'fave_main_menu_trans', true );
if( $fave_main_menu_trans == 'yes' ) {
    $trans_class = 'houzez-header-transparent';
}

if( $top_bar != 0 ) {
    get_template_part('inc/header/top', 'bar');
}
$menu_righ_no_user = '';
$header_login = houzez_option('header_login');
if( $header_4_menu_align == 'nav-right' && $header_login != 'yes' ) {
    $menu_righ_no_user = 'menu-right-no-user';
}
?>
<!--start section header-->
<header id="header-section" class="houzez-header-main <?php echo esc_attr( $css_class ).' '.esc_attr( $header_4_menu_align ).' '.esc_attr($trans_class).' '.esc_attr($menu_righ_no_user); ?> hidden-sm hidden-xs" data-sticky="<?php echo esc_attr( $main_menu_sticky ); ?>">
    <div class="<?php echo sanitize_html_class( $header_layout ); ?>">
        <div class="header-left">

            <div class="logo logo-desktop">
                <?php get_template_part('inc/header/logo'); ?>
            </div>
            
            <div class="ls-phone"><a href="tel:88002000600">8(800)-2000-600 <i class="fa fa-phone" aria-hidden="true"></i></a></div>
            <?php if(is_front_page()): ?>
            <?php global $houzez_local; ?>
            <div class="ls-search">
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div>
                        <!-- <input value="" name="s" id="s" type="text" placeholder="<?php echo $houzez_local['blog_search']; ?>"> -->
                        <input value="" name="s" id="s" type="text">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <i class="fa fa-search ls-i" aria-hidden="true"></i>
                        <i class="fa fa-times ls-i ls-disp-none" aria-hidden="true"></i>
                    </div>
                </form>
            </div>
            <?php endif; ?>

            

            <div class="ls-currency">
                <i class="fa fa-rub" aria-hidden="true"></i>
            </div>

            <div class="ls-lang">
                <div class="az-select">
                    <select name="" id="">
                        <option value="1">RU</option>
                        <option value="2">EN</option>
                    </select>
                </div>
            </div>
            
            <!-- <div class="ls-favorites">
                <a href="/favorite/"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
            </div> -->

            <nav class="navi main-nav">
                <?php
                // Pages Menu
                if ( has_nav_menu( 'main-menu' ) ) :
                    wp_nav_menu( array (
                        'theme_location' => 'main-menu',
                        'container' => '',
                        'container_class' => '',
                        'menu_class' => '',
                        'menu_id' => 'main-nav',
                        'depth' => 4
                    ));
                endif;
                ?>
            </nav>
            
        </div>

        <?php if( class_exists('Houzez_login_register') ): ?>
            <?php if( houzez_option('header_login') != 'no' ): ?>
                <div class="header-right">
                    <?php get_template_part('inc/header/login', 'nav'); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

</header>
<!--end section header-->

<?php get_template_part( 'inc/header/mobile-header' ); ?>