<?php
/**
 * Template Name: Product
 *
 *
 * @package waynesfeed
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<!-- Product Section -->
			<div class="product-section">
				<!-- Featured Product Image -->
	            <img class="featured-image" src="images/tropical-fish.jpg" alt="tropical fish"/>

	            <!-- Product Title -->
	            <h1 class="product-title"><?php the_field('product_title'); ?></h1>
				<!-- Product Description -->
	            <p class="product-description"><?php the_field('product_description'); ?></p>


				<!-- Specific Product Description / Specs -->
	            <p class="product-details-intro"><?php the_field('product_details_intro'); ?></p>
	           
	            <?php
	            	// check if the repeater field has rows of data
					if( have_rows('product_details') ):
			 
			 		// loop through the rows of data
			    	while ( have_rows('product_details') ) : the_row();

			        // display a sub field value ?>

			        <ul class="product-details">
			        	<li><?php the_sub_field('list_item'); ?></li>
			     	
		     	<?php
		 
		    		endwhile;
		 
					else :
		 
		    		// no rows found
		 
					endif;
		 
				?>

	            <!-- Call Out Box -->
	            <p class="call-out-box"><?php the_field('call-out-box'); ?></p>
			</div>
	        
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
