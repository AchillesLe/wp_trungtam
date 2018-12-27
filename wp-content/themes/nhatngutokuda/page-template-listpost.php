<?php
/**
 * Template Name: list post of page blog
 *
 * @package WordPress
 * @subpackage NN_Tokuda
 * @since NN_Tokuda 1.0
 */?>
<?php get_header(); ?>
<div class="container">
        <div class="row">
            <div class="col-md-8 content-listpost">
            <?php   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; $args = array( 'posts_per_page' => 5 , 'post_type'=>'post', 'post_status'=>'publish' , 'paged'=>$paged ); $postslist = new WP_Query( $args ); ?>
            <?php if( $postslist->have_posts() ) : ?>

                <div class="row">
                    
                   <?php while( $postslist->have_posts() ) :$postslist->the_post(); ?>
                           
                            <div class="item col-md-6">
                                <a href="<?php echo get_permalink( ) ?>" title="<?php echo esc_attr( the_title() ) ;?>">
                                    <div class="img">
                                        <?php echo get_the_post_thumbnail( );?>
                                    </div>
                                    <div class="content-item">
                                        <div class="title">
                                            <?php echo esc_attr(the_title() ); ?>
                                        </div>
                                        <div class="body">
                                            <?php echo the_excerpt(); ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php endwhile; ?>          
                    
                </div>
                <div class="area-pagination">
                        <?php
                            $total_pages = $postslist->max_num_pages;

                            if ($total_pages > 1){

                                $current_page = max(1, get_query_var('paged'));
                                echo '<nav class="pagination">';
                                echo paginate_links(array(
                                    'base' => get_pagenum_link(1) . '%_%',
                                    'format' => '/page/%#%',
                                    'current' => $current_page,
                                    'total' => $total_pages,
                                    'prev_text'    => __('« prev'),
                                    'next_text'    => __('next »'),
                                ));
                                echo '</nav>';
                            }
                        ?>
                </div>

                <?php  wp_reset_postdata();endif;?>
            </div>

            <!-- sidebar -->
            <div class="col-md-4">
                <?php get_sidebar( 'right' ); ?>
            </div>

        </div>
</div>
<?php get_footer(); ?>