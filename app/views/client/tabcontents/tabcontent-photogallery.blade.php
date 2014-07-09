<div id="company-tabs-photogallery" class="company-tabs-content">
	<div class="blog block">
		@if( isOwner($branch->business->slug) || isAdmin() )
		<a id="add_new_photo" class="a-btn button-2-colorful add-coupon">Add Photos</a><br>
		{{ Form::open([ 'method' => 'post', 'files' => true, 'multiple' => '', 'id' => 'photogalleryform']) }}
			<input type="file" id="choosefiles" multiple="" style="display:none">
			<input type="submit" id="addphotosubmit" style="display:none">
		</form>
        <div class="content-container" id="add_new_photo_block" style="display:none">
		    <div class="blog-post block">
		        <div class="block-title marginize">
		            <h1>Uploading Photos</h1>
		        </div>
		    </div>
		</div>
        @endif
	</div>
    <script type="text/javascript" src="../scripts/jssor.core.js"></script>
    <script type="text/javascript" src="../scripts/jssor.utils.js"></script>
    <script type="text/javascript" src="../scripts/jssor.slider.mini.js"></script>
  
  <br/>
  <center>
    <!-- Jssor Slider Begin -->
    <div id="slider2_container" style="position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; ">

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
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; overflow: hidden;" id="photoshere">
            <div>
                <img u="image" src="../img/photography/002.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-002.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/003.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-003.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/004.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-004.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/005.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-005.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/006.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-006.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/007.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-007.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/008.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-008.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/009.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-009.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/010.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-010.jpg" /> -->
            </div>
            <div>
                <img u="image" src="../img/photography/011.jpg" />
                <!-- <img u="thumb" src="../img/photography/thumb-011.jpg" /> -->
            </div>
        </div>
        <!-- Arrow Left -->
        <!-- <span u="arrowleft" class="jssora02l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
        </span> -->
        <!-- Arrow Right -->
      <!--   <span u="arrowright" class="jssora02r" style="width: 55px; height: 55px; top: 123px; right: 8px">
        </span> -->
        <!-- Arrow Navigator Skin End -->
        
        <!-- ThumbnailNavigator Skin Begin -->
        <div u="thumbnavigator" class="jssort03" style="position: absolute; width: 600px; height: 60px; left:0px; bottom: 0px;">
            <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 62px; HEIGHT: 32px; TOP: 0; LEFT: 0;">
                    <div class=w><ThumbnailTemplate style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate></div>
                    <div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0">
                    </div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- ThumbnailNavigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">javascript</a>
    </div>
    <!-- Jssor Slider End -->
    </center>
</div>
