<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- post title -->
	
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<h2>
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
		</h2>
			<!-- post details -->
	<span class="date">
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
		<p class="uitslagen-empty"><?php esc_html_e( 'Er zijn dit jaar geen uitslagen voor dit vluchttype', 'html5blank' ); ?></p>
	</article>
	<!-- /article -->

<?php endif; ?>
