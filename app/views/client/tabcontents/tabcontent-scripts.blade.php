<script>
	$(window).ready(function(){
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

        $("a[data-rel='save-keywords-from-dialog']").on("click", function(){
            var keywords = $("#edit-keywords").val();
            var newkeywords = keywords.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
            var token = $("#frm-business-settings input[name='_token']").val();
            $.ajax({
                url: "/ajaxUpdateKeywords",
                type: "post",
                data: { bid: {{ $business->id }}, oldbr: "{{ $branch->branchslug }}", keywords: keywords, _token: token  }
            }).done(function(data){
                // console.log(data);
                if( data == "true" ){
                    $("#frm-business-settings").attr("action", "{{ URL::to('/edit/company/'.$business->slug.'/') }}"+newkeywords);
                    $("#frm-business-settings input[name='keywords']").val(keywords);

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
            var id = 0;
            id = {{ $business->id }};
            // alert(id);
            var token = $('#frm-business-settings input[name="_token"]').val();
            $('#categories').append('<option value="'+category+'">'+$(this).attr('data-text')+'</option>');
            var c =false;
            c = confirm("Are you sure? You are about to remove this category from your business.");
			if( c == true ){

	            $.ajax({
	                url:"/ajaxUpdateCategoryRemove",
	                type: "post",
	                data: { category: category, _token: token, bid: id }
	            })
                .done(function(data){
                	// console.log(data);
                    $("span[data-id='"+category+"']").fadeOut(function(){
                        $("span[data-id='"+category+"']").remove();
                    });
                })
            }
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
    });

</script>