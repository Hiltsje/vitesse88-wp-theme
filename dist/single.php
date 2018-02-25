<?php get_header(); ?>
<div class="default-single">
	<div class="title-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-1 col-sm-12 col-xs-12">
					<a href="/"> <span>Nieuws</span></a>
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
							<?php the_title(); ?>
						</h1>
						<!-- /post title -->

						<!-- post details -->
						
						<span class="date">
							<hr>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-calander.svg">	
								plaatsdatum: <?php the_date(); ?>
							</time>
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
