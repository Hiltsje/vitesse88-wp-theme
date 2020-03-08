
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
								$filter_year = strval(date("Y"));
							}
						?>
						<form id="uitslagen-form" action="/uitslagen" method="post" >
							<select name="year" onchange="this.form.submit()" autofocus>
<!--								<option disabled selected >Selecteer jaar</option>-->
								<option <?php if ($filter_year == '2020' ) echo 'selected' ; ?> value="2020">2020</option>
								<option <?php if ($filter_year == '2019' ) echo 'selected' ; ?> value="2019">2019</option>
								<option <?php if ($filter_year == '2018' ) echo 'selected' ; ?> value="2018">2018</option>
								<option <?php if ($filter_year == '2017' ) echo 'selected' ; ?> value="2017">2017</option>
								<option <?php if ($filter_year == '2016' ) echo 'selected' ; ?> value="2016">2016</option>
								<option <?php if ($filter_year == '2015' ) echo 'selected' ; ?> value="2015">2015</option>
								<option <?php if ($filter_year == '2014' ) echo 'selected' ; ?> value="2014">2014</option>
								<option <?php if ($filter_year == '2013' ) echo 'selected' ; ?> value="2013">2013</option>
							</select>
						</form>
					</div>
				</div>
			</div>
		</div>

				
		<main role="main" aria-label="Content">
			<!-- section -->
			<section>
			<div class="container">
				<div class="row">
					<div class='col uitslag-vlucht-type-container'>
						<h3 class='uitslag-vlucht-type'>Generale stand</h3>
						<?php 
							// get standen per vlucht type		
							query_posts(array( 
								'post_type' => 'standen',
								'showposts' => -1,
								'meta_query' => array(
									'relation'		=> 'AND',
									array(
										'key' => 'generale_stand',
										'value' => '1',
										'compare' => '==' // not really needed, this is the default
									),
									array(
										'key'      => 'stand_datum',
										'compare'  => 'REGEXP',
										'value'    => '^' . $filter_year,
									)
								)
								)
							);
							get_template_part( 'loop-standen' ); 
							// done the foreach statement 

							wp_reset_query();
						?>
					</div>
				</div>
			<div class="row">
				<?php
					// get all the categories from the database
					$cats = get_terms( 'vlucht_typen' );
				
					// loop through the categories
					foreach ($cats as $cat) {
						// setup the category ID
						$cat_id = $cat->term_id;
						// Make a header for the category

						echo "
						<div class='col-xs-12 col-md-6 col-xl-4  uitslag-vlucht-type-container'>
						<h3 class='uitslag-vlucht-type'>".$cat->name."</h3>";
						
						// get standen per vlucht type
						
						query_posts(array( 
							'post_type' => 'standen',
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
								'key'      => 'stand_datum',
								'compare'  => 'REGEXP',
								'value'    => '^' . $filter_year,
								),    
							)
							)
						);
						get_template_part( 'loop-standen' ); 
						 // done the foreach statement 

						wp_reset_query();


						// get uitslagen per vlucht type
						
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
						echo "</div>";
						} // done the foreach statement 
				?>

				</div>
			</div>
				
			</section>
			<!-- /section -->
		</main>
	</div>
<?php get_footer(); ?>




