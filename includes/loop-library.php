<?php
global $post;
global $wp;

$count = 0;
$has_video_player = false;
$has_audio_player = false;
$media_url = get_post_meta( $post->ID, '_ilm-mc-media-path-s3', true );
$media_url = 'https://s3.us-west-1.amazonaws.com/'. $media_url;
$media_format = esc_attr( get_post_meta( $post->ID, '_ilm_mc_media_format', true ) );
$media_format = strtolower($media_format);
$media_year = esc_attr( get_post_meta($post->ID, '_ilm_mc_field_year_new', true));
$media_date = esc_attr( get_post_meta($post->ID, '_ilm_mc_field_date_new', true));
$media_exclude = esc_attr( get_post_meta($post->ID, '_ilm_mc_media_is_exclude', true));

if( $media_date != 'none' && $media_date != '' ) {
	if(is_valid_time_stamp($media_date)){
		$media_date_str = date('m-d-Y', $media_date);
	}else{
		$media_date_str = date('m-d-Y', strtotime($media_date));
	}
}else{
	$media_date_str = '';
}

$media_product_id = esc_attr( get_post_meta( $post->ID, '_ilm_mc_media_product_id', true ) );
$media_album = esc_attr( get_post_meta( $post->ID, '_ilm_mc_field_album_new', true ) );
$directory_url = esc_attr( get_post_meta( $post->ID, '_ilm_mc_field_directory', true ) );
$file_name = esc_attr( get_post_meta( $post->ID, '_ilm_mc_field_filename', true ) );
$downloadable_url = str_replace('https://audio.ilm.org/', '', $media_url);
$downloadable_url = htmlspecialchars_decode($media_url);
$media_issuu_id = esc_attr( get_post_meta( $post->ID, '_ilm_mc_media_issuu_embed_id', true ) );
$track_number = esc_attr( get_post_meta( $post->ID, '_ilm_mc_field_track_number_new', true ) );

$playback_string = esc_attr( get_post_meta( $post->ID, '_ilm_mc_media_playtime_string', true ) );
if( !$playback_string ){
	$playback_string = '0:00';
}

$ministers_terms = wp_get_post_terms($post->ID, 'media-artist', array( 'fields' => 'all' ));
$media_format_terms = wp_get_post_terms($post->ID, 'media-format', array( 'fields' => 'all' ));
$media_location_terms = wp_get_post_terms($post->ID, 'media-location', array( 'fields' => 'all' ));
$media_type_terms = wp_get_post_terms($post->ID, 'media-type', array( 'fields' => 'all' ));
$media_album_terms = wp_get_post_terms($post->ID, 'media-album', array( 'fields' => 'all' ));
$media_subject_terms = wp_get_post_terms($post->ID, 'media-subject', array( 'fields' => 'all' ));
$media_event_terms = wp_get_post_terms($post->ID, 'media-event-type', array( 'fields' => 'all' ));

$media_temp_title = get_post_meta( $post->ID, '_ilm-mc-media-temp-title', true );
update_post_meta( $post->ID, '_ilm-mc-media-temp-title', '' );

$library_permalink = str_replace(home_url(), '', get_permalink()); 

if(!$media_format) $media_format = 'audio';
?>
<div class="c-library__item c-media c-media--id-<?php echo $post->ID; ?>">
	<div class="c-media__inner-wrap <?php if(current_user_can('administrator')) echo 'c-media__inner-wrap--extra-space'; ?>">
		<div class="c-media__section-top">
			<?php if($media_album_terms): ?>
				<h2 class="c-media__main-title" data-link="<?php echo $library_permalink; ?>">
					<?php if(isset($media_album_terms[0])): ?>
						<?php 
							$album_href = "/library/album/".$media_album_terms[0]->slug;
							if($media_exclude == 'yes'){
								$album_href = 'javascript:void();';	
							}
						?>
						<a class="c-media__meta-content-link" 
							data-library-query-var="album" 
							data-library-query-var-value="<?php echo $media_album_terms[0]->slug; ?>" 
							data-library-query-var-title="<?php echo $media_album_terms[0]->name; ?>" 
							href="<?php echo $album_href; ?>">
							<?php 
								if( $media_temp_title ) {
									echo $media_temp_title;
								}else{
									echo $media_album; 
									if($media_format == 'talks'):
										if( $track_number ) echo ' (Part '.$track_number.')';
									endif;
								}
							?>
						</a>
					<?php endif; ?>
				</h2>
			<?php endif; ?>

			<?php if(get_post_meta($post->ID, '_ilm_mc_field_title_new', true)): ?>
				<h3 class="c-media__main-sub-title" data-link="<?php echo $library_permalink; ?>">
					<?php echo get_post_meta($post->ID, '_ilm_mc_field_title_new', true); ?>
				</h3>
			<?php else: ?>
				<h3 class="c-media__main-sub-title" data-link="<?php echo $library_permalink; ?>"><?php the_title(); ?></h3>
			<?php endif; ?>

			<!-- For admin only -->
			<?php 
				// $current_user = wp_get_current_user();
				// if($current_user->user_email == 's.hoque1985@gmail.com'){
				//     echo '<div><strong>ID: '.$post->ID.'</strong></div>';
				//     echo '<div><strong>Edit: <a target="_blank" href="/wp-admin/post.php?post='.$post->ID.'&action=edit">Click here</a></strong></div>';
				// }
			?>

			<?php if( $media_format != 'cds' && !has_post_thumbnail($media_product_id)) : ?>
				<div class="c-media__artists-photo-wrap">
					<?php 
						if($ministers_terms):
							foreach($ministers_terms as $minister):
								if($minister->slug == 'jim-gordon' || $minister->slug == 'jim'){
									?>
										<div class="c-media__artist-photo-item">
											<img class="c-media__artist-photo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ministers/jim-gordon.jpg" alt="Jim Gordon" />
										</div>
									<?php
								}elseif($minister->slug == 'brian-yeakey' || $minister->slug == 'brian'){
									?>
										<div class="c-media__artist-photo-item">
											<img class="c-media__artist-photo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ministers/brian-yeakey.jpg" alt="Brian Yeakey" />
										</div>
									<?php
								}elseif($minister->slug == 'kelsie-mcsherry' || $minister->slug == 'kelsie'){
									?>
										<div class="c-media__artist-photo-item">
											<img class="c-media__artist-photo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ministers/kelsie-mcsherry.jpg" alt="Keslie McSherry" />
										</div>
									<?php
								}elseif($minister->slug == 'steven-mcafee' || $minister->slug == 'steven'){
									?>
										<div class="c-media__artist-photo-item">
											<img class="c-media__artist-photo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ministers/steven-mcafee.jpg" alt="Keslie McSherry" />
										</div>
									<?php
								}
							endforeach;
						endif; 
					?>
				</div>
			<?php endif; ?>
		</div>
		
		<div class="c-media__section-middle">
			<div class="c-media__content-wrap">
				<div class="c-media__meta-wrap">
					<?php if($media_format_terms): ?>
						<div class="c-media__meta c-media__meta--media-type u-clearfix">
							<span class="c-media__meta-label">Category:</span> 
							<span class="c-media__meta-content">
								<?php echo tax_array_to_link_list($media_format_terms, 'category'); ?>
							</span>
						</div>
					<?php endif; ?>

					<?php if($media_location_terms): ?>
						<div class="c-media__meta c-media__meta--media-type u-clearfix">
							<span class="c-media__meta-label">Location:</span> 
							<span class="c-media__meta-content">
								<?php echo tax_array_to_link_list($media_location_terms, 'location'); ?>
							</span>
						</div>
					<?php endif; ?>

					<?php if($ministers_terms): ?>
						<div class="c-media__meta c-media__meta--media-type u-clearfix">
							<span class="c-media__meta-label">Minister:</span> 
							<span class="c-media__meta-content">
								<?php echo tax_array_to_link_list($ministers_terms, 'minister'); ?>
							</span>
						</div>
					<?php endif; ?>

					<?php if($media_date_str): ?>
						<div class="c-media__meta c-media__meta--media-type u-clearfix">
							<span class="c-media__meta-label">Date:</span> 
							<span class="c-media__meta-content">
								<a 
									class="c-media__meta-content-link" 
									data-library-query-var="date" 
									data-library-query-var-value="<?php echo $media_date_str; ?>" 
									href="<?php echo ilm_get_library_url('date', $media_date_str); ?>">
									<?php echo $media_date_str; ?>    
								</a>
							</span>
						</div>
					<?php elseif($media_year): ?>
						<div class="c-media__meta c-media__meta--media-type u-clearfix">
							<span class="c-media__meta-label">Year:</span> 
							<span class="c-media__meta-content">
								<a 
									class="c-media__meta-content-link" 
									data-library-query-var="year" 
									data-library-query-var-value="<?php echo $media_year; ?>" 
									href="<?php echo ilm_get_library_url('year', $media_year); ?>">
									<?php echo $media_year; ?>    
								</a>
							</span>
						</div>
					<?php endif; ?>

					<?php if($media_subject_terms): ?>
						<div class="c-media__meta c-media__meta--media-type u-clearfix">
							<span class="c-media__meta-label">Subject:</span> 
							<span class="c-media__meta-content">
								<?php echo tax_array_to_link_list($media_subject_terms, 'subject'); ?>
							</span>
						</div>
					<?php endif; ?>

					<?php if($media_event_terms): ?>
						<div class="c-media__meta c-media__meta--media-type u-clearfix">
							<span class="c-media__meta-label">Event:</span> 
							<span class="c-media__meta-content">
								<?php echo tax_array_to_link_list($media_event_terms, 'event'); ?>
							</span>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php if($media_format == 'videos'): ?>
			<?php 
				if($media_url){  
					$has_video_player = true;
				}
			?>
		<?php elseif($media_format == 'images' || get_post_meta($post->ID, '_ilm_mc_field_title_new', true) == 'I Take You Into My Heart LAF Process Chart' ): ?>
			<div class="c-media__thumb-wrap">
				<img class="c-media__thumb" src="<?php echo $media_url; ?>" alt="" />
			</div>
		<?php elseif($media_format == 'newsletters' || $media_format == 'books' || $media_format == 'worksheets' || $media_format == 'workbooks' || $media_format == 'q-a' || $media_format == 'articles' || !empty($media_issuu_id) ): ?>
			<?php if( $media_issuu_id ): ?>
				<iframe allowfullscreen allow="fullscreen" style="border:none;width:100%;height:326px;" src="//e.issuu.com/embed.html?backgroundColor=%23ffffff&d=<?php echo $media_issuu_id; ?>&hideIssuuLogo=true&hideShareButton=true&u=ilmorg-newsletters"></iframe>    
			<?php elseif( get_post_meta($post->ID, '_ilm_mc_field_title_new', true) == 'I Take You Into My Heart LAF Process Chart' ): ?>
				<img class="c-media__thumb" src="<?php echo $media_url; ?>" alt="" />
			<?php endif; ?>
		<?php elseif($media_format == 'cds'): ?>
			<?php if(has_post_thumbnail($post->ID)): ?>
				<div class="c-media__thumb-wrap">
					<?php echo get_the_post_thumbnail($post->ID); ?>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<?php 
				if($media_url){ 
					$has_audio_player = true; 
				}
			?>
		<?php endif; ?>

		<div class="c-media__bottom-section">
			<div class="c-media__buttons <?php if(current_user_can('administrator')) echo 'c-media__buttons--download-play' ?>">
				<?php if($downloadable_url): ?>
					<?php
						$downloadable_url_full = '#';
						$restriction_class = 'js-restrict-user-on-library-btn';

						if(!ilm_is_library_restricted('download')){
							$downloadable_url_full = get_bloginfo('url').'/wp-content/remote-download.class.php?downloadable-file='.base64_encode($downloadable_url);
							$downloadable_url_full = $downloadable_url;
							$restriction_class = '';
						}
					?>
					
					<?php if($has_audio_player): ?>
						<a 
							href="#" 
							class="c-media__button-large c-media__button-large--play js-media-play-button" 
							data-media-url="<?php echo $media_url; ?>" 
							data-media-id="<?php echo $post->ID; ?>">
							<span class="c-media__button-large-icon c-media__button-large-icon--play"></span>
							<span class="c-media__button-large-label">Play</span>
						</a>
					<?php elseif($has_video_player): ?>
						<a 
							href="#" 
							class="c-media__button-large c-media__button-large--play js-media-watch-button" 
							data-media-url="<?php echo $media_url; ?>" 
							data-media-id="<?php echo $post->ID; ?>">
							<span class="c-media__button-large-icon c-media__button-large-icon--watch"></span>
							<span class="c-media__button-large-label">Watch</span>
						</a>
					<?php endif; ?>
					
					<a 
						href="<?php echo $downloadable_url_full; ?>" 
						class="c-media__button-large c-media__button-large--download <?php echo $restriction_class; ?>" 
						download
						data-media-id="<?php echo $post->ID; ?>">
						<span class="c-media__button-large-icon c-media__button-large-icon--download"></span>
						<span class="c-media__button-large-label">Download</span>
					</a>
				<?php endif; ?>
			</div>
			<div class="c-media__buttons">
				<?php if(current_user_can('administrator')){ ?>
					<a target="_blank" href="<?php bloginfo('url'); ?>/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="c-media__button c-media__button--edit">Edit</a>
					<span class="c-media__button c-media__button--ID">ID: <?php echo $post->ID; ?></span>
				<?php } ?>
			</div>
		</div>
	</div>
</div><!-- End Library -->