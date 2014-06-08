<?php 
    if(!isset($businessinfo)){
        $businessinfo = new \Illuminate\Support\Collection;
        $businessinfo->id = '';
    }
?>
<div id="company-tabs-coupon" class="company-tabs-content" style="display: none;">
    <div class="portfolio-container container-24">
        <div>
            <a href="javascript:void(0)" id="upload-own-coupon">Upload your own coupon</a>
        </div>
        <div id="form-upload-coupon" style="display: none;">
            {{ Form::open(array('action' => 'BusinessesController@save_coupon', 'files' => true)) }}
                <div class="form-group">
                    {{ Form::label("filecoupon", "Upload your coupon", ["class"=>"text-colorful"]) }}
                    {{ Form::file('filecoupon', ["id"=>"btn-filecoupon-settings-logo"]) }}
                    <div class="render-logo-preview">
                        <img src="" id="img-render-filecoupon">
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::hidden("b", $businessinfo->id) }}
                    {{ Form::submit("Save", ["class"=>"button-2-colorful"]) }}
                </div>
            {{ Form::close() }}
        </div>

        <div id="coupon-generator">
            <div class="preview" style="height: auto;">
                <img src="{{ Request::root().'/'}}scripts/server-side.php" />
            </div>
                
            <form id="realtime-form" action="{{ Request::root() }}/scripts/save-coupon.php" method="post">
                <fieldset>
                    <legend>Coupon Generator</legend>
                    <ol>
                        <li class="left">
                            <fieldset>
                                <ol>
                                    <li>
                                        <label for="company-name">Text 1:</label>
                                        <input type="text" id="company-name" name="companyName" value="SALE UPTO 70% DISCOUNT" />
                                    </li>
                                    <li>
                                        <label for="company-slogan">Text 2:</label>
                                        <input type="text" id="company-slogan" name="companySlogan" value="Save upto 70% off" />
                                    </li>
                                    <li>
                                        <label for="business-address">Business address</label>
                                        <textarea id="business-address" name="businessAddress">1234 Main Street
Suite 101
City, ST 12345</textarea>
                                    </li>
                                </ol>
                            </fieldset>
                        </li>
                        <li class="right">
                            <fieldset>
                                <legend class="accessibility">Contact Information and Description</legend>
                                <ol>
                                    <li>
                                        <label for="full-name">Company name:</label>
                                        <input type="text" id="full-name" name="fullName" value="IrishBusiness.ie" />
                                    </li>
                                    <li>
                                        <label for="job-title">Company description</label>
                                        <input type="text" id="job-title" name="jobTitle" value="The Irish Business Directory" />
                                    </li>
                                    <li>
                                        <label for="primary-phone">Primary phone</label>
                                        <input type="text" id="primary-phone" name="phoneOne" value="P: 954-555-1234" />
                                    </li>
                                    <li>
                                        <label for="secondary-phone">Secondary phone</label>
                                        <input type="text" id="secondary-phone" name="phoneTwo" value="P: 954-555-5678" />
                                    </li>
                                    <li>
                                        <label for="email-address">Email address</label>
                                        <input type="text" id="email-address" name="emailAddress" value="john@company.com" />
                                    </li>
                                    <li>
                                        <label for="web-address">Web address</label>
                                        <input type="text" id="web-address" name="siteUrl" value="websiteurl.com" />
                                    </li>
                                </ol>
                            </fieldset>
                        </li> 
                    </ol>
                </fieldset>
                <a id="savecoupon" href="javascript:void(0)" class="button-2-colorfull">Submit</a>

            </form>
            <!-- <button id="getResults">Give me my url!</button> -->
            <div id="link">
                <input type="text" value="" id="resultsUrl" />
            </div>
        </div>
    </div>
</div>
    @section('scripts')
        <script>
            $("#savecoupon").on("click", function(e){
                e.preventDefault();

                console.log($("#realtime-form").serialize());
                var token = $("input[name='_token']").val();

                $.ajax({
                   type: "POST",
                   url: "/ajaxSaveCoupon?_token="+token+"&b={{ $businessinfo->id }}",
                   data: $("#realtime-form").serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                       console.log(data);
                       window.location=data;
                   }
                 });
            });

            $("#upload-own-coupon").click(function(e){
                e.preventDefault();

                if($("#coupon-generator").is(":visible")){
                    $(this).text("Cancel");
                    $("#coupon-generator").fadeOut();
                    $("#form-upload-coupon").fadeIn();
                }else{
                    $(this).text("Upload your own coupon");
                    $("#coupon-generator").fadeIn();
                    $("#form-upload-coupon").fadeOut();
                }
            });
        </script>
    @stop