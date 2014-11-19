<div id="company-tabs-page" class="company-tabs-content" style="display: block;">
    <div class="portfolio-container container-24">

        <div class="blog-post block">
            <div class="block-title">
                <h1>Business Settings</h1>
            </div>
        </div>

        {{ Form::open(array('action' => 'BusinessesController@store', 'files' => true)) }}
        <div class="form-group">
            {{ Form::label('profilebanner', "Profile Banner",
            ["class"=>"text-colorful"]) }}<br/>
            <br>
            {{ Form::file('profilebanner', ["id"=>"btn-business-settings-profilebanner"]) }}
            {{$errors->first('profilebanner','<span class="alert alert-error block half">:message</span>')}}
            <div class="render-logo-preview">
                <img src="{{ URL::asset('/images/image-not-available.png') }}" id="img-render-profilebanner">
            </div>
        </div>
       
        <div class="form-group">
            {{ Form::label('name', 'Business Name', ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('name','', [
            "placeholder" => "your business", "class"=>"text-input-grey full"]) }}
            {{$errors->first('name','<span class="alert alert-error block half">:message</span>')}}
        </div>
       
        <div class="form-group">
            {{ Form::label('business_description', "Profile Description",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::textarea('business_description','', [
            "placeholder" => "business_description", "class"=>"text-input-grey full redactor"]) }}
            {{$errors->first('business_description','<span class="alert alert-error block half">:message</span>')}}
        </div>

        <div class="form-group">
            {{ Form::label('logo', "Logo",
            ["class"=>"text-colorful"]) }}<br/>
            <br>
            {{ Form::file('logo', ["id"=>"btn-business-settings-logo"]) }}
            {{$errors->first('logo','<span class="alert alert-error block half">:message</span>')}}
            <div class="render-logo-preview">
                <img src="{{ URL::asset('/images/image-not-available.png') }}" id="img-render-logo">
            </div>
        </div>
        
        <div class="thin-separator"></div>
        <div class="form-group">
            {{ Form::label('keywords', "Primary key phrase (please separate key phrase with a comma.)",
                ["class"=>"text-colorful with-tooltip", "title" => "Note: Some words will be automatically removed because they are 
                ignored by search engines(ex. a,in,at,of, for, first, etc..)
                    and please separate words with a comma(ex. my keyword1, my keyword2, my location)" ]) }}<br/>
            {{ Form::text('keywords','', [
                "placeholder" => "Choose 2 keywords + your location", "class"=>"text-input-grey full with-tooltip",
                "title" => "Please be careful in choosing your primary key phrase. This can not be changed after saving. 
                    Also, this is what will appear to your business url. (ex. www.irishbusiness.ie/my-keyword1, my-keyword2, my-location)"
            ]) }}
            {{$errors->first('keywords','<span class="alert alert-error block half">:message</span>')}}
        </div>
        
        <div class="form-group">
            {{ Form::hidden('slug','', [
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