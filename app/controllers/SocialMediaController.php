<?php

class SocialMediaController extends \BaseController {
    public function update()
    {
        if(Request::ajax()){
            $socialmedia = SocialMedia::find(1);
            $socialLink = Input::get('socialLink');
            $socialtype =  Input::get('socialtype');
            $socialmedia->$socialtype = $socialLink;
            $socialmedia->save();

            return $socialmedia->$socialtype;
        }
    }
}