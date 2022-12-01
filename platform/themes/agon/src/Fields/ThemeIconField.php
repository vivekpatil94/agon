<?php

namespace Theme\Agon\Fields;

use Assets;
use Kris\LaravelFormBuilder\Fields\FormField;
use Theme;

class ThemeIconField extends FormField
{
    /**
     * {@inheritDoc}
     */
    protected function getTemplate(): string
    {
        Assets::addScriptsDirectly(Theme::asset()->url('js/icons-field.js'))
            ->addStylesDirectly(Theme::asset()->url('css/vendors/uicons-regular-rounded.css'));

        return Theme::getThemeNamespace() . '::partials.fields.icons-field';
    }
}
