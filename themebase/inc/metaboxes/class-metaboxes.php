<?php
class MetaBoxes {
	var $meta;

	public function __construct($mbox) {
		if ( is_admin() ){
			add_action('load-post.php', array($this, 'init_metabox'));
			add_action('load-post-new.php', array($this, 'init_metabox'));
		}
		$this->meta = $mbox;
		$this->init_metabox();
	}


	public function init_metabox() {

		add_action( 'add_meta_boxes', array($this, 'add_metabox'));
		add_action( 'save_post', array($this, 'save_metabox'), 10, 2);

	}

	public function add_metabox() {

		add_meta_box(
			$this->meta['id'],
			__( $this->meta['name'], 'textdomain' ),
			array( $this, 'render_metabox'),
			$this->meta['post'],
			$this->meta['context'],
			$this->meta['position']
			);

	}

	public function render_metabox( $post ) {
		
		$input = '';
		$vars = $this->meta['var'];

		wp_nonce_field( 'meta_nonce_action', 'meta_nonce' );

		foreach ($vars as $var => $value) {

			// get value form post metabox
			$mb = get_post_meta( $post->ID, $value['id'], true);
			// var_dump($mb);
			
			// set default values
			if( empty( $mb ) ) $mb = $value['std'];

			switch ($value['type']) {

				case 'textarea':
				echo '
				<div class="form-group">
					<label for="'.$value['id'].'"><strong>'.$value['name'].'</strong></label><br />
					<textarea class="widefat" id="'.$value['id'].'" name="'.$value['id'].'">'.$mb.'</textarea>
				</div>
				';
				break;

				case 'wysiwyg':
				echo '<h3 for="'.$value['id'].'"><strong>'.$value['name'].'</strong></h3><br />';
				add_meta_box(WYSIWYG_META_BOX_ID, __('Custom WYSIWYG Meta Box', 'wysiwyg') , 'custom_wysiwyg', 'post');
				$content = get_post_meta($post->ID, $value['id'], true);
				wp_editor(htmlspecialchars_decode($content) , $value['id'], array(
					"media_buttons" => true
					));
				break;

				case 'image':
				function my_admin_scripts()	{wp_enqueue_script('jquery');	wp_enqueue_script('media-upload');	wp_enqueue_script('thickbox'); }
				function my_admin_styles()	{wp_enqueue_style('thickbox');	}
				$url = get_post_meta($post->ID, $value['id'], true);
				
				?>
				<div id="<?php echo $value['id'];?>">
					<label><?php echo $value['name'];?></label><br />
					<input id="my_upl_button_<?php echo $value['id'];?>" type="button" value="Upload Image" />
					<input id="my_image_URL_<?php echo $value['id'];?>" name="<?php echo $value['id'];?>" type="text" value="<?php echo $url;?>" style="width:400px;" />
					<br/><img src="<?php echo $url;?>" style="width:200px;" id="picsrc_<?php echo $value['id'];?>" />
					<script>
						jQuery(document).ready( function( $ ) {
							var post_id = <?php echo $value['id'];?>;
							jQuery('#my_upl_button_<?php echo $value['id'];?>').click(function() {

								formfield = jQuery('#my_image_URL_<?php echo $value['id'];?>').attr('name');
								tb_show( '', 'media-upload.php?type=image&TB_iframe=true');  
								window.send_to_editor = function(html) {  
									imgurl = jQuery('img',html).attr('src');  
									classes = jQuery('img', html).attr('class');  
									id = classes.replace(/(.*?)wp-image-/, '');  
                					jQuery('#my_image_URL_<?php echo $value['id'];?>').val(imgurl);  //get image url and copy to field
                					jQuery('#picsrc_<?php echo $value['id'];?>').attr("src",imgurl)
                					tb_remove();  
                				}  
                				return false;
                			});
						});
					</script>
				</div>
				<?php
				break;

				case 'checkbox':
				echo '
				<div class="form-group">
					<label for="'.$value['id'].'"><strong>'.$value['name'].' </strong></label>
					<input class="widefat" id="'.$value['id'].'" name="'.$value['id'].'" value="1" '.checked( 1 == $mb, true, false).'  type="'.$value['type'].'" >
				</div>
				';
				break;

				default:
				
				echo '
				<div class="form-group">
					<label for="'.$value['id'].'"><strong>'.$value['name'].'</strong></label><br />
					<input class="widefat" id="'.$value['id'].'" name="'.$value['id'].'" value="'.$mb.'" type="'.$value['type'].'" >
				</div>
				';
				break;

			}

		}
	}

	function save_metabox( $post_id ) {

		$nonce_name   = (isset($_POST['meta_nonce']));
		$nonce_action = 'meta_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// // Check if a nonce is valid.
		// if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
		// 	return;

		// Check if the user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		$vars = $this->meta['var'];

		
		foreach ($vars as $var => $value) {
			// Sanitize user input.
			$mb = isset( $_POST[ $value['id'] ] ) ? $_POST[ $value['id'] ] : '';
			update_post_meta( $post_id, $value['id'], $mb );

		}

	}

}