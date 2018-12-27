<section id="slider"  class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <!-- <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
            <li data-target="#slider" data-slide-to="3"></li>
            <li data-target="#slider" data-slide-to="4"></li>
        </ol>
        <div  class="item active">
            <a href="/">
                <img src="<?php echo IMG_URL."/slider1.png" ?>" alt="slider 1">
            </a>
        </div>
        <div class="item">
            <a href="/">
                <img src="<?php echo IMG_URL."/slider2.png" ?>" alt="slider 2">
            </a>
        </div>
        <div class="item">
            <a href="/">
                <img src="<?php echo IMG_URL."/slider3.jpg" ?>" alt="slider 3">
            </a>
        </div>
        <div class="item">
            <a href="/">
                <img src="<?php echo IMG_URL."/slider4.jpg" ?>" alt="slider 4">
            </a>
        </div>
        <div class="item">
            <a href="/">
                <img src="<?php echo IMG_URL."/slider5.png" ?>" alt="slider 5">
            </a>
        </div> -->
        <?php   global $wpdb; 
        $slides = $wpdb->get_results( "SELECT * FROM slides ", OBJECT  );?>
        <?php if( count($slides) > 0) : ?>
            <ol class="carousel-indicators">
            <?php foreach( $slides as $key => $value) :?>
                <li data-target="#slider" data-slide-to="<?php echo $key ?>" class='<?php echo  $key==0 ? 'active' : ''  ?>'></li>
            <?php endforeach; ?>
            </ol>
            <?php foreach( $slides as $slide ) :?>
            <div class="item">
                <a href="/">
                    <img src="<?php echo  $slide->url ?>" alt="<?php echo  $slide->alt ?>">
                </a>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>