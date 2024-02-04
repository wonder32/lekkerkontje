<?php get_header(); ?>

        <?php
        while (have_posts()) : the_post(); ?>

	<!-- The thumbnail -->
	<?php the_post_thumbnail('medium'); ?>

	<!-- Post header -->
	<header class="entry-header l-container">
	            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header>

	<!-- Post excerpt -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div>


        <?php

        endwhile;
        ?>


<?php get_footer(); ?>
