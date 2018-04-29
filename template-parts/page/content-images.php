<?php
/**
 * Template part for displaying page content in index.php & archive.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- The thumbnail -->
	<?php //the_post_thumbnail('large'); ?>

	<!-- Post header -->
    <?php

    ?>

    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <aside class="entry-meta">
	        <?php
	        if ( function_exists('yoast_breadcrumb') ) {
		        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	        }
	        ?></aside>
	</header>

	<!-- Post excerpt -->
	<div class="entry-content">
		<?php lekker_kontje_afbeeldingen(); ?>
	</div>
    <div class="clear"></div>
	
</article>
