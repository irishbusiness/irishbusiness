<script>
	$(window).ready(function(){
        // var oldkeywords = $("#edit-keywords").val();

        // $(document).on("change", "#edit-keywords", function(){
        //     var array1 = oldkeywords.split(',');
        //     var newkeywords = $(this).val();
        //     var array2 = newkeywords.split(',');

        //     var array3 = [];

        //     var flag = false;

        //     var x = 1;

        //     $.each( array1, function( index1, value1 ){

        //     });

        //     $.each( array1, function( index1, value1 ){
        //         $.each( array2, function( index2, value2){
        //             if( value1 === value2 ){
        //                 if( x >= 3 ){
        //                     flag = true;
        //                     return false;
        //                 }
        //                 x++;
        //             }
        //         });
        //     });

        //     if( flag === true ){
        //         alert("Opps...That keyword already exists. Please choose another keyword.");
        //         $("#edit-keywords").val(oldkeywords);
        //     }

        //     console.log("oldkeywords="+oldkeywords);
        //     console.log( $(this).val() );
        // });

		$("a[rel='dialog']").on("click", function(){
            var dialog = $(this).attr("data-rel");

            $(dialog).dialog({
                width: 'auto', // overcomes width:'auto' and maxWidth bug
                maxWidth: 1000,
                height: 'auto',
                modal: true,
                fluid: true, //new option
                resizable: true
                });
        });

        $("#categories_autocomplete").autocomplete({
            source : [<?php echo $json_categories; ?>]
        });

        $("a[data-rel='save-keywords-from-dialog']").on("click", function(){
            $(this).text("Please wait...");
            $(this).click(function(e){
                e.preventDefault();
            });
            var keywords = $("#edit-keywords").val();
            var newkeywords = keywords.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
            var token = $("#frm-business-settings input[name='_token']").val();

            var oldbr = $("#old-branchslug").val();

            $.ajax({
                url: "/ajaxUpdateKeywords",
                type: "post",
                data: { bid: {{ $business->id }}, oldbr: oldbr, keywords: keywords, _token: token  }
            }).done(function(data){
                // console.log(data);
                $("a[data-rel='save-keywords-from-dialog']").text("Save");
                
                if( data != "false" ){

                    $("#frm-business-settings").attr("action", "{{ URL::to('/edit/company/'.$business->slug.'/') }}"+"/"+newkeywords);
                    $("#frm-business-settings input[name='keywords']").val(keywords);
                    $("#old-branchslug").val(newkeywords);
                    history.pushState('data', '', '/'+newkeywords+'#company-tabs-settings');
                    $("#edit-business-keywords ul").html(data);

                    (function (el) {
                        setTimeout(function () {
                            el.children().fadeOut(function(){
                                el.children().remove('span');
                                var dialog = $("a[rel='dialog']").attr("data-rel");
                                $(dialog).dialog('close');
                            });
                        }, 5000);
                        }
                        ( $('#update-keywords-notifier').append("<span class='alert btn-success'>Successfully updated.</span>") )
                    );

                    // $("#update-keywords-notifier").append("<span class='alert alert-success'>Successfully updated.</span>");

                }else{
                   (function (el) {
                        setTimeout(function () {
                            el.children().fadeOut(function(){
                                el.children().remove('span');
                            });
                        }, 5000);
                        }
                        ( $('#update-keywords-notifier').append("<span class='alert alert-error'>Oops...Something went wrong.</span>") )
                    );
                }
            });
        });

        // on window resize run function
        $(window).resize(function () {
            fluidDialog();
        });

        // catch dialog if opened within a viewport smaller than the dialog width
        $(document).on("dialogopen", ".ui-dialog", function (event, ui) {
            fluidDialog();
        });

        function fluidDialog() {
            var $visible = $(".ui-dialog:visible");
            // each open dialog
            $visible.each(function () {
                var $this = $(this);
                var dialog = $this.find(".ui-dialog-content").data("ui-dialog");
                // if fluid option == true
                if (dialog.options.fluid) {
                    var wWidth = $(window).width();
                    // check window width against dialog width
                    if (wWidth < (parseInt(dialog.options.maxWidth) + 50))  {
                        // keep dialog from filling entire screen
                        $this.css("max-width", "90%");
                    } else {
                        // fix maxWidth bug
                        $this.css("max-width", dialog.options.maxWidth + "px");
                    }
                    //reposition dialog
                    dialog.option("position", dialog.options.position);
                }
            });

        }


		$(".company-tabs").on("click", function(){
			$(".content-container.container-16").css("minHeight", "");
			$(".content-container.container-16").removeAttr("style");
		});

		// create social networking pop-ups
		  (function() {
		    
			var Config = {
		      Link: "a.share",
		      Width: 500,
		      Height: 500
			}
		        ;
		  
		  // add handler links
		  var slink = document.querySelectorAll(Config.Link);
		  for (var a = 0; a < slink.length; a++) {
		    slink[a].onclick = PopupHandler;
		  }
		  
		  // create popup
		  function PopupHandler(e) {
		    
		    e = (e ? e : window.event);
		    var t = (e.target ? e.target : e.srcElement);
		    
		    // popup position
		    var
		        px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
		        py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);
		    
		    // open popup
		    var popup = window.open(t.href, "social", "width="+Config.Width+",height="+Config.Height+",left="+px+",top="+py+",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
		    if (popup) {
		      popup.focus();
		      if (e.preventDefault) e.preventDefault();
		      e.returnValue = false;
		    }
		    
		    return !!popup;
		  }
		  
		}
		 ());
	});

	// scripts for business settings

	$(function(){

        $(document).on('change','#categories',function()
        {	
        	var id = 0;
            id = {{ $businessinfo->id }};
            var category = $('#categories').val();
            var name = $("#categories option:selected").text();
            // console.log(name);
            var token = $('#frm-business-settings input[name="_token"]').val();
            if (category>0)
            {

                $.ajax(
                {
                    url: "/ajaxUpdateCategoryAdd",
                    type: "post",
                    data: { category: category, _token: token, bid: id, name: name}

                })
                .done(function(data)
                {
                	// console.log(data);
                    $('.showCategory').append('<span class="bs-btn btn-success category" data-id="'+category+'"> '+ name +
                        '<span class="remove" data-id="'+category+'" data-text="'+name+'" title="remove this category">x</span></span>');
                    $('#categories').find('option:selected').remove();
                })
            }
        });

        $(document).on('click', '.remove', function(){
            var category = $(this).attr("data-id");
            var token = $('#frm-business-settings input[name="_token"]').val();
            var name = "";
            $.ajax({
                url : '/ajaxCategoryName',
                type : 'post',
                data : { id : category, _token : token }
            }).done(function(data){
                name = data;

                console.log('remove '+name+' from categories');
                var id = 0;
                id = {{ $business->id }};
                // alert(id);
               
                $('#categories').append('<option value="'+category+'">'+$(this).attr('data-text')+'</option>');
                var c =false;
                c = confirm("Are you sure? You are about to remove this category from your business.");
                if( c == true ){

                    $.ajax({
                        url:"/ajaxUpdateCategoryRemove",
                        type: "post",
                        data: { category: category, _token: token, bid: id }
                    }).done(function(data){
                        // console.log(data);
                        var lastID = $("ui.ui-autocomplete li:last-child").attr('id');
                        console.log("ui-id-"+lastID);
                        
                        var newID = lastID+1;

                        $("ui.ui-autocomplete").append('<li class="ui-menu-item" id="'+newID+'">'+name+'</li>');

                        $("span[data-id='"+category+"']").fadeOut(function(){
                            $("span[data-id='"+category+"']").remove();
                        });
                    })
                }

            });
        });

        $(document).on("click", "#show_hide_business_settings", function(){
        	if( $("#update-business-settings").attr("class") == "invisible" ){
        		$(this).html("- Hide Business Main Settings");

        		$("#update-business-settings").fadeIn(500, function(){
        			$("#update-business-settings").attr("class", "");
        		});
        	}else{
        		$(this).html("+ Show Business Main Settings");
        		$("#update-business-settings").fadeOut(500, function(){
        			$("#update-business-settings").attr("class", "invisible");
        		});
        	}
        });

        $(document).on("click", "#show_hide_branch_settings", function(){
        	if( $("#update-branches-settings").attr("class") == "" ){
        			$(this).html("+ Show Branch Settings");
        		$("#update-branches-settings").fadeOut(500, function(){
        			$("#update-branches-settings").attr("class", "invisible");
        		});
        		
        	}else{
        			$(this).html("- Hide Branch Settings");
        		$("#update-branches-settings").fadeIn(500, function(){
        			$("#update-branches-settings").attr("class", "");
        		});
        		
        	}
        });

        var tagsToReplace = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;'
        };

        function replaceTag(tag) {
            return tagsToReplace[tag] || tag;
        }

        function safe_tags_replace(str) {
            return str.replace(/[&<>]/g, replaceTag);
        }

        $(document).on("click", "#btn_add_this_category", function(){
            var id = 0;
            id = {{ $businessinfo->id }};
            var name = String($("#categories_autocomplete").val());
            name = safe_tags_replace(name);
            var token = $('#frm-business-settings input[name="_token"]').val();

            console.log(name);
            var category = 0;
            $.ajax({
                type : 'get',
                url : '/ajaxCategoryId',
                data : { name : name, _token: token }
            }).done(function(data){
                console.log("R_NAME="+data);
                category = parseFloat(data);
                console.log('categoryID = '+category);

                // console.log('token='+token);
                if (category > 0)
                {

                    $.ajax(
                    {
                        url: "/ajaxUpdateCategoryAdd",
                        type: "post",
                        data: { category: category, _token: token, bid: id, name: name}

                    })
                    .done(function(data)
                    {
                        // console.log(data);
                        $('.showCategory').append('<span class="bs-btn btn-success category" data-id="'+category+'"> '+ name +
                            '<span class="remove" data-id="'+category+'" data-text="'+name+'" title="remove this category">x</span></span>');
                        // $('#categories').find('option:selected').remove();
                    });
                }else{
                    alert("Oops!... Something went wrong. We can't process your request right now. Please try again later.");
                }

            });

            // var name = $("#categories option:selected").text();
            // console.log(name);
            
        });
        
        var token = $("input[name='_token']").val();
       

        $(document).on("click", "#btn_add_this_keyword", function(){
            var el = $("#add_new_keyword");
            var bid = el.attr("data-bid");
            var br = el.attr("data-br");
            var newkeyword = el.val();
           

            $.ajax({
                url : "ajaxUpdateKeywords",
                type : "post",
                data : { oldbr : br, bid : bid, keywords : newkeyword, op : 'add', _token : token }
            }).done(function(data){
                console.log(data);
                if( data != "false" ){
                    $("#add_new_keyword").attr("data-br", data);
                    $(".keywords-list").append('<span class="bs-btn btn-success category" data-id="remove_'+newkeyword+'">'+
                            newkeyword+
                            '<span class=".remove-keyword" data-id="'+newkeyword+'" data-text="'+newkeyword+'" title="remove this keyword">x</span>'+
                        '</span>');
                    $("#frm-business-settings").attr("action", "{{ URL::to('/edit/company/'.$business->slug.'/') }}"+"/"+newkeyword);
                    history.pushState('data', '', '/'+data+'#company-tabs-settings');
                }else{
                    alert("Opps! Something's not right. Please try again later.");
                }
            });

        }); 

        $(document).on("click", ".remove-keyword", function(){
            var res = confirm("You are about to remove this keyword. Are you sure to continue?");
            if( res ){
                var key = $(this).attr("data-id");
                var el = $("#add_new_keyword");
                var bid = el.attr("data-bid");
                var br = el.attr("data-br");

                $.ajax({
                    url : 'ajaxUpdateKeywords',
                    type : 'post',
                    data : { oldbr : br, bid : bid, keywords : key, op : 'delete', _token : token }
                }).done(function(data){
                    if( data != 'false' ){
                        $(".remove-keyword[data-id='"+key+"']").parent('span').fadeOut(function(){
                            $(this).remove();
                            $("#add_new_keyword").attr("data-br", data);
                            history.pushState('data', '', '/'+data+'#company-tabs-settings');
                        });
                    }else{
                        alert("Opps! Something's not right. Please try again later.");
                    }
                });
            }
        });

        $(document).on("keydown", "#add_new_keyword", function(event){
            if( event.keyCode == 13 ){
                event.preventDefault();
                return false;
            }
        });

    });

    

</script>