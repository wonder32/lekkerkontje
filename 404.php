<?php get_header(); ?>

<div class="l-background l-pad-4">
    <div class="l-container">
        <div class="l-col-8 l-col-push-2">
            <p class="intro-text">
                <?php _e('Oups, this page doesn\'t exist...', 'monsieurpress'); ?>
            </p>
            <div class="text-center">
                <a class="btn" href="<?php echo home_url(); ?>"><?php _e('Home', 'monsieurpress'); ?></a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
