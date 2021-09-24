<?php

/**
 * Options generator
 *
 * @param object $this
 */

$sub_page = esc_attr( $this->get_param_val( 'sub_page' ) );

?>
<!-- .tutor-backend-wrap -->
<section class="tutor-backend-settings-page">
	<header class="tutor-option-header px-3 py-2">
		<div class="title"><?php _e( 'Tools', 'tutor' ); ?></div>
		<div class="search-field">
			<div class="tutor-input-group tutor-form-control-has-icon">
				<span class="tutor-input-group-icon tutor-v2-icon-test icon-search-filled"></span>
				<input type="search" autocomplete="off" class="tutor-form-control" placeholder="<?php _e( 'Search', 'tutor' ); ?>" />
			</div>
		</div>
	</header>
	<div class="tutor-option-body">
		<form class="tutor-option-form py-4 px-3">
			<div class="tutor-option-tabs">
				<?php
				foreach ( $this->options_tools as $args ) :
					?>
				 <ul class="tutor-option-nav">
						<li class="tutor-option-nav-item">
							<h4><?php echo $args['label']; ?></h4>
						<li>
							<?php
							$no_page     = false;
							$first_item  = array_key_first( $args['sections'] );
							$target_page = ! empty( $sub_page ) ? $sub_page : $first_item;
							$item_exist  = in_array( $sub_page, array_keys( $args['sections'] ) );
							foreach ( $args['sections'] as $key => $section ) :
								$icon      = $section['icon'];
								$is_active = $target_page === $section['slug'] ? 'active' : null;
								$page_url  = 'tutor-setup' === $section['slug']
												? add_query_arg( 'page', $section['slug'], admin_url( 'admin.php' ) )
												: add_query_arg( 'sub_page', $section['slug'], admin_url( 'admin.php?page=tutor-tools-v2' ) );
								?>
								<li class="tutor-option-nav-item">
									<a href="<?php echo $page_url; ?>" class="<?php echo $is_active; ?>">
										<span class="nav-icon tutor-v2-icon-test <?php echo $icon; ?>"></span>
										<span class="nav-label"><?php echo $section['label']; ?></span>
									</a>
								</li>
								<?php
							endforeach;
							?>
					</ul>
					<?php
				endforeach;
				?>
				<!-- end /.tutor-option-nav -->
			</div>
			<!-- end /.tutor-option-tabs -->
			<div class="tutor-option-tab-pages">
				<?php
				if ( $target_page === $first_item || true === $item_exist ) {
					echo $this->template( $this->options_tools['tools']['sections'][ $target_page ] );
				} else {
					echo '<div class="tutor-option-main-title">
                            <h2>Error!</h2>
                        </div>
                        <div class="tutor-option-single-item">
                            <h4>The subpage you are looking for is invalid</h4>
                        </div>';
				}
				?>
			</div>
			<!-- end /.tutor-option-tab-pages -->
		</form>
	</div>
</section>