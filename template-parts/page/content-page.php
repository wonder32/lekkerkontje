<?php
/**
 * Template part for displaying page content in index.php & archive.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- The thumbnail -->
	<?php the_post_thumbnail('medium'); ?>

	<!-- Post header -->
	<header class="entry-header l-container">
            <div class="l-col-6" id="image-preview">&nbsp;
            </div>
        <aside class="entry-meta l-col-6">
	            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	            <?php
	            if ( function_exists('yoast_breadcrumb') && !is_front_page()) {
		            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	            }
	            ?></aside>
	</header>

	<!-- Post excerpt -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	
</article>
