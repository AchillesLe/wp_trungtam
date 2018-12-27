<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="entry-title">
        <?php the_title() ?>
    </div>
    <div class="entry-publish">
        <div class="date-publish">
            <i class="fas fa-calendar-alt"></i> &nbsp;  <?php echo get_the_time('Y-m-d h:i:s' ); ?>
        </div>
    </div>
    <div class="entry-img">
        <?php echo get_the_post_thumbnail( );?>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>

</article>