<?php get_header(); ?>
    <?php get_sidebar( 'slide' ); ?>
    <div class="container">
        <div class="row">
            <main class="site-main col-md-8">
                <?php   while( have_posts() )  : the_post(); get_template_part( 'template-parts/content-post' , get_post_format()  ); ?>
                   
                <?php endwhile;?>
            </main>
              <!-- sidebar -->
            <div class="col-md-4">
                <?php get_sidebar( 'right' ); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>