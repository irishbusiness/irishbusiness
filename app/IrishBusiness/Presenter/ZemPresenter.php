<?php namespace IrishBusiness\Presenter;

class ZemPresenter extends \Illuminate\Pagination\Presenter {

    public function getActivePageWrapper($text)
    {
        return '<a class="current-page">'.$text.'</a>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<a class="unavailable">'.$text.'</a>';
    }

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        return '<a href="'.$url.'">'.$page.'</a>';
    }

}