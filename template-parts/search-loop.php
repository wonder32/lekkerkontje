<?php
/**
 * Template part for displaying page content in index.php & archive.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="float: left;
    display: inline-block;
    margin-right: 3.57869%;
    width: 46.21066%;">

	<!-- The thumbnail -->
	<?php the_post_thumbnail('medium'); ?>
    <!-- Post excerpt -->

	<!-- Post header -->
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        <aside class="entry-meta">
            <?php _e('Posted', 'monsieurpress'); ?> <?php the_date(); ?> <?php _e('by', 'monsieurpress'); ?> <?php the_author(); ?>
        </aside>
	</header>
    <div class="entry-content">
        <div class="l-col-6" id="image-preview">
        <?php $url = get_the_permalink(get_the_ID()); ?>
        <a href="<?php echo $url; ?>" title="<?php the_title(); ?>">
		<?php echo wp_get_attachment_image( get_the_ID(), 'grid', false, array('class' => 'lekker-search') ); ?>
        </a>
        </div>
        <div class="l-col-6" id="image-preview">
            <uL>
                <?php $lekkerKontje = new Lka\Includes\Image(); ?>
                <li><?= $lekkerKontje->getOrientation(); ?></li>
                <li><?= $lekkerKontje->getGroup(); ?></li>
                <li><?= $lekkerKontje->getTag(); ?></li>
                <li><?= $lekkerKontje->getEmail(); ?></li>
            </uL>
        </div>
    </div>
	<div class="clear"></div>
</article>
