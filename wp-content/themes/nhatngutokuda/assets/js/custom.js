
$(function(){

    $( window ).scroll(function() {

        if(this.scrollY >= 170){
            $('header').addClass('sticky');
            $('#backTop').addClass('backTop-active');
            
        }else{
            $('header').removeClass('sticky');
            $('#backTop').removeClass('backTop-active');
        }

    });

    $(document).on('click','.backTop-active',function(){
        window.scrollTo(0,0);
    });

    $('.icon').on('click',function(){
        // $viewport = $( window ).width();
        let display =  $('.main-menu-mobile').css('display');
        if(  display == 'none' ){
            $('.main-menu-mobile').css('display','block');
        }else{
            $('.main-menu-mobile').css('display','none');
        }
        
    });
});

