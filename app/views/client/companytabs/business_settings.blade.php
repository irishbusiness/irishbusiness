<div id="company-tabs-page" class="company-tabs-content" style="display: block;">
    <div class="portfolio-container container-24">

        <div class="blog-post block">
            <div class="block-title">
                <h1>Business Settings</h1>
            </div>
        </div>

        {{ Form::open(array('action' => 'BusinessesController@store', 'files' => true)) }}
        <div class="form-group">
            {{ Form::label('name', 'Business Name', ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('name','', [
            "placeholder" => "your business", "class"=>"text-input-grey full"]) }}
            {{$errors->first('name','<span class="alert alert-error block half">:message</span>')}}
        </div>
       
        <div class="form-group">
            {{ Form::label('business_description', "Business Description",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::textarea('business_description','', [
            "placeholder" => "business_description", "class"=>"text-input-grey full"]) }}
            {{$errors->first('business_description','<span class="alert alert-error block half">:message</span>')}}
        </div>

        <!-- profile description here must be a wysiwyg -->
        <div class="form-group">
            {{ Form::label('profile_description', "Profile Description",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::textarea('profile_description', '<h2>Profile Description</h2>', ["id" => "redactor"]) }}
            {{$errors->first('profile_description','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="form-group">
            {{ Form::label('logo', "Logo",
            ["class"=>"text-colorful"]) }}<br/>
            <br>
            {{ Form::file('logo', ["id"=>"btn-business-settings-logo"]) }}
            {{$errors->first('logo','<span class="alert alert-error block half">:message</span>')}}
            <div class="render-logo-preview">
                <img src="" id="img-render-logo">
            </div>
        </div>
        
       
        <div class="thin-separator"></div>
        <div class="form-group">
            {{ Form::label('keywords', "Keywords (please separate keywords by a comma.)",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('keywords','', [
            "placeholder" => "office, airplane, house", "class"=>"text-input-grey full"]) }}
            {{$errors->first('keywords','<span class="alert alert-error block half">:message</span>')}}
        </div>
        
        <div class="form-group">
            {{ Form::label('slug', "Business URL (".Request::root()."/company/your-business-name)",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('slug','', [
            "placeholder" => "(Skip this part, if this is foreign to you)", "class"=>"text-input-grey full"]) }}
            {{$errors->first('slug','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="thin-separator"></div>
        <div class="form-group">
            {{ Form::select('categories',$categories,"",['id' => 'categories',
            'class' => 'text-input-grey full', 'required' => 'required']) }}
        </div>
        <div class="form-group">
            <div class="showCategory">
                @if(Session::has("categories"))
                    <?php Session::forget("categories"); ?>                    
                @endif
            </div>
        </div>
        <div class="form-group align-right">
            {{ Form::submit('Next',['id'=>'btnNext','class' => 'button-2-colorful'])  }}
        </div>
        {{ Form::close() }}
    </div>
</div>