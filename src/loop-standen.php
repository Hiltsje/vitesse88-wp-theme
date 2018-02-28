<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- post title -->
	
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<h2>
			Generaal
		</h2>
			<!-- post details -->
	<span class="date">
		<time datetime="<?php the_time( 'Y-m-d' ); ?>">
			<?php 
				// get raw date
				$date = get_field('stand_datum', false, false);
				// make date object
				$date = new DateTime($date);
			?>
			stand datum: 
			<?php echo $date->format('d-m-Y'); ?>
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
		<p class="uitslagen-empty"><?php esc_html_e( 'Er is nog geen algemene stand beschikbaar', 'html5blank' ); ?></p>
	</article>
	<!-- /article -->

<?php endif; ?>
