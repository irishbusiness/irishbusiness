$(document).ready(function(){
	//PURE PATH TO IMAGE GENERATING PHP FILE
	var base = $(".preview img").attr("src");
	
	//GATHER IMAGE FOR FIRST TIME
	$(".preview img").attr("src",base+'?'+$("#realtime-form").serialize());
		
	//KEYUP EVENT AND NEW IMAGE GATHER
	$("#realtime-form input,textarea").stop().keyup(function(){
		$(".preview img").attr("src",base+'?'+$("#realtime-form").serialize());	
	});

	$('#realtime-form select').change(function(){
		if( $(this).val() == 2 ){
			$('.temp1').fadeOut();
			$('#realtime-form textarea[name="companyName"]').val("FREE");
			$('#realtime-form textarea[name="companySlogan"]').val("Add another text here...");
			$('#realtime-form textarea[name="fullName"]').parent('li').css('marginTop', '50px');
		}else{
			$('.temp1').fadeIn();
			$('#realtime-form textarea[name="companyName"]').val("SALE UPTO 70% DISCOUNT");
			$('#realtime-form textarea[name="companySlogan"]').val("GREAT SAVINGS!");
			$('#realtime-form textarea[name="fullName"]').parent('li').css('marginTop', '0px');
		}

		$(".preview img").attr("src",base+'?'+$("#realtime-form").serialize());	
	});
		
	//GIVE URL TO USER
	$("#getResults").click(function(){
		$("#resultsUrl").val($(".preview img").attr("src"));
		$("#link").show("slow");
	});
	
});
