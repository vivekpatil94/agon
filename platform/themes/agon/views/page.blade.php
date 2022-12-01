@php
    $page->loadMissing('metadata');
    Theme::set('header_css_class', $page->getMetadata('header_css_class', true) ?: '');
@endphp

{!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, BaseHelper::clean($page->content), $page) !!}
