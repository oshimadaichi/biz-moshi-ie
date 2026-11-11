<?php
	$image_id  = block_value( 'image' );
	$image_url = wp_get_attachment_image( $image_id, 'interview_image' );
	$image = block_field( 'image', false );

	$position = ' myBlockInterview_right';
	if ( block_value( 'position' ) ) {
	} else {
	    $position = ' myBlockInterview_left';
	}
?>
<div class="myBlockInterview<?php echo $position; ?>">
    <div class="side">
	    <?php if ( ! empty( $image ) ) : ?><figure class="image"><?php echo $image_url; ?></figure><?php endif; ?>
		<?php if ( ! empty( block_value( 'name' ) ) ) : ?><p class="name"><?php block_field( 'name' ); ?></p><?php endif; ?>
    </div> 
	<div class="detail">
		<?php if ( ! empty( block_value( 'text' ) ) ) : ?><div class="fukidashi">
			<?php block_field( 'text' ); ?>
		</div><?php endif; ?>
	</div>
</div>