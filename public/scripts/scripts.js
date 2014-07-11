/***
Equal Heights function.
***/

(function($) {
	$.fn.equalHeights = function(browserWidth, additionalHeight) {
		// Calculating width of the scrollbar for Firefox
		var scrollbar = 0;
		if (typeof document.body.style.MozBoxShadow === 'string') {
			scrollbar = window.innerWidth - jQuery('body').width();
		} 
		// Getting number of blocks for height correction.
		var blocks = jQuery(this).children().length;
		// Setting block heights to auto.
		jQuery(this).children().css('min-height', 'auto');
		// Initializing variables.
		var currentBlock = 1;
		var equalHeight = 0;
		// Finding the highest block in the selection.
		while (currentBlock <= blocks) {
			var currentHeight = jQuery(this).children(':nth-child(' + currentBlock.toString() + ')').height();
			if (equalHeight <= currentHeight) {
				equalHeight = currentHeight;
			}
			currentBlock = currentBlock + 1;
		}


		if( (is_corporate == "true" || is_corporate == true) && corporate_counter == 0 ){
			console.log("nisulod");
			console.log(corporate_counter);
			// Equalizing heights of columns.
			// if (jQuery('body').width() > browserWidth - scrollbar) {
			// 	jQuery(this).children().css('min-height', equalHeight + additionalHeight);
			// } else {
			// 	jQuery(this).children().css('min-height', 'auto');
			// }
			jQuery('.content-wrapper').css('min-height', $( window ).height());

			corporate_counter++;
		}
	};
})(jQuery);

/* global document */
jQuery(document).ready(function(){

	/***
     1. Main menu jQuery plugin.
	***/

	jQuery('#sf-menu').superfish();

	/***
     2. Mobile Menu jQuery plugin.
	***/

	jQuery('#sf-menu').mobileMenu({
		switchWidth: 767,
		prependTo: '.main-menu',
		combine: false
	});

	/***
     3. Adding sliders for the advanced search form. Implementing switching between default and advanced search forms.
	***/

	/* Calling slider() function and setting slider options. */
	jQuery('#slider-distance').slider({
		range: 'min',
		value: 100,
		min: 1,
		max: 300,
		slide: function( event, ui ) {
			jQuery('#distance').text( ui.value + ' km' );
		}
	});
	/* Showing the default value on the page load. */
	jQuery('#distance').text( jQuery('#slider-distance').slider('value') + ' km' );

	/* Calling slider() function and setting slider options. */
	jQuery('#slider-rating').slider({
		range: 'min',
		value: 50,
		min: 0,
		max: 100,
		slide: function( event, ui ) {
			jQuery('#rating').text( '> ' + ui.value + '%' );
		}
	});
	/* Showing the default value on the page load. */
	jQuery('#rating').text( '> ' + jQuery('#slider-rating').slider('value') + '%' );

	/* Calling slider() function and setting slider options. */
	jQuery('#slider-days-published').slider({
		range: 'min',
		value: 30,
		min: 0,
		max: 45,
		slide: function( event, ui ) {
			jQuery('#days-published').text( '< ' + ui.value );
		}
	});
	/* Showing the default value on the page load. */
	jQuery('#days-published').text( '< ' + jQuery('#slider-days-published').slider('value') );

	/***
     4. Calling selectbox() plugin to create custom stylable select lists.
	***/

	$('.page-selector select').selectbox({
		animationSpeed: "fast",
		listboxMaxSize: 400
	});
	$('#category-selector-default').selectbox({
		animationSpeed: "fast",
		listboxMaxSize: 400
	});
	$('#category-selector-advanced').selectbox({
		animationSpeed: "fast",
		listboxMaxSize: 400
	});
	$('#country-selector-advanced').selectbox({
		animationSpeed: "fast",
		listboxMaxSize: 400
	});
	$('.language-selector select').selectbox({
		animationSpeed: "fast",
		listboxMaxSize: 400
	});

	/***
     5. Custom logic for switching between search default/advanced forms and hiding/showing map.
	***/

	jQuery('#advanced-search').hide();
	jQuery('#advanced-search-button').click(function(event) {
		/* Preventing default link action */
		event.preventDefault();
		if ( jQuery('#hide-map-button').hasClass('map-collapsed') ) {
			jQuery('#map').animate({ height: '620px' });
			jQuery('#hide-map-button').text('Hide Map').removeClass('map-collapsed').addClass('map-expanded');
		}
		jQuery('#default-search').slideToggle('fast');
		jQuery('#advanced-search').slideToggle('fast');
		if (jQuery(this).text() === 'Advanced Search') {
			jQuery(this).text('Simple Search');
			jQuery(this).addClass('expanded');
		} else {
			jQuery(this).text('Advanced Search');
			jQuery(this).removeClass('expanded');
		}
	});

	jQuery('#hide-map-button').click(function(event) {
		event.preventDefault();
		if ( jQuery(this).hasClass('map-expanded') ) {
			if ( jQuery('#advanced-search-button').hasClass('expanded') ) {
				jQuery('#default-search').slideToggle('fast');
				jQuery('#advanced-search').slideToggle('fast');
				jQuery('#advanced-search-button').text('Advanced Search');
				jQuery('#advanced-search-button').removeClass('expanded');
			}
			jQuery('#map').animate({ height: '107px' });
			jQuery(this).text('Show Map').removeClass('map-expanded').addClass('map-collapsed');
		} else {
			jQuery('#map').animate({ height: '620px' });
			jQuery(this).text('Hide Map').removeClass('map-collapsed').addClass('map-expanded');
		}
	});
	
	/***
     6. Logic for custom picture gallery with thumbnails, that appears on company-page.html.
	***/

	jQuery('.photo-thumbnails .thumbnail').click(function() {
		// Setting class "current" to the thumbnail that was clicked.
		jQuery('.photo-thumbnails .thumbnail').removeClass('current');
		jQuery(this).addClass('current');
		// Getting "src" attribute of the image that was clicked.
		var path = jQuery(this).find('img').attr('src');
		// Setting "src" attribute of the big image.
		jQuery('#big-photo img').attr('src', path);
	});

	/***
     7. Adding <input> placeholders (for IE 8-9).
	***/

	jQuery('.text-input-grey, .text-input-black').placeholder();

	/***
     8. Adding autocomplete.
	***/

	jQuery(function() {
		var autosuggestions = [
			"Airport",
			"Restaurant",
			"Shop",
			"Entertainment",
			"Realestate",
			"Sports",
			"Cars",
			"Education",
			"Garden",
			"Mechanic",
			"Offices",
			"Advertising",
			"Industry",
			"Postal",
			"Libraries"
		];
		jQuery('#search-what').autocomplete({
			source: autosuggestions
		});
	});

	/***
     9. Colorbox for portfolio images.
	***/

	jQuery('.portfolio-enlarge').colorbox({ maxWidth: '90%' });

	/***
	10. Boxed version switcher. Theme switcher.
	***/

	$('#switcher-toggle-button').click(function() {
		if ( $('#theme-switcher').hasClass('visible') == true ) {
			$('#theme-switcher').removeClass('visible').stop(true, false).animate({ left: '-122px' });
		} else {
			$('#theme-switcher').addClass('visible').stop(true, false).animate({ left: 0 });
		}
	});

	$('#color-switcher li').click(function() {
		var color = $(this).attr('class');
		$('#theme-color').attr('href', 'css/' + color + '.css');
	});

	$('#layout-switcher').on('change', function() {
		currentLayout = this.value
		if( currentLayout == 'boxed' ) {
			$('.section').addClass('boxed');
		} else if ( currentLayout == 'fullscreen' ) {
			$('.section').removeClass('boxed');
		}
	});

	$('#background-switcher li').click(function() {
		currentLayout = $('#layout-switcher').val();
		if( currentLayout == 'boxed' ) {
			background = $(this).attr('class');
			$('body').removeClass();
			$('body').addClass(background);
		} else {
			alert('Background is visible only in boxed layout. Please select boxed layout.');
		}
	});

	/***
	11. Login & Register form bubbles.
	***/

	jQuery('#login-link').click(function() {
		jQuery('#login-form').toggle();
		jQuery('#register-form').hide();
	});
	jQuery('#register-link').click(function() {
		jQuery('#register-form').toggle();
		jQuery('#login-form').hide();
	});


});

/* global window */
jQuery(window).load(function(){

	/***
	12. Setting equal heights for required containers and elements on page load.
	***/

	jQuery('.equalize').equalHeights(767, 0);
	jQuery('#subscription-options').equalHeights(450, 1);

	/***
	12. Adding Twitter feed to the website footer.
	***/

	/*jQuery("#twitter-feed").tweet({
		username: "_IrishBusiness",
		template: "{avatar}{text}",
		count: 2,
		avatar_size: 24,
		loading_text: "Loading tweets..."
	});*/

	/***
	13. Adding Flickr feed to the website footer.
	***/

	jQuery("#flickr-feed").jflickrfeed({
		limit: 12,
		qstrings: {
			id: '52617155@N08'
		},
		itemTemplate: 
		'<li>' +
			'<a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a>' +
		'</li>'
	});

	/***
	14. Filter for the portfolio items
	***/

	jQuery('#portfolio-filter input').click(function() {
		jQuery('#portfolio-filter input').removeClass('current');
		jQuery(this).addClass('current');
		var filter = jQuery(this).attr('id');
		if ( filter === 'all' ) {
			jQuery('.portfolio-listing').slideDown('fast');
			jQuery('.portfolio-listing-small').slideDown('fast');
		} else {
			jQuery('.portfolio-listing').slideUp('fast');
			jQuery('.portfolio-listing-small').slideUp('fast');
			jQuery('.portfolio-listing.' + filter).slideDown('fast');
			jQuery('.portfolio-listing-small.' + filter).slideDown('fast');
		}
	});

	/***
	15. Company tabs switchong.
	***/

	$("#company-tabs-active li a").click(function(event) {
		event.preventDefault();
		$("#company-tabs-active li").removeClass('active');
		$(this).parent().addClass('active');
		$('.company-tabs-content').slideUp(500);
		var tabID = $(this).attr('class');
		window.location.hash = tabID;
		$('#' + tabID).delay(500).slideDown(500);
		return false;
	});

	var hash = window.location.hash;
	if ( $(hash).length ) {
		$('.company-tabs-content').slideUp(500);
		$(hash).delay(500).slideDown(500);
		$("#company-tabs-active li").removeClass('active');
		$('#company-tabs-active li .' + hash.slice(1)).parent().addClass('active');
	}

	$('.portfolio-layout-links a').click(function(event) {
		event.preventDefault();
		if ( $(this).hasClass('current') == false ) {
			switch(true) {
				case $(this).hasClass('portfolio-1'):
					$('.company-tabs-content').slideUp(300);
					window.location.hash = 'company-tabs-portfolio-1';
					$('#company-tabs-portfolio-1').delay(300).slideDown(300);
					break;
				case $(this).hasClass('portfolio-2'):
					$('.company-tabs-content').slideUp(300);
					window.location.hash = 'company-tabs-portfolio-2';
					$('#company-tabs-portfolio-2').delay(300).slideDown(300);
					break;
				case $(this).hasClass('portfolio-3'):
					$('.company-tabs-content').slideUp(300);
					window.location.hash = 'company-tabs-portfolio-3';
					$('#company-tabs-portfolio-3').delay(300).slideDown(300);
					break;
				case $(this).hasClass('portfolio-4'):
					$('.company-tabs-content').slideUp(300);
					window.location.hash = 'company-tabs-portfolio-4';
					$('#company-tabs-portfolio-4').delay(300).slideDown(300);
					break;
			}
		}
	});

	/***
	16. Specialisations block scripts.
	***/

	$('.specialisation-progressbar').each(function() {
		var currentValue = Number($(this).attr('value'));
		$(this).progressbar({
			value: currentValue
		});
	});
	$('.specialisation .toggle-description-button').click(function() {
		if ( $(this).hasClass('plus-button') == true ) {
			$(this).toggleClass('plus-button minus-button').html('-').siblings('.specialisation-description').slideDown();
		} else {
			$(this).toggleClass('plus-button minus-button').html('+').siblings('.specialisation-description').slideUp();
		}
	});

	/***
	17. Star rating scripts.
	***/

	$('.rating-stars.interactive .star').click(function() {
		$(this).siblings('.star').removeClass('current');
		$(this).addClass('current').parent().addClass('rated');
	});
	
	/***
	18. Company event tabs switching.
	***/

	$('#event-tabs a').click(function(event) {
		event.preventDefault();
		if ( $(this).parent().hasClass('active') == false ) {
			var tabID = $(this).attr('id');
			$('#event-tabs li').removeClass('active');
			$(this).parent().addClass('active');
			$('#event-tabs-content li').slideUp('fast').removeClass('visible');
			$('#event-tabs-content li.' + tabID).slideDown('fast').addClass('visible');
		}
	});

	/***
	18. Company product& services tabs, product categories switching.
	***/

	$('ul.list-root ul.hidden').hide();
	$('ul.list-root a').click(function(event) {
		if ( $(this).next().is('ul') == true ) {
			event.preventDefault();
			if ( $(this).next().hasClass('level-2') == true ) {
				var className = 'level-2';
			}
			if ( $(this).next().hasClass('level-3') == true ) {
				var className = 'level-3';
			}
			if ( $(this).hasClass('expanded') == false ) {
				$('ul.' + className + '.visible')
				.slideUp(200)
				.toggleClass('visible hidden')
				.prev('a')
				.toggleClass('expanded');
				$(this)
				.toggleClass('expanded')
				.next('ul')
				.slideDown(200)
				.toggleClass('visible hidden');
			} else {
				$('ul.' + className + '.visible')
				.slideUp(200)
				.toggleClass('visible hidden')
				.prev('a')
				.toggleClass('expanded');
			}
		}
	});
	
});

jQuery(window).resize(function() {

	/***
	20. Setting equal heights for required containers and elements on page resize.
	***/

	jQuery('.zone-content.equalize').equalHeights(767, 0);
	jQuery('#subscription-options').equalHeights(450, 1);

});

// js for General Settings
$(document).ready(function() {
	$("#btn-cancel-edit").hide();
	validate_prices();
    $("#settings_search_result_per_page, input[data-type='number']").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ( $.inArray(event.keyCode,[46,8,9,27,13,190]) !== -1 ||
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });

    function validate_prices(){
    	$(document).on("change", "#price", function(){
    		var discounted_price = $("#discounted_price").val();
    		if( discounted_price != null || discounted_price != "" || discounted_price != undefined ){
    			$("#discounted_price").val("");
    		}
    	});

    	$(document).on("change", "#discounted_price", function(){
	    	var price = $("#price").val();

	    	if( parseFloat($(this).val()) >= parseFloat(price) || (price == "" || price == null || price == undefined) ){
	    		$(this).val("");
	    		$("#discounted_price_error").fadeIn(function(){
	    			$(this).fadeOut(4500);
	    		});
	    	}
	    });

	    $(document).on("change", "#st_discounted_price", function(){
	    	var discounted_price = $("#discounted_price").val();
	    	var price = $("#price").val();

	    	if( (parseFloat($(this).val()) > parseFloat(discounted_price) || (discounted_price == "" || discounted_price == null || discounted_price == undefined)) || (price == "" || price == null || price == undefined)){
	    		$(this).val("");
	    		$("#st_discounted_price_error").fadeIn(function(){
	    			$(this).fadeOut(4500);
	    		});
	    	}
	    });
    }


    $(".option-button").click(function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		var operation = $(this).attr("data-type");
		if(operation == "delete"){
			if(confirm("Are you sure you want to delete this subscription?")){
				subs_continue(id,operation);
			}
		}else{
			subs_continue(id,operation);
		}
		
	});

	$("#duration").click(function(e){
		e.preventDefault();
		var duration = $(this).val().toLowerCase();
		$("#label-discounted-price").text("Discounted "+duration.substr(0,1).toUpperCase() + duration.substr(1)+" Price");
	});

	function subs_continue(id,operation){
		$.ajax({
			url: "/editSubscription",       
			type: "post",
			data: { sid: id, op: operation},
			beforeSend: function(){
				// console.log(category);
			}
			}).done(function(data){
				if( operation == "delete" ){
					$("div[data-num='"+id+"']").fadeOut(200, "linear", function(){});
				}else{

					// console.log(data["currency"]);

					$("#settings_form_subscription").fadeOut();


					$("#settings_form_subscription input[name='name']").val(data["name"]);
					$("#settings_form_subscription input[name='price']").val(data["price"]);
					$("#settings_form_subscription input[name='discounted_price']").val(data["discounted_price"]);
					$("#settings_form_subscription input[name='st_discounted_price']").val(data["st_discounted_price"]);
					$("#settings_form_subscription input[name='blogs_limit']").val(data["blogs_limit"]);
					$("#settings_form_subscription input[name='max_location']").val(data["max_location"]);
					$("#settings_form_subscription input[name='max_categories']").val(data["max_categories"]);

					$("#settings_form_subscription #duration option[value='"+data["duration"]+"']").attr("selected", "selected");
					$("#settings_form_subscription #currency option[value='"+data["currency"]+"']").attr("selected", "selected");
					$("#subscription-title-option").text("Edit Subscription - "+data["name"].toUpperCase());
					
					$("#hidden_num").attr("name", "num");
					$("#hidden_num").val(data["id"]);

					$("#btn-create-subscription").val("Save");
					$("#btn-cancel-edit").show();
					$("#settings_form_subscription").fadeIn();
					validate_prices();
					// If the user cancels 
					$("#btn-cancel-edit").click(function(e){
						e.preventDefault();
						$("#settings_form_subscription").fadeOut();
						$("#btn-cancel-edit").hide();
						$("#settings_form_subscription input").val("");
						$("#btn-create-subscription").val("Create");
						$("#btn-cancel-edit").fadeOut();
						$("#subscription-title-option").text("Create new subscription");
						$("#settings_form_subscription").fadeIn();
						$("#hidden_num").removeAttr("name");
						$("#hidden_num").val("");

					})
				}
				// console.log(data);
			}); 
	}

	// js for category management
	$('.btn-add-category').click(function(e){
		e.preventDefault();
		$("#table-categories tbody").prepend("<tr><td><input type='text' class='cat-input-text' placeholder='Category name' name='name'><span class='category-name'></span></td><td><a href='#' class='bs-btn btn-info save-category'>Save</a> <a href='#' class='bs-btn btn-danger cancel-category'>Cancel</a> </td></tr>");
	
		$('a.cancel-category').click(function(e){
			e.preventDefault();
			$(this).parent('td').parent('tr').fadeOut(function(){
				$(this).remove();
			});
		});

		$('a.save-category').click(function(e){
			e.preventDefault();
			$(this).attr("class", "bs-btn btn-info");
			var str = $.trim(generateString(20));
			$(this).parent("td").prev("td").parent("tr").attr("data-close", str);
			var obj = $(this).parent("td").prev("td").children("input[name='name']");
			var name = $.trim(obj.val());

			if( name=="" || name==null || name==undefined ){
				$("tr[data-close='"+str+"']").append("<td><span class='alert alert-error' id='"+str+"'>Please provide valid category name.</span></td>");
				$("#"+str).parent("td").fadeOut(3400, "linear", function(){
					$(this).remove();
				});
			}else{
				$("tr[data-close='"+str+"']").fadeOut();
				$("tr[data-close='"+str+"']").remove();

				$.ajax(
				{
					url: "/categoryAjax",       
					type: "post",
					data: { name: name, op: 'add' },
					beforeSend: function()
					{
						// console.log(name);
					}


				})
				.done(function(data)
				{
					$("#table-categories tbody").prepend('<tr data-id="'+data.id+'"><td><span class="category-name">'+data.name+'</span></td><td><a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="editCategory($(this))" data-id="'+data.id+'">Edit</a> <a href="javascript:void(0)" onclick="deleteCategory($(this))" data-id="'+data.id+'" class="bs-btn btn-danger btn-delete-category" data-id="'+data.id+'">Delete</a></td></tr>');
				});
			}
			$(this).attr("class", "bs-btn btn-info save-category");
		});

	});
	
	// delete category
	$(".btn-delete-category").on('click', function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		$.ajax({
			url: "/categoryAjax",
			type: "post",
			data: { id: id, op: 'delete' },
			beforeSend: function(){
				// console.log(id);
			}
		}).done(function(data){
			if(data == "deleted"){
				$("tr[data-id='"+id+"']").fadeOut(function(){
					$(this).remove();
				});
			}
		});
	});

});


function cancelCategory(){
	
}

function editCategory(obj){
	var id = obj.attr("data-id");
	var name = obj.parent("td").prev("td").children("span").text();
	// obj.parent("td").prev("td").attr("data-close", str);

	obj.parent("td").prev("td").fadeOut();
	obj.parent("td").fadeOut();

	var x = 0;
	$("tr[data-id='"+id+"']").append("<td><input type='text' class='cat-input-text' value='"+name+"' placeholder='Category name' name='name'><span class='category-name'></span></td><td><a href='#' class='bs-btn btn-info save-category'>Save</a> <a href='#' class='bs-btn btn-danger cancel-category'>Cancel</a></td>");
	
	$('a.save-category').click(function(e){
		e.preventDefault();
		var str = $.trim(generateString(20));
		$(this).parent("td").prev("td").parent("tr").attr("data-close", str);
		var obj = $(this).parent("td").prev("td").children("input[name='name']");
		var name = $.trim(obj.val());

		if( name=="" || name==null || name==undefined ){
			$("tr[data-close='"+str+"']").append("<td><span class='alert alert-error' id='"+str+"'>Please provide valid category name.</span></td>");
			$("#"+str).parent("td").fadeOut(3400, "linear", function(){
				$(this).remove();
			});
		}else{
			$("tr[data-close='"+str+"']").fadeOut();
			$("tr[data-close='"+str+"']").remove();

			$.ajax(
			{
				url: "/categoryAjax",       
				type: "post",
				data: { name: name, op: 'edit', id: id },
				beforeSend: function()
				{
					// console.log(name);
				}


			})
			.done(function(data)
			{
				$("#table-categories tbody").prepend('<tr data-id="'+data.id+'"><td><span class="category-name">'+data.name+'</span></td><td><a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="editCategory($(this))" data-id="'+data.id+'">Edit</a> <a href="javascript:void(0)" onclick="deleteCategory($(this))" data-id="'+data.id+'" class="bs-btn btn-danger btn-delete-category" data-id="'+data.id+'">Delete</a></td></tr>');
			});
		}
	});

	// if user cancels delete option

	$('a.cancel-category').click(function(e){
		e.preventDefault();
		$(this).parent('td').next("td").fadeOut(function(){
			$(this).remove();
		});
		$(this).parent('td').prev("td").fadeOut(function(){
			$(this).remove();
		});
		$(this).parent('td').fadeOut(function(){
			$(this).remove();
			obj.parent("td").prev("td").fadeIn();
			obj.parent("td").fadeIn();
		});
	});
}

function deleteCategory(obj){
	var id = obj.attr("data-id");
	$.ajax({
		url: "/categoryAjax",
		type: "post",
		data: { id: id, op: 'delete' },
		beforeSend: function(){
			// console.log(id);
		}
	}).done(function(data){
		if(data == "deleted"){
			$("tr[data-id='"+id+"']").fadeOut(function(){
				$(this).remove();
			});
		}
	});
}

function generateString(len)
{
    var text = " ";

    var charset = "SUPERCALIFRAGILISTICEXPIALIDOCIOUSpneumonoultramicroscopicsilicovolcanoconiosisTheQuickBrownFoxJumpsOverTHeLazyDog1234567890";

    for( var i=0; i < len; i++ )
        text += charset.charAt(Math.floor(Math.random() * charset.length));

    return text;
}

function readURL(obj) {
	var name = obj.attr("name");
	// console.log(name);
	// console.log(obj);
	if (obj.files && obj.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function (e) {
	        $('#img-render-'+name).attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(obj.files[0]);
	}
}

function showPreview(e) {
    var $input = $(this);
    var name = $(this).attr("name");
    // console.log(name);
    var inputFiles = this.files;
    if(inputFiles == undefined || inputFiles.length == 0) return;
    var inputFile = inputFiles[0];

    var reader = new FileReader();
    reader.onload = function(event) {
        $("#img-render-"+name).attr("src", event.target.result);
    };
    reader.onerror = function(event) {
        alert("I AM ERROR: " + event.target.error.code);
    };
    reader.readAsDataURL(inputFile);
}

//admin_settings_socialmedia functions

$('.social-link').click(function(e){
	e.preventDefault();
    var placeholder = $(this).attr('data-placeholder');
    var value   =   $(this).attr('data-value');
    var socialtype = $(this).data('socialtype');
    // console.log(socialtype);

    //place the data-socialtype to the appended input
    // if( value == "" ){
    //     $('.social-textfield').html('<input type="url" class="text-input-grey full" name="socialinput" placeholder="'+placeholder+'" required> <button type="submit" class="bs-btn btn-info save-social">Save</button>');
    // 	$('.save-social').click(function(e){
    //         e.preventDefault();
    //         socialaction($(this));
    //     });
    // } else {
    //     $('.social-textfield').html('<input type="url" class="text-input-grey full" name="socialinput" placeholder="'+placeholder+'" value="'+value+'" required> <a href = "#" class="bs-btn btn-info save-social" data-socialtype="'+socialtype+'">Save</a>');
    //     $('a.save-social').click(function(e){
    //         e.preventDefault();
    //         socialaction($(this));
    //     });
    // }

    $('.social-textfield').html('<input type="url" class="text-input-grey full" name="socialinput" placeholder="'+placeholder+'" value="'+value+'" required> <a href = "#" class="bs-btn btn-info save-social" data-socialtype="'+socialtype+'">Save</a>');
    $('a.save-social').click(function(e){
        e.preventDefault();
        socialaction($(this));
    });

    });

function socialaction(obj){
    var str = $.trim(generateString(20));
    var socialLink = $.trim(obj.prev('input').val());

    var socialtype   =   obj.data('socialtype');

  	if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(socialLink)) {
        $('.social-textfield').children('input').fadeOut();

        $('.social-textfield').children('a').fadeOut();

        $.ajax(
            {
                url: "/socialmediaAjax",
                type: "put",
                data: { socialLink: socialLink, socialtype: socialtype},
                beforeSend: function()
                {
                    // console.log(socialLink+' '+socialtype);
                }
            })
            .done(function(data)
            {
                $('[name="socialinput"]').val('static value');
                $('.social-textfield').append('<span style="color:black;font-weight:normal;" class="alert alert-success" id="'+str+'">'+socialtype+' link changed to '+socialLink+'</span>');
                $("#"+str).fadeOut(6500, "linear", function(){
                    $(this).remove();
                });
            });
    }else{
    	$('.social-textfield').append('<span class="alert alert-error" id="'+str+'">Please provide valid link</span>');
        $("#"+str).fadeOut(3400, "linear", function(){
           $(this).remove();
        });
    }
}

$(function(){
    $("#footerlogo, #headerlogo, #btn-business-settings-logo, #btn-blog-settings-logo, #btn-editblog-settings-logo, #btn-filecoupon-settings-logo, #btn-business-settings-profilebanner").change(showPreview);
});

$('.btn-add-blog').click(function(){
    $('#addblog').css('display', 'block');
    $('#editblog').css('display', 'none');
});

$('.btn-delete-blog').click(function(){

	if(confirm('Are you sure you want to delete this blog?')){
	      		var id = $(this).attr('data-id');
	      		var str = $.trim(generateString(20));
	    	$.ajax({
		        
		        url: '/deleteBlogAjax',
		        type: "DELETE",
		        data: { id: id },
				dataType 	: 'json',
				encode      : true
	 	
	 	   }).done(function(data){
	    	
	    	if(data.status == 'deleted') {

	    		$("tr[data-id='"+id+"']").fadeOut(function(){
					$(this).remove();
				});

	    		$("tr[data-id='"+id+"']").append('<td><center><span class="alert alert-success" id="'+str+'" style="color:green">A Blog Post has been deleted</span></center><br></td>');
					$("#"+str).fadeOut(2000, "linear", function(){
	                	$(this).remove();
	        		});	
	    	
	    	} else {
	    		$('#addblog').prepend('<center><span class="alert alert-error" id="'+str+'" style="font-size:20px;color:red">We are having a problem saving your blog</span></center><br>');
	    	}
	    
	    });
	}
});

function deleteBlog(obj) {
if(confirm('Are you sure you want to delete this blog?')){
	var id = obj.attr('data-id');
    var str = $.trim(generateString(20));
   

    $.ajax({
        url: 'deleteBlogAjax',
        type: "DELETE",
        data: { id: id },
		dataType 	: 'json',
		encode      : true
    }).done(function(data){
    	if(data.status == 'deleted') {

    		$("tr[data-id='"+id+"']").fadeOut(function(){
				obj.remove();
			});

    		$("tr[data-id='"+id+"']").append('<td><center><span class="alert alert-success" id="'+str+'" style="color:green">A Blog Post has been deleted</span></center><br></td>');
				$("#"+str).fadeOut(2000, "linear", function(){
                	obj.remove();
        		});	
    	
    	} else {
    		$('#addblog').prepend('<center><span class="alert alert-error" id="'+str+'" style="font-size:20px;color:red">We are having a problem saving your blog</span></center><br>');
    	}
	});
}
}

function editBlog(obj) {
    var id = obj.attr("data-id");
    $("tr[data-id='"+id+"']").fadeOut();

	console.log("last-click-id="+id);

	console.log("cancel-btn="+$("#cancel-blog-edit").attr("data-id"));
	console.log("display= "+$("#cancel-blog-edit").css("display"));
	
	if($("#cancel-blog-edit").css("display")=="inline-block"){

		var tae = $("#cancel-blog-edit").attr("data-id");
		$("tr[data-id='"+tae+"']").fadeIn();
	}

    $.ajax({
        url: "/blogAjax",
        type: "get",
        data: { id: id },
        beforeSend: function(){
            console.log(id);
        }
    }).done(function(data){
        $('#editblog').css('display', 'block');
        $('#addblog').css('display', 'none');
        $('#titleedit').val(data['title']);
        $('#facebookedit').val(data['facebook']);
        $('#googleedit').val(data['google']);
        $('#twitteredit').val(data['twitter']);
        $('#linkedinedit').val(data['linkedin']);
        $('#img-render-blogheaderimageedit').attr('src', data['blogheaderimage']);
        $('#cancel-blog-edit').attr('data-id', data['id']);
        $('#cancel-blog-edit').attr('data-title', data['title']);
        $('#editblogurl').val(data['slug']);
        
        $(document).ready(
            function()
            {
                $('#redactorplaceholder').html('<textarea id="redactor2" name="content">'+ data['body'] +'</textarea>');
                var buttons = ['formatting', '|', 'bold', 'italic', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'image', 'video', 'file', 'link', '|', 'horizontalrule'];
                $('#redactor2').redactor({
                    focus: true,
                    buttons: buttons,
                    buttonsCustom: {
                        button1: {
                            title: 'Button',
                            callback: testButton
                        }
                    }
                });
            });

    });
}

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

$(document).ready(function() {

	// process the form
	$('#addBlogForm').submit(function(event) {

          var formData = new FormData($('#addBlogForm')[0]);
          // var token = $('#addBlogForm > input[name="_token"]').val();
          // formData.append('_token',token);
          var str = $.trim(generateString(20));

               $.ajax({
                      url: '/addBlogAjax',  //Server script to process data
                      type: 'POST',
                      xhr: function() {  // Custom XMLHttpRequest
                          var myXhr = $.ajaxSettings.xhr();
                          if(myXhr.upload){ // Check if upload property exists
                              myXhr.upload.addEventListener('progress',progressHandler, false); // For handling the progress of the upload
                          }
                          return myXhr;
                      },
                      //Ajax events
                      // beforeSend: beforeSendHandler,
                      success: completeHandler,
                      //error: errorHandler,

                      // Form data
                      data: formData,
                      
                      //Options to tell jQuery not to process data or worry about content-type.
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType 	: 'json', // what type of data do we expect back from the server
                  		encode	: true
                  });
            
          return false;

          function beforeSendHandler()
          {
            $('#addblog').fadeOut(500, 'linear');
          }
         
          function progressHandler(e){
              if(e.lengthComputable){
                 $('.meter').width(Math.floor(e.loaded/e.total*100) + '%');
              }
          }  

          function completeHandler(e)
          {
             if(e.status == 'saved'){
             	$('#addblog').fadeOut(500, 'linear');
				$('#addblog').prepend('<center><span class="alert alert-success" id="'+str+'" style="font-size:20px;color:green">New Blog Post has been added</span></center><br>');
				$("#"+str).fadeOut(2000, "linear", function(){
                	$(this).remove();
        		});	

        		$("#table-categories tbody").prepend('<tr data-id="'+e.id+'"><td><span class="category-name">'+e.title+'</span></td><td><a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="editBlog($(this))" data-id="'+e.id+'">Edit</a> <a href="javascript:void(0)" data-id="'+e.id+'" onclick="deleteBlog($(this))" class="bs-btn btn-danger btn-delete-blog" data-id="'+e.id+'">Delete</a></td></tr>');

        		$('#addTitle').val('');
				$('#addFacebook').val('');
				$('#addGoogle').val('');
				$('#addTwitter').val('');
				$('#addLinkedin').val('');
				$('#img-render-blogheaderimage').attr('src', '');
				$('#btn-blog-settings-logo').val('');

			} else {
				$('#addblog').prepend('<center><span class="alert alert-error" id="'+str+'" style="font-size:20px;color:red">We are having a problem saving your blog</span></center><br>');
			}
          }   
	});

});

$(document).ready(function(){
// js for stars rating
	$("div.rating-stars.star").click(function(){
		var x = $(this).attr("data-rated");

		var id = parseInt($(this).attr("data-star-id"));

		$("#fi-rating").val(id);

		for(var y=id; y>=1; y--){
			$("div[data-star-id='"+y+"']").attr("class", "rating-stars star rated");
			$("div[data-star-id='"+y+"']").attr("data-rated", "true");
		}
		var id2 = id+1;
		for(var z = id2; z<=5; z++){
			$("div[data-star-id='"+z+"']").attr("class", "rating-stars star");
			$("div[data-star-id='"+z+"']").attr("data-rated", "false");
		}
	});

	$("div.rating-stars.star").mouseenter(function(){
		var x = $(this).attr("data-rated");

		var id = parseInt($(this).attr("data-star-id"));

		for(var y=id; y>=1; y--){
			$("div[data-star-id='"+y+"']").attr("class", "rating-stars star rated");
		}
		var id2 = id+1;
		for(var z = id2; z<=5; z++){
			$("div[data-star-id='"+z+"']").attr("class", "rating-stars star");
		}
	});

	$("div.rating-stars.star").mouseout(function(){
		$("div.rating-stars.star[data-rated='false']").each(function(){
			$(this).attr("class", "rating-stars star");
		});

		$("div.rating-stars.star[data-rated='true']").each(function(){
			$(this).attr("class", "rating-stars star rated");
		});
	});


// js for manage commissions
	
	$(".btn-edit-commission").click(function(e){
		editCommission($(this));
	});

	

	function editCommission(obj){
		if(obj.parent("td").prev("td").children("span.edit-commission").is(":visible")){
			return false;
		}

		var id = obj.attr("data-id");
		var name = obj.parent("td").prev("td").children("span:first").html();

		var val =obj.parent("td").prev("td[data-id='td-editable"+id+"']").children("span").text();
		obj.parent("td").prev("td[data-id='td-editable"+id+"']").children("span").fadeOut();

		var x = 0;
		var str = $.trim(generateString(20));


		$("tr[data-id='"+id+"'] td[data-id='td-editable"+id+"']").append('<span class="edit-commission" data-close="'+str+'"><input type="text" class="cat-input-text half inline" value="'+val+'" data-type="number" name="commission" required="required" id="commission" data-id="'+id+'"> <a href="javascript:void(0)" class="bs-btn btn-info save-commission">Save</a> <a href="javascript:void(0)" class="bs-btn btn-danger cancel-commission" data-close="'+str+'">Cancel</a></span>');
		
		// Cancel Commission Edit
		$(".cancel-commission").click(function(e){
			var str =$(this).attr("data-close");

			$("span[data-close='"+str+"']").fadeOut(function(){
				$(this).prev("span").fadeIn();
				$(this).remove();
			});
		});

		// Save Editted Commission
		$(".save-commission").click(function(){
			var id = $(this).prev("input").attr("data-id");
			var oldcommissioon = $(this).prev("input").parent("span").prev("span").text();
			var newcommission = $(this).prev("input").val();
			var close = $(this).next("a").attr("data-close");

			$.ajax(
			{
				url: "/commissionAjax",       
				type: "post",
				data: { commission: newcommission, id: id }
			})
			.done(function(data)
			{
				$("span[data-close='"+close+"']").fadeOut(function(){
					if(data=="Changes saved."){
						$(this).prev("span").html(newcommission);
					}else{
						alert(data);
						$(this).prev("span").html(newcommission);
					}
					$(this).prev("span").fadeIn();
					$(this).remove();
				});
			});
		});

		onlynumbers($("input[data-type='number']"));
	}

	function onlynumbers(obj){
		obj.keydown(function(event) {
        // Allow: backspace, delete, tab, escape, enter and .
	        if ( $.inArray(event.keyCode,[46,8,9,27,13,190]) !== -1 ||
	             // Allow: Ctrl+A
	            (event.keyCode == 65 && event.ctrlKey === true) || 
	             // Allow: home, end, left, right
	            (event.keyCode >= 35 && event.keyCode <= 39)) {
	                 // let it happen, don't do anything
	                 return;
	        }
	        else {
	            // Ensure that it is a number and stop the keypress
	            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
	                event.preventDefault(); 
	            }   
	        }
		});
	}

});

function cancelBlog() {

	$('#addblog').fadeOut(500, 'linear');
	$('#editblog').fadeOut(500, 'linear');
	}

$('#cancel-blog-edit').click(function(){
	var id = $('#cancel-blog-edit').attr('data-id');
	var title = $('#cancel-blog-edit').attr('data-title');
	
	if($("#cancel-blog-edit").css("display")=="inline-block"){
		var id = $("#cancel-blog-edit").attr("data-id");
		$("tr[data-id='"+id+"']").fadeIn(function(){
					// obj.remove();
		});
	}
});

$(document).ready(function() {

	// process the form
	$('#editBlogForm').submit(function(event) {
		var id = $('#cancel-blog-edit').attr('data-id');
          var formData = new FormData($('#editBlogForm')[0]);
          var token = $('#addBlogForm > input[name="_token"]').val();
          formData.append('_token',token);
          formData.append('id', id);

          var str = $.trim(generateString(20));
          
               $.ajax({
                      url: '/updateBlogAjax',  //Server script to process data
                      type: 'post',
                      xhr: function() {  // Custom XMLHttpRequest
                          var myXhr = $.ajaxSettings.xhr();
                          if(myXhr.upload){ // Check if upload property exists
                              myXhr.upload.addEventListener('progress',progressHandler, false); // For handling the progress of the upload
                          }
                          return myXhr;
                      },
                      //Ajax events
                      // beforeSend: beforeSendHandler,
                      success: completeHandler,
                      error: errorHandler,

                      // Form data
                      data: formData,
                      
                      //Options to tell jQuery not to process data or worry about content-type.
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType 	: 'json', // what type of data do we expect back from the server
                  		encode	: true
                  });
            
          return false;

          function completeHandler(e)
          {
             if(e.status == 'saved'){
             	$('#editblog').fadeOut(500, 'linear');
				$('#editblog').prepend('<center><span class="alert alert-success" id="'+str+'" style="font-size:20px;color:green">New Blog Post has been added</span></center><br>');
				$("#"+str).fadeOut(2000, "linear", function(){
                	$(this).remove();
        		});	

        		$("#table-categories tbody").prepend('<tr data-id="'+e.id+'"><td><span class="category-name">'+e.title+'</span></td><td><a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="editBlog($(this))" data-id="'+e.id+'">Edit</a> <a href="javascript:void(0)" data-id="'+e.id+'" onclick="deleteBlog($(this))" class="bs-btn btn-danger btn-delete-blog" data-id="'+e.id+'">Delete</a></td></tr>');

        		$('#titleedit').val('');
				$('#facebookedit').val('');
				$('#googleedit').val('');
				$('#twitteredit').val('');
				$('#linkedinedit').val('');
				$('#img-render-blogheaderimageedit').attr('src', '');
				$('#btn-editblog-settings-logo').val('');

			} else {
				$('#editblog').prepend('<center><span class="alert alert-error" id="'+str+'" style="font-size:20px;color:red">We are having a problem saving your blog</span></center><br>');
			}
          }
           function beforeSendHandler()
          {

          }
         
          function progressHandler(e){
              if(e.lengthComputable){
                 $('.meter').width(Math.floor(e.loaded/e.total*100) + '%');
              }
          }  
          function errorHandler(e){
          	console.log(e);
          }   
	});

	
	$("#logintosendreview").click(function(e){
		e.preventDefault();
		jQuery('#login-form').toggle();
		$("#login-form input[name='email']").focus();
		jQuery('#register-form').hide();
	});


});

	function approveReview(obj){
		var id =  obj.data('id');

		$.ajax(
			{
				url: "/approveReviewAjax",       
				type: "post",
				data: { id: id }
			})
		.done(function(data){
			if(data == 'approved')
			{
				$('#'+id+'-approve').css('display', 'none');
				$('#'+id+'-disapprove').css('display', '');
				
			}
		});
	}

	function disapproveReview(obj){
		var id = obj.data('id');
		$.ajax(
			{
				url: "/disapproveReviewAjax",       
				type: "post",
				data: { id: id }
			})
		.done(function(data){
			if(data == 'disapproved')
			{
				$('#'+id+'-disapprove').css('display', 'none');
				$('#'+id+'-approve').css('display', '');
			}
		});
	}

	$(document).on("click", "#linkReview", function(){
		$(".company-tabs-review").click();
	});

	$('#add_new_blog').click(function(){
		$('#add_blog_block').css('display', '');
	});

	$('#cancel_add_blog').click(function(){
		$('#add_blog_block').css('display', 'none');
	});

	$('#btnchoosefiles').click(function(){
		$('#choosefiles').trigger('click');
	});

	$('#add_new_photo').click(function(){
		$('#photostouploadpanel').css('display', '');
		$('#slider2_container').css('display', 'none');
	});

	$('#choosefiles').change(function(){
		$('#addphotosubmit').trigger('click');
	});

	$('#closemanagephotopanel').click(function(){
		$('#photostouploadpanel').css('display', 'none');
		$('#slider2_container').css('display', '');
	});

	$(document).ready(function() {

	// process the form
	$('#photogalleryform').submit(function(event) {
		event.preventDefault();
          var formData = new FormData($('#photogalleryform')[0]);
          var token = $('#photogalleryform > input[name="_token"]').val();
          formData.append('_token',token);

               $.ajax({
                      url: '/addphoto',  //Server script to process data
                      type: 'post',
                      // xhr: function() {  // Custom XMLHttpRequest
                      //     var myXhr = $.ajaxSettings.xhr();
                      //     if(myXhr.upload){ // Check if upload property exists
                      //         myXhr.upload.addEventListener('progress',progressHandler, false); // For handling the progress of the upload
                      //     }
                      //     return myXhr;
                      // },
                      //Ajax events
                      // beforeSend: beforeSendHandler,
                      success: completeHandler,
                      error: errorHandler,
                      // Form data
                      data: formData,
                      
                      //Options to tell jQuery not to process data or worry about content-type.
                      cache: false,
                      contentType: false,
                      processData: false,
                      dataType 	: 'json', // what type of data do we expect back from the server
                  		encode	: true
                  });

		          function completeHandler(e)
		          {
		          	// $.each(e, function(index, value){
		          	// 	$('#listofphotos').append('<div class="box2"><span class="remove-photo">x</span><img src="../../images/photogallery/'+e.filenames[index]+'" class="uploaded-img"></div>');
		          	// });
		         	console.log(e);
		         	
		         	var fucking_json = e;
					var fucking_result = [];

		         	for(var i in fucking_json)
    					fucking_result.push([i, fucking_json [i]]);

		         	$.each(e, function(index, value){
		          		
		          	});

		         	for(var j = 0; j<fucking_result.length; j++){
		         		$('#listofphotos').append('<div class="box2" id="'+fucking_result[j][0]+'"><span id="'+fucking_result[j][0]+'" class="remove-photo" onclick="confirmPhotoDelete('+fucking_result[j][0]+')">x</span><img src="../../images/photogallery/'+fucking_result[j][1]+'" class="uploaded-img"></div>');
		         	}

		          }
         
          // function progressHandler(e){
          //     if(e.lengthComputable){
          //        $('.meter').width(Math.floor(e.loaded/e.total*100) + '%');
          //     }
          // }  
         
          function errorHandler(e){
          	console.log(e);
          }   
	});

});

 jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 3,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider2 = new $JssorSlider$("slider2_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider2.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider2.$SetScaleWidth(Math.min(parentWidth, 600));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });

	function confirmPhotoDelete(id)
	{
		var photoid = id;
		var decision = confirm('Are you sure you want to delete this photo? This cannot be undone');
		if(decision == true){
			$.ajax({
                      url: '/deletephoto',  //Server script to process data
                      type: 'post',
                      data: {id: id},
                  }).done(function(data){
                  		$('#'+photoid).fadeOut();
                  });
		}
	}
