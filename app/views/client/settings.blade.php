@extends("client.layouts.default")

@section("actual-body-content")
	<div class="blog-post block">
			<div class="block-title">
				<h1>General Settings</h1>
			</div>
		</div>

		<div class="comments block">						
			<div class="comment-message">
				{{ Form::open(array('action' => 'BusinessesController@store')) }}
					<div class="form-group">
						{{ Form::label('businessname', 'Business Name', ["class"=>"text-colorful"]) }}
						{{ Form::text('businessname','', [
							"placeholder" => "your business", "class"=>"text-input-grey full"]) }}
						{{$errors->first('businessname','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::label('address1', 'Business Address1', ["class"=>"text-colorful"]) }}
						{{ Form::text('address1','', [
							"placeholder" => "address..", "class"=>"text-input-grey full"]) }}
						{{$errors->first('businessname','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::label('address2', 'Business Address2', ["class"=>"text-colorful"]) }}
						{{ Form::text('address2','', [
							"placeholder" => "address..", "class"=>"text-input-grey full"]) }}
						{{$errors->first('businessname','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::label('address3', 'Business Address3', ["class"=>"text-colorful"]) }}
						{{ Form::text('address3','', [
							"placeholder" => "address..", "class"=>"text-input-grey full"]) }}
						{{$errors->first('businessname','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::label('address4', 'Business Address4', ["class"=>"text-colorful"]) }}
						{{ Form::text('address4','', [
							"placeholder" => "address..", "class"=>"text-input-grey full"]) }}
						{{$errors->first('businessname','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::label('keywords', "Keywords (please separate keywords by a comma.)",
							 ["class"=>"text-colorful"]) }}
						{{ Form::text('keywords','', [
							"placeholder" => "office, airplane, house", "class"=>"text-input-grey full"]) }}
						{{$errors->first('businessname','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::label('locations', "Locations Served (please separate keywords by a comma.)", 
							["class"=>"text-colorful"]) }}
						{{ Form::text('locations','', [
							"placeholder" => "iraq, iran, new york", "class"=>"text-input-grey full"]) }}
						{{$errors->first('businessname','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::select('categories',$categories,"",['id' => 'categories', 
							'class' => 'text-input-grey full']) }}
					</div>
					<div class="form-group">
						<div class="showCategory"></div>
					</div>
					<div class="form-group align-right">
						{{ Form::submit('Save',['class' => 'button-2-colorful'])  }}						
					</div>
				{{ Form::close() }}

			</div>

		</div>
@stop
@section('scripts')
<script>
$(function(){
	$(document).on('change','#categories',function()
	{

		var category = $('#categories').val();

		if (category>0)
		{
			console.log(category);

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
			$("span[data-id='"+category+"']").remove();
		})
	});


});
</script>

@stop