@extends("client.layouts.default")

@section("actual-body-content")
        <div class="portfolio-container container-16">
        <div id="company-tabs-page" class="company-tabs-content" style="display: block;">
        <div class="portfolio-container container-24">

            <div class="blog-post block">
                <div class="block-title">
                    <h1>Add Branch</h1>
                </div>
            </div>
            {{ Form::open(array('action' => ['BusinessesController@storeBranch',$slug])) }}
             
            <div class="form-group">
                {{ Form::label('address1', 'Business Address1', ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('address1', '', [
                "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
                {{$errors->first('address1','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('address2', 'Business Address2', ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('address2', '', [
                "placeholder" => "address..", "class"=>"text-input-grey full"]) }}
                {{$errors->first('address2','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('address3', 'Business Address3', ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('address3', '', [
                "placeholder" => "address..", "class"=>"text-input-grey full"]) }}
                {{$errors->first('address3','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('address4', 'Business Address4', ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('address4', '', [
                "placeholder" => "address..", "class"=>"text-input-grey full"]) }}
                {{$errors->first('address4','<span class="alert alert-error block half">:message</span>')}}
            </div>

            <div class="thin-separator"></div>
          
            <div class="form-group">
                {{ Form::label('locations', "Locations Served (please separate keywords by a comma.)",
                ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('locations', '', [
                "placeholder" => "iraq, iran, new york", "class"=>"text-input-grey full", 'required']) }}
                {{$errors->first('locations','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('phone', "Phone",
                ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('phone', '', [
                "placeholder" => "Phone", "class"=>"text-input-grey full", 'required']) }}
                {{$errors->first('phone','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('website', "Website",
                ["class"=>"text-colorful"]) }}<br/>

                {{ Form::text('website', (isset($branch->website) ? $branch->website : ''), [
                "placeholder" => "Website", "class"=>"text-input-grey full"]) }}

                {{$errors->first('website','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('email', "Email",
                ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('email', (isset($branch) ? $branch->email : ''), [
                "placeholder" => "Email", "class"=>"text-input-grey full", 'required']) }}
                {{$errors->first('email','<span class="alert alert-error block half">:message</span>')}}
            </div>
            
            <div class="form-group">
                {{ Form::label('mon_fri', "Monday - Friday Opening Hours",
                ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('mon_fri', (isset($branch) ? $branch->mon_fri : ''), [
                "placeholder" => "Monday - Friday Opening Hours", "class"=>"text-input-grey full", 'required']) }}
                {{$errors->first('mon_fri','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('sat', "Saturday Opening Hours",
                ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('sat', (isset($branch) ? $branch->sat : ''), [
                "placeholder" => "Saturday Opening Hours", "class"=>"text-input-grey full", 'required']) }}
                {{$errors->first('sat','<span class="alert alert-error block half">:message</span>')}}
            </div>

            <div class="thin-separator"></div>
            <div class="form-group">
                {{ Form::label('facebook', "Facebook Link",
                ["class"=>"text-colorful"]) }}<br/>

                {{ Form::text('facebook', (isset($branch->facebook) ? $branch->facebook : ''), [
                "placeholder" => "Facebook Link", "class"=>"text-input-grey full"]) }}

                {{$errors->first('facebook','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('twitter', "Twitter Link",
                ["class"=>"text-colorful"]) }}<br/>

                {{ Form::text('twitter', (isset($branch->twitter) ? $branch->twitter : ''), [
                "placeholder" => "Twitter Link", "class"=>"text-input-grey full"]) }}

                {{$errors->first('twitter','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('google', "Google Link",
                ["class"=>"text-colorful"]) }}<br/>

                {{ Form::text('google', (isset($branch->google) ? $branch->google : ''), [
                "placeholder" => "Google Link", "class"=>"text-input-grey full"]) }}

                {{$errors->first('google','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group">
                {{ Form::label('linkedin', 'LinkedIn', ["class"=>"text-colorful"]) }}<br/>
                {{ Form::text('linkedin',(isset($branch) ? $branch->linkedin : ''), [
                "placeholder" => "LinkedIn", "class"=>"text-input-grey full"]) }}
                {{$errors->first('name','<span class="alert alert-error block half">:message</span>')}}
            </div>
            <div class="form-group align-right">
                {{ Form::submit('Save',['class' => 'button-2-colorful'])  }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
    @include('client.partials._sidebar')
@stop

@section('scripts')
        <!-- the long scripts -->
            
@stop