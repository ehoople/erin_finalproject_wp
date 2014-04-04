<?php
/**
 * The Template for displaying all product posts.
 *
 * @package waynesfeed
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main>
		 <div id="product-main">
            <nav class="product-submenu">
            	<ul>
                    <a href="#"><li id="current">Fresh &amp; Saltwater Fish</li></a>
                    <a href="#"><li>Aquariums</li></a>
                    <a href="#"><li>Aquarium Cleaning Supplies</li></a>
                    <a href="#"><li>Water Purifiers</li></a>
                    <a href="#"><li>Environmental Accents</li></a>
                </ul>
            </nav>

            <div class="product-section clearfix">
                <img class="featured-image wpframe" src="images/fish.jpg" alt="tropical fish"/>
                <h1 id="product-title">Tropical Fish</h1>
                <div class="product-description">
                    <p>We offer a great selection of fresh and saltwater fish. With new fish arriving every week, there’s sure to be something fun and new to add to your aquarium.</p>
                    <p>We currently have the following fish in stock:</p>
                    <ul class="product-details">
                        <li>Gray bichir</li>
                        <li>Ornate bichir</li>
                        <li>Emerald catfish</li>
                        <li>Pygmy corydoras</li>
                        <li>Blackphantom tetra</li>
                        <li>Bloodfin tetra</li>
                        <li>Glowlight tetra</li>
                        <li>Marbled headstander</li>
                        <li>Silver dollar</li>
                        <li>Red zebra cichlid</li>
                    </ul>
                </div>
                <div class="call-out-box">
                    <p>Our staff has over 50 combined years of experience breeding and caring for fresh and saltwater tropical fish. Stop by today to explore our unmatched selection of fish and aquarium supplies!</p>
                </div>
            </div>
            </div>


		<div id="product-content">
			<div class="product-text">
				<h1 class="product-name"><?php the_field('cabin_name'); ?></h1>
				<div class="product-description"><?php the_field('cabin_description'); ?></div>
				<div class="art-features">
					<h2>Art Making Features:</h2>
					<?php the_field('art_features'); ?>
				</div>
				<div class="cabin-features">
					<h2>Standard Cabin Features Include:</h2>
						<?php the_field('cabin_features'); ?>
				</div>
				<div class="cost-details">
					<h2><?php the_field('cost_title'); ?></h2>
					<div><?php the_field('cost'); ?></div>
					<a class="button" href="#"><?php the_field('availability_button'); ?></a>
		 		</div>
			</div>

			

		</div> <!-- #product-content -->

	</main> <!-- #main -->
</div> <!-- #primary -->

<?php get_footer(); ?>



