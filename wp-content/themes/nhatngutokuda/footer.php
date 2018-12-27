    

<div id="backTop" >
    <a>
        <img src="<?php echo IMG_URL."/top.png" ?>" alt="top">
    </a>
</div>

<footer>
    <div class="first">
        <div class="container">
            <div class="row box-footer">
                <?php dynamic_sidebar( 'Footer' ); ?>
            </div>
        </div>
    </div>
    <div class="end">
        <div class="container">
            <div class="row">
                <div class="col-md-3 copyright">&copy;<?php echo date('Y') ?> Việt Vang company .</div>
                <div class="col-md-3 col-md-offset-6 creator">Team Front-end</div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>



<script src="<?php echo JS_URL.'/jquery-3.3.1.min.js' ?>" ></script>
<script src="<?php echo JS_URL.'/bootstrap.min.js' ?>" ></script>
<script src="<?php echo JS_URL.'/custom.js' ?>" ></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="fb-customerchat"
  attribution=setup_tool
  page_id="385703012168227">
</div>


</body>
</html>