
<?php get_header(); ?>
	<div class="uitslagen-archive-page">
		<div class="title-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-12 col-xs-12">
						<h1>Uitslagen</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="form-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-12 col-xs-12">
						<?php $filter_year = $_POST['year']; ?>
						<?php 
							if (!isset($filter_year)) {
								$filter_year = date("Y");
							} 
						?>
						<form action="/uitslagen" method="post">
							<select name="year" onchange="this.form.submit()">
								<option <?php if ($filter_year == '2016' ) echo 'selected' ; ?> value="2016">2016</option>
								<option <?php if ($filter_year == '2017' ) echo 'selected' ; ?> value="2017">2017</option>
								<option  <?php if ($filter_year == '2018' ) echo 'selected' ; ?> value="2018">2018</option>
							</select>
						</form>
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
								// get all the categories from the database
								$cats = get_terms( 'vlucht_typen' );
							
								// loop through the categories
								foreach ($cats as $cat) {
									// setup the category ID
									$cat_id = $cat->term_id;
									// Make a header for the category
									echo "<h3 class='uitslag-vlucht-type'>".$cat->name."</h3>";
									
									// create a custom wordpress query
									
									query_posts(array( 
										'post_type' => 'uitslagen',
										'showposts' => -1,
				
						
										'tax_query' => array(
											array(
												'taxonomy' => 'vlucht_typen',
												'terms' => $cat_id,
												'field' => 'term_id',
											)
										),
										'orderby' => 'meta_value',
										'order' => 'ASC',
										'meta_query' => array(
											array(
											'key'      => 'losdatum',
											'compare'  => 'REGEXP',
											'value'    => '^' . $filter_year,
											),    
										)
										)
									);
								 get_template_part( 'loop-uitslagen' ); 
								 } // done the foreach statement 
							?>

							<?php get_template_part( 'pagination' ); ?>
						</section>
						<!-- /section -->
					</main>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>




