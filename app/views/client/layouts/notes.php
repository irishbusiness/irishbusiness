/*

on the real world remove business seeder because it might have conflict

include the 
<div class="content-container container-16">
include the sidebar

on each view using the default.blade.php

                 @if(!Request::is('admin/manage/blog') && !Request::is('*/map') && !Request::is('company*'))
                    @include('client.partials._sidebar')
                 @endif

*/