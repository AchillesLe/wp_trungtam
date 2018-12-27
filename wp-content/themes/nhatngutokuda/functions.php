<?php 
define('THEME_URL', Get_stylesheet_directory_uri() );
define('CSS_URL', THEME_URL.'/assets/css' );
define('JS_URL', THEME_URL.'/assets/js' );
define('IMG_URL', THEME_URL.'/assets/imgs' );


    if( !function_exists('theme_setup') ){
        function theme_setup(){

            load_theme_textdomain('NN_Tokuda');
            add_theme_support( 'post-thumbnails');
            register_nav_menus( array(
                'primary' => __( 'Primary Menu', 'NN_Tokuda' ),
                'social'  => __( 'Social Links Menu', 'NN_Tokuda' ),
            ) );
            wp_enqueue_style( 'style', get_stylesheet_uri() );
            
        }
    }
    add_action( 'after_setup_theme', 'theme_setup' );
    function my_enqueue_front($hook) {
        
        wp_enqueue_script( 'jquery-script', JS_URL.'/jquery-3.3.1.min.js', true);
        wp_enqueue_script( 'bootstrap-script', JS_URL.'/bootstrap.min.js', true);
        wp_enqueue_script( 'script', JS_URL.'/admin-custom.js', true);

    }
    
    add_action('wp_enqueue_scripts', 'my_enqueue_front');
    
    function my_enqueue_admin($hook) {
        
        wp_enqueue_style( 'bootstrap', CSS_URL.'/bootstrap.min.css' );
        wp_enqueue_style( 'font-awesome', CSS_URL.'/fontawesome/css/all.css' );
        wp_enqueue_style( 'style-custom', CSS_URL.'/admin.css' );
        wp_enqueue_script( 'jquery-script', JS_URL.'/jquery-3.3.1.min.js', true);
        wp_enqueue_script( 'bootstrap-script', JS_URL.'/bootstrap.min.js', true);

    }
    
    add_action('admin_enqueue_scripts', 'my_enqueue_admin');
    
    register_sidebar(array(
        'name' => 'Footer',
        'before_widget' => '<div class = "widgetArea col-md-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Slider',
        'before_widget' => '<section id="slider"  class="carousel slide" data-ride="carousel"><div class="carousel-inner">',
        'after_widget' => '</div></section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'sidebar-right',
        'before_widget' => '<div class = "widgetArea ">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    function custom_menu( $theme_location ) {
        if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
            $menu = get_term( $locations[$theme_location], 'nav_menu' );
            $menu_items = wp_get_nav_menu_items($menu->term_id);
     
            $menu_list  = "<nav class=$theme_location>" ."\n";
            $menu_list .= '<ul>' ."\n";
     
            $index = 0;
            $submenu = false;
             
            foreach( $menu_items as $menu_item ) {
                 
                $link = $menu_item->url;
                $title = $menu_item->title;
                
                if ( $menu_item->menu_item_parent == 0 ) {

                    $parent_id = $menu_item->ID;

                    $menu_list .= '<li class="item '.$haschild.'">' ."\n";
                    $menu_list .=   '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";

                }
     
                if ( isset( $parent_id ) && $parent_id == $menu_item->menu_item_parent ) {
     
                    if ( $submenu == false ) {
                        $submenu = true;
                        $menu_list .= '<ul class="has_child">' ."\n";
                    }
     
                    $menu_list .= '<li class="item-child">' ."\n";
                    $menu_list .=   '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";
                    $menu_list .= '</li>' ."\n";
                         
     
                    if ( $menu_items[ $index + 1 ]->menu_item_parent != $parent_id && $submenu ){
                        $menu_list .= '</ul>' ."\n";
                        $submenu = false;
                    }
     
                }
     
                if ( isset( $parent_id ) && isset( $menu_items[ $index + 1 ] ) && $menu_items[ $index + 1 ]->menu_item_parent != $parent_id ) { 
                    $menu_list .= '</li>' ."\n";      
                    $submenu = false;
                }
     
                $index++;
            }
             
            $menu_list .= '</ul>' ."\n";
            $menu_list .= '</nav>' ."\n";
     
        } else {
            $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
        }
        echo $menu_list;
    }

    function create_form_contact(){
        return "test shortcode";
    }
    add_shortcode('form_contact','create_form_contact');

 
    add_action('admin_menu', 'slide_menu');
    function slide_menu() { 
 
        add_menu_page( 
            'Page Title', 
            'Slide Header', 
            'edit_posts', 
            'menu_slug', 
            'page_slide', 
            'dashicons-images-alt2'
           );
    }

    function page_slide(){
        global $wpdb;
        $slides = $wpdb->get_results( "SELECT * FROM slides ORDER BY id DESC", OBJECT  );
        $html = "";
        $html.= "<div class='title' ><h1>Danh sách slide</h1></div>";
        $html.= "<div class='message' > </div>";
        $html.=  "<div class='row add-slide'><button  class='btn btn-primary btn-add-slide' ><i class='fas fa-plus'></i>&nbsp;&nbsp;Thêm slide</button></div>";
        $html.=  "<div class='page-slide-content table-responsive'> <table class='table table-bordered table-hover tbl-slide'>
                <thead class='thead-dark'>
                    <tr>
                        <th>#</th>
                        <th>Hình</th>
                        <th>Text thế chỗ</th>
                        <th>Ngày cập nhật</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>";
                $index = 1;
                foreach(  $slides as $slide ){
                    $html.= "<tr>
                        <td>$index</td>
                        <td><img src='$slide->url' alt='$slide->alt' /></td>
                        <td>$slide->alt</td>
                        <td>$slide->updated_date</td>
                        <td class='action' data-id='$slide->id' data-id_img='$slide->id_img' data-img='$slide->description' data-url='$slide->url' data-alt='$slide->alt'> <button  class='btn btn-warning btn-edit-slide' data-toggle='modal'  ><i class='far fa-edit'></i>&nbsp;&nbsp;Sửa</button> <button  class='btn btn-danger btn-delete-slide' ><i class='far fa-trash-alt'></i>&nbsp;&nbsp;Xóa</button></td>
                    </tr> ";
                    $index++;
                }
                  
        $html.=  "</tbody>
            </table></div>";
        $modal = "";
        $modal .= '<div class="modal fade" id="edit_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>text in the modal</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>';
        echo  $html.$modal ;
    }

    add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
    function load_wp_media_files( ) {
        wp_enqueue_media();
        wp_enqueue_script( 'myprefix_script',  JS_URL.'/admin-custom.js' , array('jquery'), '0.1' );
    }

    add_action( 'wp_ajax_myprefix_get_image', 'myprefix_get_image'   );
    function myprefix_get_image() {
        if(isset($_GET['id']) ){
            $x = INPUT_GET;
            $image = wp_get_attachment_image( filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ) , 'medium', false, array( 'id' => 'preview-image' ) );
            $data = array(
                'image'    => $image,
            );
            wp_send_json_success( $data );
        } else {
            wp_send_json_error();
        }
    }
    add_action( 'wp_ajax_update_slide', 'update_slide' );
    function update_slide(){
        if(  isset( $_POST['submit'] )  && isset( $_POST['id_img'] ) && $_POST['id_img'] != "" &&  isset( $_POST['url'] ) && $_POST['url'] != "" ){
            $id =  $_POST['id'];
            $id_img =  $_POST['id_img'];
            $privew_img =  $_POST['privew_img'];
            $url =  $_POST['url'];
            $alt =  $_POST['alt'];
            date_default_timezone_set("Asia/Ho_Chi_Minh"); 
            $date = date('Y-m-d H:i:s');
            global $wpdb;
            if( intval ($id ) > 0 ){
                $query = " UPDATE slides SET id_img = '$id_img' ,  url = '$url' , alt='$alt' , description='$privew_img' , updated_date = '$date' WHERE id='$id' ";
                $result = $wpdb->query( $query );
                if( $result ){
                    wp_send_json_success( );
                    die();
                }else{
                    wp_send_json_error();
                    die();
                }
            }else {
               
                $query = " INSERT INTO slides ( id_img , url , alt , description , updated_date )  VALUES ( '$id_img' , '$url' , ' $alt' , '$privew_img', '$date' )  ";
                $result = $wpdb->query( $query );
                if( $result ){
                    wp_send_json_success( );
                    die();
                }else{
                    wp_send_json_error();
                    die();
                }
            }  
        } else {
            wp_send_json_error();
        }
    }
    add_action( 'wp_ajax_delete_slide', 'delete_slide' );
    function delete_slide( ){
        if( isset( $_GET['id'] ) ){
            $id = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ) ; 
            $query = " DELETE FROM slides   WHERE id='$id' ";
            global $wpdb;
            $result = $wpdb->query( $query );
            if( $result == true ){
                wp_send_json_success( );
            }else{
                wp_send_json_error();
            }
        } else {
            wp_send_json_error();
        }
    }

?>