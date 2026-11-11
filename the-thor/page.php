<?php get_header(); ?>


  <!--l-wrapper-->
  <div class="l-wrapper">

    <!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){$frame = ' '.get_option('fit_conMain_frame');}

    //ページ横幅のオプション設定
    $width_page = '';
    if (get_option('fit_pageLayout_width') && get_option('fit_pageLayout_width') != 'off'){$width_page = get_option('fit_pageLayout_width');}

    //レイアウト設定
    $layout = '';
    if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ){
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '1' ){$layout = ' l-main-wide'.$width_page;}
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' && get_option('fit_pageLayout_side') == 'left' ){$layout = ' l-main-right';}
    }
    else{
      if ( get_option('fit_pageLayout_column') == '1' ){$layout = ' l-main-wide'.$width_page;}
      if ( get_option('fit_pageLayout_column') != '1' && get_option('fit_pageLayout_side') == 'left'  ){$layout = ' l-main-right';}
    }
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">


      <div class="dividerBottom">


      <?php if ( get_option('fit_pageStyle_headline') != 'viral' ): ?>
        <h1 class="heading heading-primary"><?php the_title(); ?></h1>

        <?php if ( get_option('fit_pageStyle_headline') != 'none' ): ?>
        <div class="eyecatch<?php if (get_option('fit_pageStyle_aspect') && get_option('fit_pageStyle_aspect') != 'off' ): ?> <?php echo get_option('fit_pageStyle_aspect'); ?><?php endif; ?> eyecatch-main">
          <span class="eyecatch__link">
          <?php if ( has_post_thumbnail()): ?>
            <?php the_post_thumbnail('icatch768'); ?>
          <?php elseif ( get_fit_noimg()): ?>
            <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
		  <?php else: ?>
            <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
          <?php endif; ?>
          </span>
        </div>
        <?php endif; ?>

      <?php endif; ?>


        <!--pageContents-->
        <div class="pageContents<?php if (get_option('fit_pageStyle_frame') && get_option('fit_pageStyle_frame') != 'off' ):?> <?php echo get_option('fit_pageStyle_frame')?><?php endif; ?>">
          <?php if (get_option('fit_pageShare_top') == 'on') : ?>
		    <aside class="social-top"><?php fit_share_btn(); ?></aside>
          <?php endif; ?>


		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section class="content<?php fit_content_class(); ?>">
			<?php the_content(); ?>
          </section>
		  <?php endwhile; endif; ?>


          <?php if (get_option('fit_pageShare_bottom') == 'on') : ?>
		    <aside class="social-bottom"><?php fit_share_btn(); ?></aside>
          <?php endif; ?>
        </div>
		<!--/pageContents-->



        <?php if( get_option('fit_pageCta_switch') == 'on' ):?>
        <!-- 記事下CTA -->
        <?php
		$frame = '';
        if(!empty(get_option('fit_pageCta_style')) && get_option('fit_pageCta_style') != 'off' ){
			$frame = get_option('fit_pageCta_style');
		}?>
        <div class="pageCta <?php echo $frame ?>">
	      <?php if (get_option('fit_pageCta_title')) :?>
            <h2 class="pageCta__title"><?php echo get_option('fit_pageCta_title'); ?></h2>
          <?php endif; ?>
          <div class="pageCta__contents">

            <?php if (get_fit_pageCta_img()) :
		        $pageImg = get_fit_pageCta_img();
			    $pageImg_id = fit_get_imageId($pageImg);
			    $pageImg_full = wp_get_attachment_image_src( $pageImg_id, 'full' );
			    $pageImg_src = $pageImg_full[0]; //url
			    $pageImg_width = $pageImg_full[1]; //横幅
			    $pageImg_height = $pageImg_full[2]; //高さ
		    ?>
              <?php if (get_option('fit_pageCta_url')) :?><a href="<?php echo get_option('fit_pageCta_url'); ?>"><?php endif; ?>
              <img class="pageCta__img<?php
                if(get_option('fit_pageCta_imgPc') == 'value2' ){echo ' pageCta__img-pcCenter';}
		        if(get_option('fit_pageCta_imgPc') == 'value3' ){echo ' pageCta__img-pcLeft';}
		        if(get_option('fit_pageCta_imgSp') == 'value2' ){echo ' pageCta__img-spCenter';}
		        if(get_option('fit_pageCta_imgSp') == 'value3' ){echo ' pageCta__img-spLeft';}
		        ?>"
              <?php echo fit_correct_src(); ?>="<?php echo $pageImg_src; ?>" alt="CTA-IMAGE" width="<?php echo $pageImg_width; ?>" height="<?php echo $pageImg_height; ?>" <?php echo fit_dummy_src(); ?>>
              <?php if (get_option('fit_pageCta_url')) :?></a><?php endif; ?>
            <?php endif; ?>


            <?php if (get_option('fit_pageCta_contents')) :?>
		      <?php echo apply_filters( 'fit_pageContents', get_option('fit_pageCta_contents') ); ?>
            <?php endif; ?>

          </div>

          <?php if (get_option('fit_pageCta_btn') && get_option('fit_pageCta_url')) :?>
          <div class="btn btn-center">
            <a class="btn__link btn__link-primary btn__link-wide" href="<?php echo get_option('fit_pageCta_url') ?>"><?php echo get_option('fit_pageCta_btn') ?></a>
          </div>
          <?php endif; ?>

        </div>
        <!-- /記事下CTA -->
        <?php endif; ?>



      </div>



    </main>
    <!--/l-main-->


    <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ):?>
      <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
    <?php else:?>
      <?php if ( get_option('fit_pageLayout_column') != '1' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>
