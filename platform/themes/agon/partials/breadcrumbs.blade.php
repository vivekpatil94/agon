<section class="section-box">
    <div class="nav-breadcrumbs bg-gray-100">
        <div class="container">
            <div class="breadcrumb">
                <ul aria-label="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                    @foreach ($crumbs = Theme::breadcrumb()->getCrumbs() as $i => $crumb)
                        @if (!$loop->last)
                            <li class="@if ($loop->first) home @endif" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <a href="{{ $crumb['url'] }}" itemprop="item">
                                    {!! BaseHelper::clean($crumb['label']) !!}
                                </a>
                                <meta itemprop="name" content="{{ $crumb['label'] }}" />
                                <meta itemprop="position" content="{{ $i + 1}}" />
                            </li>
                        @else
                            <li class="" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                {!! BaseHelper::clean($crumb['label']) !!}
                                <meta itemprop="name" content="{{ $crumb['label'] }}" />
                                <meta itemprop="position" content="{{ $i + 1}}" />
                            </li>
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</section>
