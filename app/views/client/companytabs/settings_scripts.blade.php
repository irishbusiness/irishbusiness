<script>
    $(function(){
        $(document).on('change','#categories',function()
        {

            // console.log("tae");
            var category = $('#categories').val();

            if (category>0)
            {
                // console.log(category);

                $.ajax(
                    {
                        url: "/ajaxCategory",
                        type: "post",
                        data: { category: category},
                        beforeSend: function()
                        {
                            // console.log(category);
                        }

                    })
                    .done(function(data)
                    {
                        // console.log(data);
                        $('.showCategory').append('<span class="bs-btn btn-success category" data-id="'+data.id+'"> '+ data.name +
                            '<span class="remove" data-id="'+data.id+'" data-text="'+data.name+'" title="remove this category">x</span></span>');
                        $('#categories').find('option:selected').remove();
                    })

            }
        });

        $(document).on('click', '.remove', function(){
            var category = $(this).attr("data-id");
            $('#categories').append('<option value="'+category+'">'+$(this).attr('data-text')+'</option>');
            $.ajax({
                url:"/ajaxCategoryRemove",
                type: "post",
                data: { category: category },
                beforeSend: function(){
                    // console.log(category);
                }
            })
                .done(function(data){
                    // console.log(data);
                    $("span[data-id='"+category+"']").fadeOut(function(){
                        $("span[data-id='"+category+"']").remove();
                    });
                })
        });
    });

    jQuery(function() {
        var $homeurl = jQuery('#get_homeurl').data('homeurl');
        var $divlist = jQuery('#events_list');
        var contentDiv  = jQuery('#ajax_load_event');
        var eventlink = $divlist.find('ul li a');
        var eventlinkid = $divlist.find('ul li');
        var eventdaylink = $divlist.find('a');
        jQuery(document).ready(function(){
            eventlink.click(function(data){
                var idevent = $(this).parent('div').parent('div').parent('li').attr('class');
                var loadingwheel = $('<img style="padding: 40px 20px;" src="'+$homeurl+'/images/loader.gif" width="50px" height="50px" />');
                var ajaxdiv = jQuery('.ajax-content');
                var urlpost = '?get=event';
                ajaxContent = $('<div class="ajax-content"></div>').append(loadingwheel);
                contentDiv.find('>').hide();
                contentDiv.append(ajaxContent);
                jQuery.post(
                    urlpost,
                    {
                        action : 'get_event',
                        idevent : idevent
                    },
                    function( response ) {
                        ajaxContent = $('<div class="ajax-content"></div>').append(response);
                        contentDiv.find('>').hide();
                        contentDiv.append(ajaxContent);
                    }
                )
                return false;
            });
        });
    });
</script>