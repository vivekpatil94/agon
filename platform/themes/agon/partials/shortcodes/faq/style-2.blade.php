<section class="section-box pt-140 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-40">
                <h3 class="text-heading-1">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p class="text-body-text color-gray-600 mt-30">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="row">
                    @foreach ($tabs as $tab)
                        <div class="col-lg-12 mt-50">
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
                <div class="mt-60">
                    @if ($shortcode->primary_url)
                        <a class="btn btn-black icon-arrow-right-white"
                            href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Contact Us') }}</a>
                    @endif
                    @if ($shortcode->secondary_url)
                        <a class="btn btn-link text-heading-6"
                            href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('Support Center') }}</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-7">
                <div class="accordion faq-list-items" id="accordion-faq">
                    @foreach($categories as $category)
                        @foreach($category->faqs as $faq)
                            <div class="accordion-item faq-item">
                                <h2 class="accordion-header" id="heading-{{ $category->id }}-{{ $faq->id }}">
                                    <button class="accordion-button text-heading-5 @if (!($loop->parent->first && $loop->first)) collapsed @endif"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $category->id }}-{{ $faq->id }}"
                                        @if ($loop->parent->first && $loop->first) aria-expanded="true" @else aria-expanded="false" @endif
                                        aria-controls="collapse-{{ $category->id }}-{{ $faq->id }}">
                                        <span class="faq-question">{{ $faq->question }}</span>
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse @if ($loop->parent->first && $loop->first) show @endif"
                                    id="collapse-{{ $category->id }}-{{ $faq->id }}" aria-labelledby="heading-{{ $category->id }}-{{ $faq->id }}"
                                    data-bs-parent="#accordion-faq">
                                    <div class="accordion-body faq-answer">{!! BaseHelper::clean($faq->answer) !!}</div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
