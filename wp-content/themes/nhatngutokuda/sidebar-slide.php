<section id="slider"  class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php   global $wpdb; 
        $slides = $wpdb->get_results( "SELECT * FROM slides ", OBJECT  );?>
        <?php if( count($slides) > 0) : ?>
            <ol class="carousel-indicators">
            <?php foreach( $slides as $key => $value) :?>
                <li data-target="#slider" data-slide-to="<?php echo $key ?>" class='img-responsive <?php echo  $key == "0" ? "active" : ""  ?>'></li>
            <?php endforeach; ?>
            </ol>
            <?php foreach( $slides as $key2 => $slide ) :?>
            <div class="item  <?php echo  $key2 == "0" ? "active" : ""  ?>">
                <a href="/">
                    <img src="<?php echo  $slide->url ?>" alt="<?php echo  $slide->alt ?>">
                </a>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>