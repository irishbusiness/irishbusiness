@extends('searchpartial.default')
@section('content')
<div class="row">
	<div class="large-12 columns">
		<div class="panel">
			{{ Form::open(array('action' => 'CategoriesController@store')) }}
			<div class="row">
				<div class="large-6 columns">
					{{ Form::label('name', 'Add Category') }}
					{{ Form::text('name','', [
					"placeholder" => "category"]) }}
					{{$errors->first('name','<span class="error">:message</span>')}}
				</div>
				<div class="large-offset-6 columns"></div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					{{ Form::submit('Add',['class' => 'button radius tiny'])  }}						
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>
</div>
<div class="row" style="background:#e2e2e2">
	<br/>
	<div class="large-12 columns">
		{{ Form::open(array('action' => 'BusinessesController@store')) }}
		<div class="row">
			<div class="large-12 columns">
				{{ Form::label('businessname', 'Business Name') }}
				{{ Form::text('businessname','', [
				"placeholder" => "your business"]) }}
				{{$errors->first('businessname','<span class="error">:message</span>')}}
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{{ Form::label('address1', 'Business Address1') }}
				{{ Form::text('address1','', [
				"placeholder" => "address.."]) }}
				{{$errors->first('businessname','<span class="error">:message</span>')}}
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{{ Form::label('address2', 'Business Address2') }}
				{{ Form::text('address2','', [
				"placeholder" => "address.."]) }}
				{{$errors->first('businessname','<span class="error">:message</span>')}}
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{{ Form::label('address3', 'Business Address3') }}
				{{ Form::text('address3','', [
				"placeholder" => "address.."]) }}
				{{$errors->first('businessname','<span class="error">:message</span>')}}
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{{ Form::label('address4', 'Business Address4') }}
				{{ Form::text('address4','', [
				"placeholder" => "address.."]) }}
				{{$errors->first('businessname','<span class="error">:message</span>')}}
			</div>
		</div>
			<div class="row">
			<div class="large-12 columns">
				{{ Form::label('keywords', "Keywords (please separate keywords by a comma.)") }}
				{{ Form::text('keywords','', [
				"placeholder" => "office, airplane, house"]) }}
				{{$errors->first('businessname','<span class="error">:message</span>')}}
			</div>
		</div>
		
			<div class="row">
			<div class="large-12 columns">
				{{ Form::label('locations', "Locations Served (please separate keywords by a comma.)") }}
				{{ Form::text('locations','', [
				"placeholder" => "iraq, iran, new york"]) }}
				{{$errors->first('businessname','<span class="error">:message</span>')}}
			</div>
		</div>
		<div class="row">
			<div class="large-6 columns">
				{{ Form::select('categories',$categories,"",['id' => 'categories']) }}
			</div>
			<div class="large-offset-6 columns"></div>
		</div>
		<div class="row">
			<div class="large-12 columns showCategory">

			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				{{ Form::submit('Save',['class' => 'button radius tiny'])  }}						
			</div>
		</div>
		{{Form::close()}}

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
					console.log(category);
				}


			})
			.done(function(data)
			{

				$('.showCategory').append('<div class="category"> '+ data.name +' </div>');
				$('#categories').find('option:selected').remove();
			}) 




		}

	    			/*if (person_id>0)
	    			{	
	    				$.ajax(
			                {
			                    url: "/addtemp",       
			                    type: "post",
			                    data: { person_id: person_id},
			                    beforeSend: function()
			                    {
			                    	$('#personajax1').empty();
			                    	$('#personajax2').empty();
			                    	$('#personajax3').empty();
			                    }
			                })
			                .done(function(data)
			                {  
			                    var x=1;
			                    for(var key in data.names)
			                    {
			                    	if (x%3==0)
			                    	{
			                    		$('#personajax3').append('<div class="linkpro2 "><span id="'+ key +'"  class="foundicon-remove removePerson"></span>   ' + data.names[key] + '</div>');

			                    	}
			                    	else if(x%2==0)
			                    	{
			                    		$('#personajax2').append('<div class="linkpro2 "><span id="'+ key +'"  class="foundicon-remove removePerson"></span>   ' + data.names[key] + '</div>');
			                    	}
			                    	else
			                    	{

			                    		$('#personajax1').append('<div class="linkpro2 "><span id="'+ key +'"  class="foundicon-remove removePerson"></span>   ' + data.names[key] + '</div>');
			                    	}
			                    	
			                    	x++;
			                    	if(x==4)
			                    		x=1;
			                    }
			                   
			                    $('#person_id').find('option:selected').remove();
			                   
			                })
			                
			            return false;
			        }  */


			    });

});



</script>

@stop