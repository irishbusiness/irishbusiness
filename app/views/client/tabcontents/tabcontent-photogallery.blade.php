<div id="company-tabs-photogallery" class="company-tabs-content">
	<div class="blog block">
		@if( isOwner($branch->business->slug) || isAdmin() )
		<a id="add_new_photo" class="a-btn button-2-colorful add-coupon">Manage Photos</a>
		<br/><br/><br/>
		<div id="photostouploadpanel" style="display:none;border: 2px dashed gray;margin-left:20px;">
		<center>
		<br/>
			<input type="button" id="btnchoosefiles" class="a-btn button-2-blue" value="Choose image/s to upload">
		<br/><br/>
		
			<div id="listofphotos">
            {{ Form::open([ 'method' => 'post', 'files' => true, 'multiple' => 'true', 'id' => 'photogalleryform']) }}
                <input type="hidden" name="branch_id" value="{{ $brID }}">
                <input type="file" name="choosefiles[]" id="choosefiles" multiple="" style="display:none">
                <input type="submit" id="addphotosubmit" class="a-btn button-2-colorful addphoto" value="Save" style="display:none">
            {{ Form::close() }}

            @if(count($photos)>0)
                @foreach($photos as $key => $photo)
                    <div class="box2" id="{{ $photo->id }}"><span class="remove-photo" id="{{ $photo->id }}" onclick="confirmPhotoDelete({{ $photo->id }})">x</span><img src="{{ URL::asset('images/photogallery/'.$photo->filepath) }}" class="uploaded-img"></div>
                @endforeach
            @endif
            </div>
            </center>
            <!-- <hr style="border: 1px dashed gray"/> --><br/>
            <a href="" class="a-btn button-2-colorful addphoto-btn">Save</a>
            <a href="javascript:void(0)" id="closemanagephotopanel" class="a-btn button-2-red">Close</a>
            <br/><br/>
		</div>
        @endif
	</div>

  
  <br/>
  <center>
  @if(count($photos)>0)
    <!-- Jssor Slider Begin -->
    <div id="slider2_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 1000px; overflow: hidden; ">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" class="gallery_photo_div" style="cursor: move; position: absolute; left: 0px; top: 60px; width: 600px; height: 300px; overflow: hidden;" id="photoshere">
            @foreach($photos as $photo)
            <div>
                <img u="image" src="{{ URL::asset('images/photogallery/'.$photo->filepath) }}" class="gallery_photo" />
                <!-- <img u="thumb" src="../img/photography/thumb-002.jpg" /> -->
            </div>
            @endforeach
        </div>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora02l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora02r" style="width: 55px; height: 55px; top: 123px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->
        
        
        <a style="display: none" href="http://www.jssor.com">javascript</a>
    </div>
    <!-- Jssor Slider End -->
    @else
    <!-- Jssor Slider Begin -->
    <div id="slider2_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow:hidden; ">
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #rgba(153, 143, 143, 0.16); top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" class="gallery_photo_div" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; overflow:hidden;" id="photoshere">
            <div>
                @if( !isAdmin() && isOwner($branch->business->slug) )
                    <img class="slider-no-image" u="image" src="images/no_photo_available.jpg" />
                @endif
            </div>
        </div>
    </div>
    <!-- Jssor Slider End -->
	@endif
    </center>
</div>
