<?php

use Botble\Widget\AbstractWidget;

class ProductsWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected $widgetDirectory = 'products';

    /**
     * SiteInfo constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'name' => __('Product items'),
            'description' => __('Widget display product items'),
            'number_of_display' => '6',
        ]);
    }
}
