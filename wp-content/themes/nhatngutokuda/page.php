<?php get_header(); ?>
<main class="container">
    <div class="row">
        
            <?php if ( have_posts() ) : while ( have_posts() ) :the_post(); the_content(); endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
      
    </div>
</main>
<?php get_footer(); ?>