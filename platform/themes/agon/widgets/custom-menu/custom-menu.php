<?php

use Botble\Widget\AbstractWidget;

class CustomMenuWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected $widgetDirectory = 'custom-menu';

    /**
     * CustomMenuWidget constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'name' => __('Custom Menu'),
            'description' => __('Add a custom menu to your widget area.'),
            'menu_id' => null,
            'size' => 'normal',
        ]);
    }
}
