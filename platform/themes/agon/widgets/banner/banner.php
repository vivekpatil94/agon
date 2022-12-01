<?php

use Botble\Widget\AbstractWidget;

class BannerWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected $widgetDirectory = 'banner';

    /**
     * SiteInfo constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'name' => __('Site information'),
            'description' => __('Widget display site information'),
            'title' => '',
            'subtitle' => '',
            'link' => '',
            'image' => '',
        ]);
    }
}
