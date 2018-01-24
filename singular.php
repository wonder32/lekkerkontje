<?php get_header(); ?>

<div class="l-container">

    <main role="main" class="l-col-12">
        <?php
        while (have_posts()) : the_post();
            if (is_page('kontjes')) {
                get_template_part('template-parts/page/content', 'images');
            } else if (is_attachment()) {
                get_template_part('template-parts/page/content', 'image');
            } else {
                get_template_part('template-parts/page/content', 'page');
            }
            comments_template();
        endwhile;
        ?>
    </main>

    <!--
    <aside role="complementary" class="widgets l-col-4 l-pad-2" >
        <?php //get_sidebar(); ?>
    </aside>
    -->
</div>

<?php get_footer(); ?>
