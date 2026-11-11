<?php
//////////////////////////////////////////////////
//下記ユーザーカスタマイズエリア
//////////////////////////////////////////////////

add_image_size( 'interview_image', 200, 200, false );

///////////////////////////////////////
// Gutenberg用のCSSを読み込む
///////////////////////////////////////
add_action( 'enqueue_block_editor_assets', 'gutenberg_stylesheets_custom_demo' );
function gutenberg_stylesheets_custom_demo() {
  //現在適用しているテーマのeditor-style.cssを読み込む
  $editor_style_url = get_theme_file_uri('/editor-style.css');
  wp_enqueue_style( 'theme-editor-style', $editor_style_url );

  // //JavaScriptも読み込み可能
  // wp_enqueue_script( 'theme-gutenberg-js', get_theme_file_uri('/js/gutenberg.js'), array( 'jquery' ), false, true );

}