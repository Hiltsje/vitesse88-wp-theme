<?php /* Template Name: News Template */ get_header(); ?>
	<div class="news-page">
		<div class="title-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-12 col-xs-12">
						<h1><?php the_title(); ?></h1>
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

							<?php 
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							$args = array(
							'order'    => 'DESC',
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => 10,
  							'paged'          => $paged
						);
						query_posts( $args ); ?>

							<?php get_template_part( 'loop-news' ); ?>
							
							<?php get_template_part( 'pagination' ); ?>
						</section>
						<!-- /section -->
					</main>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
