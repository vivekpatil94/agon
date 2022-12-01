
<section class="section-box">
    <div class="container mt-60">
        <div class="row">
            <div class="col-lg-6 col-sm-12 block-img-we-do">
                @if ($shortcode->image)
                    <img class="bdrd-16 img-responsive" src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title ?: $shortcode->image }}">
                @endif
            </div>
            <div class="col-lg-6 col-sm-12 block-we-do">
                @if ($shortcode->highlight)
                    <span class="tag-1">{{ $shortcode->highlight }}</span>
                @endif
                <h3 class="text-heading-1 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p class="text-body-lead-large color-gray-600 mt-30">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="line-bd-green mt-50"></div>
                @if (count($tabs))
                    <div class="row">
                        @foreach ($tabs as $tab)
                            <div class="col-lg-6 col-sm-6 col-12 mt-50">
                                <h4 class="text-heading-6 @if (!Arr::get($tab, 'icon')) icon-leaf @else d-flex @endif">
                                    @if (Arr::get($tab, 'icon'))
                                        <i class="{{ Arr::get($tab, 'icon') }} d-flex align-items-center pe-2 color-green-900"></i>
                                    @endif
                                    {{ Arr::get($tab, 'title') }}
                                </h4>
                                <p class="text-body-excerpt color-gray-600 mt-15">{{ Arr::get($tab, 'subtitle') }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
