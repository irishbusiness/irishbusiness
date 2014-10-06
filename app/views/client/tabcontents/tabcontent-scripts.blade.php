<script>
    (function( $ ) {
        $.widget("custom.combobox", {
            _create: function() {
                this.wrapper = $( "<span>" )
                    .addClass( "custom-combobox" )
                    .insertAfter( this.element );

                this.element.hide();
                this._createAutocomplete();
                this._createShowAllButton();
            },

            _createAutocomplete: function() {
                var selected = this.element.children( ":selected" ),
                    value = selected.val() ? selected.text() : "";

                this.input = $( "<input>" )
                    .appendTo( this.wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: $.proxy( this, "_source" )
                    })
                    .tooltip({
                        tooltipClass: "ui-state-highlight"
                    });

                this._on( this.input, {
                    autocompleteselect: function( event, ui ) {
                        ui.item.option.selected = true;
                        this._trigger( "select", event, {
                            item: ui.item.option
                        });
                    },

                    autocompletechange: "_removeIfInvalid"
                });
            },

            _createShowAllButton: function() {
                var input = this.input,
                    wasOpen = false;

                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .tooltip()
                    .appendTo( this.wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "custom-combobox-toggle ui-corner-right" )
                    .mousedown(function() {
                        wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                    })
                    .click(function() {
                        input.focus();

                        // Close if already visible
                        if ( wasOpen ) {
                            return;
                        }

                        // Pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                    });
            },

            _source: function( request, response ) {
                var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                response( this.element.children( "option" ).map(function() {
                    var text = $( this ).text();
                    if ( this.value && ( !request.term || matcher.test(text) ) )
                        return {
                            label: text,
                            value: text,
                            option: this
                        };
                }) );
            },

            _removeIfInvalid: function( event, ui ) {

                // Selected an item, nothing to do
                if ( ui.item ) {
                    return;
                }

                // Search for a match (case-insensitive)
                var value = this.input.val(),
                    valueLowerCase = value.toLowerCase(),
                    valid = false;
                this.element.children( "option" ).each(function() {
                    if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                        this.selected = valid = true;
                        return false;
                    }
                });

                // Found a match, nothing to do
                if ( valid ) {
                    return;
                }

                // Remove invalid value
                this.input
                    .val( "" )
                    .attr( "title", value + " didn't match any item" )
                    .tooltip( "open" );
                this.element.val( "" );
                this._delay(function() {
                    this.input.tooltip( "close" ).attr( "title", "" );
                }, 2500 );
                this.input.autocomplete( "instance" ).term = "";
            },

            _destroy: function() {
                this.wrapper.remove();
                this.element.show();
            }
        });
    })( jQuery );

    $(function() {
        $( "#combobox" ).combobox();
        $( "#toggle" ).click(function() {
            $( "#combobox" ).toggle();
        });
    });

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