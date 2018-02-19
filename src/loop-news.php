<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- post title -->
	
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<h2><?php the_title(); ?></h2>
			<!-- post details -->
	<span class="date">
		<time datetime="<?php the_time( 'Y-m-d' ); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/icon-calander.svg">	
			<?php echo get_the_date( get_option('date_format') ); ?>
		</time>
	</span>
	<!-- /post details -->
	</a>
	<!-- /post title -->


	
	<!-- <?php edit_post_link(); ?> -->

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
