<?php

use Botble\Widget\AbstractWidget;

class GetStartedWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected $widgetDirectory = 'get-started';

    /**
     * SiteInfo constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'name' => __('Get started'),
            'description' => __('Widget display get started'),
            'image' => null,
            'image_link' => '/',
            'title' => 'Ready to get started?',
            'link' => '#',
            'text_link' => 'Create an Account',
        ]);
    }
}
