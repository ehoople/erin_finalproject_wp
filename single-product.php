<?php
/**
 * The Template for displaying all product posts.
 *
 * @package waynesfeed
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		 <div id="product-main">
            
            <!-- Product Section -->
            <div class="product-section">

                <!-- Featured Product Image -->
                <?php if( get_field('featured_image') ): ?>
 
                    <img class="featured-image" src="<?php the_field('featured_image'); ?>" />
 
                <?php endif; ?>
                
                <!-- Product Title -->
                <h1 class="product-title"><?php the_field('product_title'); ?></h1>

                <!-- Product Description -->
                <p class="product-description"><?php the_field('product_description'); ?></p>

                <!-- Specific Product Description / Specs -->
                <p class="product-details-intro"><?php the_field('product_details_intro'); ?></p>

                <ul class="product-details">
                    <?php
                        // check if the repeater field has rows of data
                        if( have_rows('product_details') ):
                 
                        // loop through the rows of data
                        while ( have_rows('product_details') ) : the_row();

                        // display a sub field value ?>

                            <li><?php the_sub_field('list_item'); ?></li>
                    
                    <?php
         
                        endwhile;
         
                        else :
         
                        // no rows found
         
                        endif;
                    ?>
                </ul>

                <!-- Call Out Box -->
                <p class="call-out-box"><?php the_field('call_out_box'); ?></p>
            </div>
        </div>

	</main> <!-- #main -->
</div> <!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>



