<?php get_header(); ?>

	<!-- Header -->
	<section id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-2">


					<div class="blog-info">
						<span class="blog-title"><?php bloginfo( 'name' ); ?></span><span class="blog-description"><?php bloginfo( 'description' ); ?></span>
						<nav class="navigation">
							<?php $args = array('theme_location' => 'primary', 'container' => '', 'menu_class'=>'site-nav'); ?>
								<?php wp_nav_menu($args); ?>
						</nav>
					</div>
				</div>
				<div class="col-md-2">
					<center>
						<p>
							<a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php if ( get_theme_mod( 'seb_avatar' ) ) : ?>
									<img alt="Website Logo" src="<?php echo esc_url( get_theme_mod( 'seb_avatar' ) ); ?>" class="avy">
									<?php else : ?>
										<img alt="Website Logo" src="<?php bloginfo( 'template_url' ); ?>/images/default-avatar.png" class="avy">
										<?php endif; ?>
							</a>
						</p>
					</center>
				</div>
			</div>
		</div>
	</section>



	<!-- Post Area -->
	<section id="post-area">
		<div class="container">

			<!-- MAIN BLOG PAGES -->
			<?php if( is_home() || is_archive() ) {  ?>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<div class="post col-md-8 col-md-offset-2" id="post-<?php the_ID(); ?>">
							<h2 class="post-title">
									<a title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" href="<?php the_permalink(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
								</h2>
							<h5 class="post-meta">Posted on <?php the_time( get_option( 'date_format' ) ); ?></h5>
							<div class="post-content">
								<?php the_content('Read on...'); ?>
							</div>
							<h5 class="post-meta">
									<?php if ( count( get_the_category() ) ) : ?>
										<span class="cat-links">Categories: <?php echo get_the_category_list( ', ' ); ?></span>
									<?php endif; ?>
								</h5>
						</div>

						<?php endwhile; ?>

							<div class="pagination col-md-12 text-center">
								<?php wpex_pagination(); ?>
							</div>

							<?php else : ?>
								<article class="post error">
									<h1 class="404">Nothing posted yet</h1>
								</article>

								<?php endif; ?>
									<?php } //end is_home(); ?>

										<!-- SINGLE BLOG POST -->
										<?php if( is_single()) { ?>
											<?php if ( have_posts() ) : ?>
												<?php while ( have_posts() ) : the_post(); ?>

													<div class="post col-md-8 col-md-offset-2" id="post-<?php the_ID(); ?>">
														<h2 class="post-title">
									<a title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" href="<?php the_permalink(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
								</h2>
														<h5 class="post-meta">Posted on <?php the_time( get_option( 'date_format' ) ); ?></h5>
														<div class="post-content">
															<?php the_content(); ?>
														</div>
														<h5 class="post-meta">
									<?php if ( count( get_the_category() ) ) : ?>
										<span class="cat-links">Categories: <?php echo get_the_category_list( ', ' ); ?></span>
									<?php endif; ?>
								</h5>
													</div>
													<div class="post col-md-8 col-md-offset-2">
														<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template( '', true );
								?>
													</div>

													<?php endwhile; ?>


														<?php else : ?>

															<article class="post error">
																<h1 class="404">Nothing posted yet</h1>
															</article>

															<?php endif; ?>
																<?php } //end is_single(); ?>

																	<!-- SINGLE PAGE -->
																	<?php if( is_page()) { ?>
																		<?php if ( have_posts() ) : ?>
																			<?php while ( have_posts() ) : the_post(); ?>

																				<div class="post col-md-8 col-md-offset-2" id="post-<?php the_ID(); ?>">
																					<h2 class="post-title">
									<a title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" href="<?php the_permalink(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
								</h2>
																					<div class="post-content">
																						<?php the_content(); ?>
																					</div>
																				</div>
																				<?php endwhile; ?>

																					<?php else : ?>

																						<article class="post error">
																							<h1 class="404">Nothing posted yet</h1>
																						</article>

																						<?php endif; ?>

																							<?php } //end is_page(); ?>



		</div>
	</section>

	<?php get_footer(); ?>
