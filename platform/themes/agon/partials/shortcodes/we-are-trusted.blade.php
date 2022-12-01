@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if (($tabName = $shortcode->{'tab_name_' . $i}) && ($title = $shortcode->{'title_' . $i})) {
                $tabs[] = [
                    'tab_name' => $tabName,
                    'title'    => $title,
                    'subtitle' => $shortcode->{'subtitle_' . $i},
                    'link'     => $shortcode->{'link_' . $i},
                    'image'    => $shortcode->{'image_' . $i},
                    'video'    => $shortcode->{'video_' . $i},
                    'bg_color' => $shortcode->{'bg_color_' . $i},
                ];
            }
        }
    }
@endphp
@if (count($tabs))
    <section class="section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-sm-1 col-12"></div>
                <div class="col-lg-8 col-sm-10 col-12 text-center mt-70">
                    <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                </div>
                <div class="col-lg-2 col-sm-1 col-12"></div>
            </div>
        </div>
        <div class="container">
            <div class="text-center mt-90">
                <ul class="nav" role="tablist">
                    @foreach ($tabs as $tab)
                        <li>
                            <a class="btn btn-default btn-bd-green-hover btn-select @if ($loop->first) active @endif"
                                href="#tab-{{ $loop->iteration }}" data-bs-toggle="tab"
                                role="tab" aria-controls="tab-{{ $loop->iteration }}"
                                @if ($loop->first) aria-selected="true" @else aria-selected="false" @endif>{{ Arr::get($tab, 'tab_name') }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                @foreach ($tabs as $tab)
                    <div class="tab-pane fade @if ($loop->first) active show @endif" id="tab-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="tab-{{ $loop->iteration }}">
                        <div class="panel-box mt-50" @if (Arr::get($tab, 'bg_color')) style="background-color: {{ Arr::get($tab, 'bg_color') }};" @endif>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="box-optimized">
                                        <h3 class="text-heading-2">{{ Arr::get($tab, 'title') }}</h3>
                                        <p class="text-body-excerpt mt-30">{{ Arr::get($tab, 'subtitle') }}</p>
                                        @if (Arr::get($tab, 'link'))
                                            <div class="mt-40">
                                                <a class="btn btn-default btn-white icon-arrow-right" href="{{ Arr::get($tab, 'link') }}">{{ __('Learn more') }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="block-video icon-pattern">
                                        @if (Arr::get($tab, 'video'))
                                            <a class="popup-youtube btn-play-video" href="{{ Arr::get($tab, 'video') }}"></a>
                                        @endif
                                        @if (Arr::get($tab, 'image'))
                                            <img class="img-responsive" src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image')) }}" alt="{{ Arr::get($tab, 'title') }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
