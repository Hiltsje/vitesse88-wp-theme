<?php get_header(); ?>
<div class="single-uitslagen">
	<div class="title-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-1 col-sm-12 col-xs-12">
					<a href="/uitslagen"> <span>Uitslagen</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-12 col-xs-12">
				<main role="main" aria-label="Content">
				<!-- section -->
				<section>

				<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail() ) : // Check if Thumbnail exists. ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail(); // Fullsize image for the single post. ?>
							</a>
						<?php endif; ?>
						<!-- /post thumbnail -->

						<!-- post title -->
						<h1>
						<?php   // Get terms for post
							$terms = get_the_terms( $post->ID , 'losplaatsen' );
							// Loop over each item since it's an array
							if ( $terms != null ){
								foreach( $terms as $term ) {
								// Print the name method from $term which is an OBJECT
								print $term->name ;
								// Get rid of the other data stored in the object, since it's not needed
								unset($term);
								} 
							} 
						?>
						</h1>
						<!-- /post title -->

						<!-- post details -->
						
						<span class="date">
							<hr>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-calander.svg">	
								<?php 
									// get raw date
									$date = get_field('losdatum', false, false);
									// make date object
									$date = new DateTime($date);
								?>
								losdatum: 
								<?php echo $date->format('d-m-Y'); ?>
							</time>
							<span class="uitslagen-vlucht-type-tag">
							<?php   // Get terms for post
								$terms = get_the_terms( $post->ID , 'vlucht_typen' );
								// Loop over each item since it's an array
								if ( $terms != null ){
									foreach( $terms as $term ) {
									// Print the name method from $term which is an OBJECT
									echo $term->name ;
									// Get rid of the other data stored in the object, since it's not needed
									unset($term);
									} 
								} 
							?>
							</span>
							<hr>
						</span>
						
						<!-- /post details -->

						<?php the_content(); // Dynamic Content. ?>

						<?php edit_post_link(); // Always handy to have Edit Post Links available. ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else : ?>

					<!-- article -->
					<article>

						<h1><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

					</article>
					<!-- /article -->

				<?php endif; ?>

				</section>
				<!-- /section -->
				</main>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
