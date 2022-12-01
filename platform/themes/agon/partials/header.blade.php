<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts-->
        <link href="https://fonts.googleapis.com/css2?family={{ urlencode(theme_option('secondary_font', 'Noto Sans')) }}:wght@400;700&family={{ urlencode(theme_option('primary_font', 'Chivo')) }}:wght@400;700&display=swap" rel="stylesheet" type="text/css">
        <!-- CSS Library-->

        <style>
            :root {
                --color-primary: {{ theme_option('primary_color', '#006D77') }};
                --color-secondary: {{ theme_option('secondary_color', '#8D99AE') }};
                --color-danger: {{ theme_option('danger_color', '#EF476F') }};
                --primary-font: '{{ theme_option('primary_font', 'Chivo') }}', sans-serif;
                --secondary-font: '{{ theme_option('secondary_font', 'Noto Sans') }}', sans-serif;
            }
        </style>

        {!! Theme::header() !!}

        <style>
            :root {
                --bs-primary-rgb: {{ implode(',', BaseHelper::hexToRgb(theme_option('primary_color', '#006D77'))) }};
            }
        </style>
    </head>
    <body @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
        {!! apply_filters(THEME_FRONT_BODY, null) !!}

        {!! Theme::partial('preloader') !!}
        {!! Theme::partial('header-top') !!}

        <header class="header sticky-bar {{ Theme::get('header_css_class') }}">
            <div class="container">
                <div class="main-header">
                    <div class="header-left">
                        @if (theme_option('logo'))
                            <div class="header-logo">
                                <a class="d-flex" href="{{ route('public.index') }}">
                                    <img alt="{{ theme_option('site_title') }}" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}">
                                </a>
                            </div>
                        @endif
                        <div class="header-nav">
                            <nav class="nav-main-menu d-none d-xl-block">
                                {!! Menu::renderMenuLocation('main-menu', [
                                       'view'    => 'menu',
                                       'options' => ['class' => 'main-menu'],
                                    ]) !!}
                            </nav>
                            <div></div>
                        </div>
                    </div>
                    <div class="header-right position-relative d-block">
                        @include(Theme::getThemeNamespace('partials.header-nav-right'))
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-content-area">
                    <div class="perfect-scroll">
                        <div class="mobile-menu-wrap mobile-header-border">
                            <nav>
                                {!! Menu::renderMenuLocation('main-menu', [
                                       'view'    => 'menu',
                                       'options' => ['class' => 'mobile-menu font-heading'],
                                ]) !!}
                            </nav>
                        </div>

                        <div class="site-copyright color-gray-400">{!! BaseHelper::clean(theme_option('copyright')) !!}</div>
                    </div>
                </div>
            </div>
        </div>
        <main class="main">
