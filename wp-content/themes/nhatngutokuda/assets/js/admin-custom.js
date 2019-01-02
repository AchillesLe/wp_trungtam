var $ = jQuery.noConflict();

$( document ).ready(function(){

    $('.btn-edit-slide').on('click',function(){
        $td = $(this).parent();
        $id = $td.data('id');
        $id_img = $td.data('id_img');
        $privew_img =  $td.data('img');
        $url =  $td.data('url');
        $alt = $td.data('alt');

        $('#edit_modal >.modal-dialog > .modal-content > .modal-header > .modal-title').text("Cập nhập slide");
        $body = `<form class="form-horizontal"  id="form-update"> 
                    <div class="form-group">
                        <label class="control-label col-sm-2"  >Chọn file : </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file-wp-media" >` +
                            `<input type="hidden" class="form-control" name="id" value = "`+ $id + `">` +
                            `<input type="hidden" class="form-control" name="idfile" value = "`+ $id_img + `">` +
                            `<input type="hidden" class="form-control" name="privew_img" value='`+ $privew_img +`'>`+
                       `</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-md-offset-2 previewer" >`+
                            $privew_img +
                        `</div>`+
                    `</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2"  >url :</label>
                        <div class="col-sm-10">
                            <input type='text' name='url' class="form-control" readonly value="`+ $url +`"/>`+
                        `</div>
                    </div>
                    <div class="form-group"> 
                        <label class="control-label col-sm-2"  >Alt :</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="alt" placeholder=" Nhập text thay thế" value="`+ $alt +`">`+
                        `</div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="btn-form-submit" class="btn btn-default"  >Cập nhật</button>
                        </div>
                    </div>
                </form>`;
        $('#edit_modal >.modal-dialog > .modal-content > .modal-body').html( $body );
        $('#edit_modal').modal('show');
    });


    $('#edit_modal').on('click','input[name=file-wp-media]',function(e){
        e.preventDefault();
        var image_frame;
        if( image_frame ){
            image_frame.open();
            return;
        }
        
        image_frame = wp.media({
                        title: 'Select Media',
                        multiple : false,
                        library : {
                            type : 'image',
                        }
                    });
 
        
        image_frame.on('open',function() {
             
            let selection =  image_frame.state().get('selection');
            
            ids = jQuery('input[name=idfile]').val().split(',');

            ids.forEach(function(id) {
                attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add( attachment ? [ attachment ] : [] );
            });

        });

        image_frame.on('close',function() {
              
            let selection =  image_frame.state().get('selection');
            var gallery_ids = new Array();
            var my_index = 0;
            selection.each(function(attachment) {
                gallery_ids[my_index] = attachment['id'];
                my_index++;
            });
            var ids = gallery_ids.join(",");
            jQuery('input[name=idfile]').val(ids);
            Refresh_Image(ids);
            var url = selection.models[0] != null ? selection.models[0].attributes.url : "";
            var alt = selection.models[0] != null ? selection.models[0].attributes.alt : "";
            jQuery('input[name=url]').val(url);
            jQuery('input[name=alt]').val(alt);
        });
        image_frame.open();
        
    });
   
    function Refresh_Image(the_id){
        var data = {
            action: 'myprefix_get_image',
            id: the_id
        };
 
        jQuery.get(ajaxurl, data, function(response) {

            if(response.success === true) {
                jQuery('.previewer').attr('hidden',false);
                jQuery('.previewer').html( response.data.image );
                jQuery('input[name=privew_img]').val( response.data.image );
            }
        });
    }

    $('#edit_modal').on('click','button[name=btn-form-submit]',function(e) {
        e.preventDefault();
        var data ={
            action: 'update_slide',
            id : $('input[name=id]').val(),
            id_img : $('input[name=idfile]').val(),
            privew_img : $('input[name=privew_img]').val(),
            url : $('input[name=url]').val(),
            alt : $('input[name=alt]').val(),
            submit : true
        }
        Update_slide( data );
        $('#edit_modal').modal('hide');
       
    });

    function Update_slide(data,status){
        
        $('#edit_modal >.modal-dialog > .modal-content > .modal-body').html( "" );
        jQuery.post(ajaxurl, data, function(response) {
            if( response.success === true ) {
                $('.message').html('<div class="alert alert-info">Update thành công slide !</div>');
                window.scroll( 10 , 10)
                setTimeout(function(){
                    window.location.href=window.location.href;
                },1000);
            }else{
                $('.message').html('<div class="alert alert-danger">Xảy ra lỗi ! vui lòng kiểm tra lại .</div>');
                window.scroll( 10 , 10)
                setTimeout(function(){
                    $('.message').html("");
                },4000);
            }
        });
       
    }
    
    $('.btn-add-slide').on('click',function(e){
        $('#edit_modal >.modal-dialog > .modal-content > .modal-header > .modal-title').text("Thêm slide");
        $body = `<form class="form-horizontal"  id="form-update"> 
                    <div class="form-group">
                        <label class="control-label col-sm-2"  >Chọn file : </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file-wp-media" >` +
                            `<input type="hidden" class="form-control" name="id" value = "0">` +
                            `<input type="hidden" class="form-control" name="idfile" value = "">` +
                            `<input type="hidden" class="form-control" name="privew_img" value="" `+
                       `</div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-md-offset-2 previewer" >
                           
                        </div>`+
                    `</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2"  >url :</label>
                        <div class="col-sm-10">
                            <input type='text' name='url' class="form-control" readonly value=""/>`+
                        `</div>
                    </div>
                    <div class="form-group"> 
                        <label class="control-label col-sm-2"  >Alt :</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="alt" placeholder=" Nhập text thay thế" value="">`+
                        `</div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="btn-form-submit" class="btn btn-default"  >Thêm slide</button>
                        </div>
                    </div>
                </form>`;
        $('#edit_modal >.modal-dialog > .modal-content > .modal-body').html( $body );
        $('#edit_modal').modal('show');
    });

    $('.btn-delete-slide').on('click',function(e){
        $td = $(this).parent();
        $tr = $td.parent();
        $id = $td.data('id');
        var data = {
            action: 'delete_slide',
            id: $id
        };
        jQuery.get(ajaxurl, data, function(response) {

            if( response.success == true ) {
                $tr.remove();
                reload_index();
                $('.message').html('<div class="alert alert-info">Xóa thành công !</div>');
                setTimeout(function(){
                    $('.message').html("");
                },5000);
            }else{
                $('.message').html('<div class="alert alert-danger">Xảy ra lỗi ! vui lòng kiểm tra lại .</div>');
                window.scroll( 10 , 10)
                setTimeout(function(){
                    $('.message').html("");
                },4000);
            }
        });
    });

    function reload_index(){
        $('table.tbl-slide>tbody>tr').each(function(e){
            $(this).children("td").eq("0").text(e+1);
        });
    }
});