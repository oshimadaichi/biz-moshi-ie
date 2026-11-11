<?php
////////////////////////////////////////////////////////
// パスワード保護中の冒頭コンテンツ用カスタムフィールド
////////////////////////////////////////////////////////
function fit_add_pass_fields() {
	add_meta_box( 'pass_setting', 'パスワード保護中コンテンツ', 'fit_insert_pass_fields', 'post', 'normal', 'high');
	add_meta_box( 'pass_setting', 'パスワード保護中コンテンツ', 'fit_insert_pass_fields', 'page', 'normal', 'high');
}
add_action('admin_menu', 'fit_add_pass_fields');


// カスタムフィールドの入力フィールド
function fit_insert_pass_fields() {
	global $post;
	$pass_contents = get_post_meta($post->ID,'pass_contents',true);

?>
<table class="basicTable">
  <tbody>
    <tr>
      <th>パスワード保護中の冒頭コンテンツ設定</th>
      <td>
        <textarea name="pass_contents" id="pass_contents" cols="50" rows="4" /><?php echo esc_html($pass_contents) ?></textarea>
      </td>
    </tr>
  </tbody>
</table>
<?php
}


// カスタムフィールドの値を保存
function fit_save_pass_fields( $post_id ) {
	// クイックポストの時は何もしない
	if(isset($_POST['action'])) {
		if ($_POST['action'] == 'inline-save') {
			return $post_id;
		}
	}

	if(!empty($_POST['pass_contents'])){
		update_post_meta($post_id, 'pass_contents', $_POST['pass_contents'] );
	}else{
		delete_post_meta($post_id, 'pass_contents');
	}
}
add_action('save_post', 'fit_save_pass_fields');
