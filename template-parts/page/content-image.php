<?php
/**
 * Template part for displaying page content in index.php & archive.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- The thumbnail -->
	<?php the_post_thumbnail('medium'); ?>

	<!-- Post header -->
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title" id="entry-title">', '</h2>' ); ?>
	</header>

	<!-- Post excerpt -->
    <?php

    $image_meta = wp_get_attachment_metadata( get_the_ID());

    $class = $image_meta['width'] / $image_meta['height'] > 1 ? 'wide' : 'tall';
?>
    
    <div class="entry-content">
        <div class="attachment-block orientation-<?php echo $class; ?>" id="image-frame">

<?php
            if ( wp_is_mobile() ) {
                $image = wp_get_attachment_image(get_the_ID(), array('800', ''), "", array("class" => "img-responsive afbeelding-section $class", "rel" => "lightbox"));
            } else {
                $image = wp_get_attachment_image(get_the_ID(), array('1400', ''), "", array("class" => "img-responsive afbeelding-section $class", "rel" => "lightbox"));
            }
            echo wp_get_attachment_link( get_the_ID(), '' , false, false, $image );


            ?>
            <div id="attachment-rating">
            </div>
            <div class="attachment-controls">
                <div class="attachment-previous"><?php kontjeGetPrevNext($post, 'next'); ?></div>
                <div class="attachment-star-5">&#9734;</div>
                <div class="attachment-star-4">&#9734;</div>
                <div class="attachment-star-3">&#9734;</div>
                <div class="attachment-star-2">&#9734;</div>
                <div class="attachment-star-1">&#9734;</div>
                <div class="attachment-next"><?php kontjeGetPrevNext($post, 'previous'); ?></div>
            </div>
        </div>
        <?php
        $rating = get_post_meta(get_the_ID(), 'kontjes');
        echo '<table class="rating"><thead><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr></thead>';
        echo '<tbody><tr>';
        foreach ($rating[0] as $rate => $val) {
            echo "<td id='rate-{$rate}'>{$val}</td>";
        }
        echo '<tr></tbody></table>';
        ?>

	</div>
    <aside>

    </aside>
	
</article>
