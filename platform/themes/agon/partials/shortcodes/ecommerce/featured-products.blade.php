<div class="section-box">
    <div class="container mt-50">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-sm-8">
                <h3 class="text-heading-1 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p>{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
        </div>
    </div>
    <div class="container mt-80">
        <div class="box-swiper">
            <div class="swiper-container swiper-group-1">
                <div class="swiper-wrapper pb-70 pt-5">
                    @foreach ($products->chunk(12) as $chunked)
                        <div class="swiper-slide @if ($loop->first) active @endif">
                            <div class="row">
                                @foreach ($chunked as $product)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        {!! Theme::partial('ecommerce.product-item', compact('product')) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination swiper-pagination3"></div>
            </div>
            <div class="swiper-button-next swiper-button-next-5"></div>
            <div class="swiper-button-prev swiper-button-prev-5"></div>
        </div>
    </div>
</div>
