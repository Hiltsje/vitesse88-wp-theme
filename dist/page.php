<?php get_header(); ?>
	<div class="default-page">
		<div class="title-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-12 col-xs-12">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<!-- post thumbnail -->
		<!-- <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(); // Fullsize image for the single post ?>
			</a>
		<?php endif; ?> -->
		<!-- /post thumbnail -->
		<div class="container">
			<div class="row">
				<div class="col-sm-offset-1 col-sm-12 col-xs-12">
					<main role="main" aria-label="Content">
						<!-- section -->
						<section>

							

						<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

							<!-- article -->
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="wysiwyg-content">
									<?php the_content(); ?>
								</div>

								<br class="clear">

								<?php edit_post_link(); ?>

							</article>
							<!-- /article -->

						<?php endwhile; ?>

						<?php else : ?>

							<!-- article -->
							<article>

								<h2><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

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

