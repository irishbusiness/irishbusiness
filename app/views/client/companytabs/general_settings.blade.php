<div id="company-tabs-page" class="company-tabs-content" style="display: block;">
    <div class="portfolio-container container-24">

        <div class="blog-post block">
            <div class="block-title">
                <h1>General Settings</h1>
            </div>
        </div>

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