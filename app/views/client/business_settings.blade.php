@extends("client.layouts.default")

@section("actual-body-content")
        @if(Session::has('flash_message'))
            <h4>{{Session::get('flash_message')}}</h4>
        @endif
                 <div class="company-tabs-wrapper">
                        <div class="zone-company-tabs zone clearfix">
                            <div class="company-tabs-container container-24">
                                <ul id="company-tabs-active" class="company-tabs">
                                    <li class="active">
                                        <a class="company-tabs-page" href="#">BUSINESS</a>
                                    </li>
                                    <li class="">
                                        <a class="company-tabs-blog" href="#">BLOG</a>
                                    </li>
                                    <li class="">
                                        <a class="company-tabs-coupon" href="#">COUPON</a>
                                    </li>
                                    @if(isset($reviews) && !is_null($reviews))
                                        @if(count($reviews))
                                        <li class="">
                                            <a class="company-tabs-review" href="#">REVIEWS</a>
                                        </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                            <!-- end of .company-tabs-container -->
                        </div>
                        <!-- end of .zone-company-tabs -->
                    </div>

        <!-- general settings tab -->
        <div class="company-content-wrapper">
            <div class="zone-company-content zone clearfix">
                <div id="company-inner-container" class="company-inner-container container-24">
                    @include('client.tabcontents.tabcontent-company')
                    <!-- blog_settings tab -->
                    @include('client.companytabs.blog_settings')

                <!-- reviews tab -->
                    @include('client.companytabs.reviews')

                <!-- coupons tab -->
                    @include('client.companytabs.coupons')
                </div>
            </div>
        </div>
@stop