<?php
/**
 * Template part for displaying page content in index.php & archive.php
 */

global $lekkerKontje;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header l-container">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('
        <p id="breadcrumbs">','</p>
        ');
        }
        ?>
    </header>



	<!-- The thumbnail -->
	<?php the_post_thumbnail('medium'); ?>

	<!-- Post excerpt -->
    <?php

    $image_meta = wp_get_attachment_metadata( get_the_ID());

    $class = $image_meta['width'] / $image_meta['height'] > 1 ? 'wide' : 'tall';

    
    if ( wp_is_mobile() ) {
        $image = 'grid';
    } else {
        $image = 'single';
    }
    $img_src = wp_get_attachment_image_src( get_the_ID(), $image, false );
    $style = 'background-image: url("' . $img_src[0] . '");background-repeat: no-repeat;background-size:cover;background-position: center bottom;';


//    $entry = GFAPI::get_entry( 71 );

    ?>
    
    <div class="entry-content l-container">

        <div class="image-content l-col-6">
            <div class="attachment-block orientation-<?php echo $class; ?>" style='<?php echo $style; ?>' id="image-frame">
                <div id="attachment-rating">
                </div>
                <div class="attachment-controls">
                    <div class="attachment-previous"><a href="<?php echo $lekkerKontje->getNext(); ?>"><span class="dashicons dashicons-arrow-right-alt"></span></a></div>
                    <div class="attachment-star-5">&#9734;</div>
                    <div class="attachment-star-4">&#9734;</div>
                    <div class="attachment-star-3">&#9734;</div>
                    <div class="attachment-star-2">&#9734;</div>
                    <div class="attachment-star-1">&#9734;</div>
                    <div class="attachment-next"><a href="<?php echo $lekkerKontje->getPrevious(); ?>"><span class="dashicons dashicons-arrow-left-alt"></span></a></div>
                </div>
            </div>
        </div>
        <div class="image-decription l-col-6">


	        <?php the_title( '<h2 class="entry-title" id="entry-title">', '</h2>' ); ?>

            <?php
            $rating = $lekkerKontje->getRating();
            echo '<table class="rating">';
            echo '<tbody>';

            if (isset($rating)) {
	            foreach ( $rating as $rate => $val ) {
		            echo "<tr><th>";
		            for ($y = 1; $y <= $rate; $y++) {
			            echo '&#9734;';
		            }
		            echo "</th><td id='rate-{$rate}'>{$val}</td></tr>";
	            }
            } else {
	            for ($x = 1; $x < 6; $x++) {
		            echo "<tr><th>";
		            for ($z = 1; $z <= $x; $z++) {
			            echo '&#9734;';
		            }
		            echo "</th><td id='rate-{$x}'>0</td>";
	            }
            }
            echo '</tbody></table>';
            ?>
            <div class=" l-col-6">
	            <?php
	            $thumb_src = wp_get_attachment_image_src( get_the_ID(), 'thumbnail', false );
	            ?>
                <img src="<?= $thumb_src[0]; ?>">
            </div>
            <div class=" l-col-6">
                <ul class="image-info-block">
                    <li><?= $lekkerKontje->getOrientation(); ?></li>
                    <li><?= $lekkerKontje->getGroup(); ?></li>
                    <li><?= $lekkerKontje->getTag(); ?></li>
                    <li><?= $lekkerKontje->getEmail(); ?></li>
                </ul>
            </div>
	        <?= $lekkerKontje->getDescription(); ?>
        </div>

	</div>
    <aside>

    </aside>
	
</article>
