<?php /* Template Name: Homepage Template */ get_header(); ?>

	<?php get_header(); ?>
	<div class="home-page">
		<div class="header-wrapper">
			<div class="container">
				<div class="row">
					<div class=" col-sm-12 col-xs-12">
						
					</div>
				</div>
			</div>
		</div>
		<main role="main" aria-label="Content">

		<!-- section -->
		<section>
			<div class="row no-gutters">
				<div class="order-1 col-sm-6 col-xs-12">
				<div class="homepage-block uitslagen-block">
					<h2>laatste uitslagen</h2>
					<?php 

						// get posts
						$posts = get_posts(array(
							'post_type'	=> 'uitslagen',
							'numberposts' => 4,
							'meta_key'	=> 'losdatum',
							'orderby'	=> 'meta_value_num',
							'order'		=> 'DESC'
						));
						
						// loop
						if( $posts ) {
							
							foreach( $posts as $post ) {
								
								setup_postdata( $post );?>
							<article>
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
										</article>
							<?php }
							wp_reset_query();
							wp_reset_postdata();
						
						}
						?>

					<a href="/uitslagen" class="button primary">alle uitslagen</a>

				</div>
			</div>
					

		<!-- /section -->

		<!-- section -->
	
			<div class="order-2 order-sm-3 col-sm-6 col-xs-12">
				<div class="homepage-block agenda-block">
					<h2>Vluchtagenda</h2>
					<p>Kijk in de vluchtagenda voor inkorf data, locaties en vluchtcodes.</p>
					<a class="link" href="/vluchtagenda">naar vluchtagenda</a>
				</div>
			</div>
			<div class="order-3 order-sm-4 col-sm-6 col-xs-12">
				<div class="homepage-block agenda-block">
					<h2>Documenten</h2>
					<p>Een overzicht van verenigings documenten zoals entlijsten en hoklijsten vind je op de documenten pagina.</p>
					<a class="link" href="/documenten">naar documenten</a>

				</div>
			</div>
			
		<!-- /section -->

		<!-- section -->
		

			<div class="order-4 order-sm-2 col-sm-6 col-xs-12">
				<div class="homepage-block news-block">
					<h2>Actueel</h2>
					<?php 
						$args = array(
						'order'    => 'DESC',
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 2
						);
						query_posts( $args ); 
							
						get_template_part( 'loop-news' );
					?>
					<a href="/actueel" class="button primary">meer nieuws</a>
				</div>
			</div>

		<!-- /section -->
		
		<!-- section -->
				
				<div class="order-5 order-sm-5 col-sm-12 col-xs-12">
					
						<div class="homepage-block duivenhouden-block">
							<div class="row no-gutter">	
								<div class="col-xs-12 col-sm-6">
									<div class="block-header-wrapper"></div>	
								</div>
								<div class="col-xs-12 col-sm-6">
									<h2>Postduiven houden</h2>
									<p>Heb je interesse hebt in postduiven of de duivensport en wil je meer weten? We vertellen er graag meer over!</p>
									<a href="/de-duivensport/" class="button primary">meer leren over de duivensport</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
	</section>
		<!-- /section -->
					
</main>

<?php get_footer(); ?>
