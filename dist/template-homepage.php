<?php /* Template Name: Homepage Template */ get_header(); ?>

	<?php get_header(); ?>
	<div class="home-page">
		<div class="header-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-12 col-xs-12">
						
					</div>
				</div>
			</div>
		</div>
		<main role="main" aria-label="Content">

		<!-- section -->
		<section>
			<div class="uitslagen-block">
				<div class="container">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-12 col-xs-12">
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
				</div>
			</div>
		</section>
		<!-- /section -->

		<!-- section -->
		<section>
			<div class="agenda-block">
				<div class="container">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-12 col-xs-12">
						<h2>Vluchtagenda</h2>
							<p>Kijk in de vluchtagenda voor inkorf data, locaties en vluchtcodes.</p>
							<a class="link" href="/vluchtagenda">naar vluchtagenda</a>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /section -->

		<!-- section -->
		<section>
			<div class="news-block">
				<div class="container">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-12 col-xs-12">
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
				</div>
			</div>
		</section>
		<!-- /section -->
		
		<!-- section -->
		<section>
			<div class="duivenhouden-block">
				<div class="block-header-wrapper"></div>
				<div class="container">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-12 col-xs-12">
							<h2>Postduiven houden</h2>
							<p>Heb je interesse hebt in postduiven of de duivensport en wil je meer weten? We vertellen er graag meer over!</p>
							<a href="/de-duivensport/" class="button primary">meer leren over de duivensport</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /section -->
					
		</main>
	</div>

<?php get_footer(); ?>
