<?php
/**
 * Template Name: Home Page
 *
 *
 * @package waynesfeed
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<!-- Call Out Box -->
	        <p class="about-section box"><?php the_field('call_out_box'); ?></p>
	       
	        <!-- Store Overview Section -->
	        <div class="store-overview">
	       
	        	<!-- Page Title -->
	        	<h1 class="section-title"><?php the_field('section_title'); ?></h1>

	        	<!-- Department Section -->
					<?php 

					// check if the repeater field has rows of data
					if( have_rows('department') ):

						// loop through the rows of data
						$count = 1;
							while ( have_rows('department') ) : the_row();

								// display a sub field value
								$image = get_sub_field('department_image');
								$title = get_sub_field('department_title');
								$description = get_sub_field('department_description');
							?>
							<div class="department<?php echo $count; ?>">
								<img class="department-image wpframe" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<h1 class="department-title"><?php echo $title; ?></h1>
								<p class="department-description"><?php echo $description; ?></p>

			                    <?php if( get_sub_field('product_stock') ): ?>
			                    	<ul class="product-stock">
			                    		<?php while( has_sub_field('product_stock') ): ?>
			                    			<li>
			                    				<?php
			                    					$item = get_sub_field('list_item');

			                    					echo $item; 
			                    				?>
			                    			</li>
			                    
			                    <?php endwhile; ?>
			                </ul>
			            <?php endif; ?>






							</div> <!-- .department -->

						<?php $count++; ?>
						<?php endwhile; ?>
					<?php else :
						echo "No content in our repeater!";

					endif;
					?>
	        </div><!-- .store-overview -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
