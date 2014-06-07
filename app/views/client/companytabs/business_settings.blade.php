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
        <!-- <div class="form-group">
            {{ Form::label('address1', 'Business Address1', ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('address1','', [
            "placeholder" => "address..", "class"=>"text-input-grey full"]) }}
            {{$errors->first('address1','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="form-group">
            {{ Form::label('address2', 'Business Address2', ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('address2','', [
            "placeholder" => "address..", "class"=>"text-input-grey full"]) }}
            {{$errors->first('address2','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="form-group">
            {{ Form::label('address3', 'Business Address3', ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('address3', '', ["placeholder" => "address..", "class"=>"text-input-grey full"]) }}
            {{$errors->first('address3','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="form-group">
            {{ Form::label('address4', 'Business Address4', ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('address4','', [
            "placeholder" => "address..", "class"=>"text-input-grey full"]) }}
            {{$errors->first('address4','<span class="alert alert-error block half">:message</span>')}}
        </div>
         -->
        
        <!-- <div class="form-group">
            {{ Form::label('locations', "Locations Served (please separate keywords by a comma.)",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('locations','', [
            "placeholder" => "iraq, iran, new york", "class"=>"text-input-grey full"]) }}
            {{$errors->first('locations','<span class="alert alert-error block half">:message</span>')}}
        </div>
         -->
         <!-- <div class="form-group">
            {{ Form::label('phone', "Phone",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('phone','', [
            "placeholder" => "Phone", "class"=>"text-input-grey full"]) }}
            {{$errors->first('phone','<span class="alert alert-error block half">:message</span>')}}
                 </div>
                 <div class="form-group">
            {{ Form::label('website', "Website",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('website','', [
            "placeholder" => "Website", "class"=>"text-input-grey full"]) }}
            {{$errors->first('website','<span class="alert alert-error block half">:message</span>')}}
                 </div>
                 <div class="form-group">
            {{ Form::label('email', "Email",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('email','', [
            "placeholder" => "Email", "class"=>"text-input-grey full"]) }}
            {{$errors->first('email','<span class="alert alert-error block half">:message</span>')}}
                 </div> -->
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
        
        <!-- <div class="form-group">
            {{ Form::label('mon_fri', "Monday - Friday Opening Hours",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('mon_fri', '', [
            "placeholder" => "Monday - Friday Opening Hours", "class"=>"text-input-grey full"]) }}
            {{$errors->first('mon_fri','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="form-group">
            {{ Form::label('sat', "Saturday Opening Hours",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('sat', '', [
            "placeholder" => "Saturday Opening Hours", "class"=>"text-input-grey full"]) }}
            {{$errors->first('sat','<span class="alert alert-error block half">:message</span>')}}
        </div>
         -->
        
        <!-- <div class="form-group">
            {{ Form::label('facebook', "Facebook Link",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('facebook', '', [
            "placeholder" => "Facebook Link", "class"=>"text-input-grey full"]) }}
            {{$errors->first('facebook','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="form-group">
            {{ Form::label('twitter', "Twitter Link",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('twitter', '', [
            "placeholder" => "Twitter Link", "class"=>"text-input-grey full"]) }}
            {{$errors->first('twitter','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="form-group">
            {{ Form::label('google', "Google Link",
            ["class"=>"text-colorful"]) }}<br/>
            {{ Form::text('google', '', [
            "placeholder" => "Google Link", "class"=>"text-input-grey full"]) }}
            {{$errors->first('google','<span class="alert alert-error block half">:message</span>')}}
        </div>
         -->
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
            "placeholder" => "your-business-name", "class"=>"text-input-grey full"]) }}
            {{$errors->first('slug','<span class="alert alert-error block half">:message</span>')}}
        </div>
        <div class="thin-separator"></div>
        <div class="form-group">
            {{ Form::select('categories',$categories,"",['id' => 'categories',
            'class' => 'text-input-grey full', 'required' => 'required']) }}
        </div>
        <div class="form-group">
            <div class="showCategory"></div>
        </div>
        <div class="form-group align-right">
            {{ Form::submit('Next',['class' => 'button-2-colorful'])  }}
        </div>
        {{ Form::close() }}
    </div>
</div>