<?php
////////////////////////////////////////////////////////
//オリジナルBODYクラスを作成
////////////////////////////////////////////////////////
function fit_body_class( $classes ) {
	$classes = array();
	if ( get_option('fit_bsLogo_heightSp') != '20' ){
		$classes[] = 't-logoSp'.get_option('fit_bsLogo_heightSp');
	}
	if ( get_option('fit_bsLogo_heightPc') != '30' ){
		$classes[] = 't-logoPc'.get_option('fit_bsLogo_heightPc');
	}
	if ( get_option('fit_conHeader_gnavi') == 'u-none-sp' || get_option('fit_conHeader_gnavi') == 'off'  ){
		$classes[] = 't-naviNoneSp';
	}
	if ( get_option('fit_conHeader_gnavi') == 'u-none-pc' && get_option('fit_conHeader_subnavi') == 'value2' ||
	     get_option('fit_conHeader_gnavi') == 'off' && get_option('fit_conHeader_subnavi') == 'value2'){
		$classes[] = 't-naviNonePc';
	}
	if ( get_option('fit_conHeader_layout') == 'value2' ){
		$classes[] = 't-headerCenter';
	}
	if ( get_option('fit_conHeader_text') == 'white' ){
		$classes[] = 't-headerColor';
	}
    if (get_option('fit_conFooterSp_menu') == 'on' ){
        $classes[] = 't-footerFixed';
    }

    //値を取得
    $link_about   = get_field('link_about');
    $link_event   = get_field('link_event');
    $link_contact = get_field('link_contact');
    if(($link_about || $link_event || $link_contact) && !is_front_page()){
        $classes[] = 't-footerFixed';
    }
	return $classes;
}
add_filter( 'body_class', 'fit_body_class' );
