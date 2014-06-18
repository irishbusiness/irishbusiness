/*

on the real world remove business seeder because it might have conflict

include the 
<div class="content-container container-16">
include the sidebar

on each view using the default.blade.php

                 @if(!Request::is('admin/manage/blog') && !Request::is('*/map') && !Request::is('company*'))
                    @include('client.partials._sidebar')
                 @endif



                 in company-tab.blade.php 

                 @if(count($business->branches)>1 || isOwner($branch->business->slug))
				<!-- branch tab -->
				@include('client.tabcontents.tabcontent-branch')
			@endif

*/


@if(Request::is('admin/*'))
					<div class="content-container container-24">
                @else
                    <div class="content-container container-16">
                @endif

                in the admin/layouts/default.blade.php line 84