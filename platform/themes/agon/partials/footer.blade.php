        </main>
        <div class="container">
            <div class="row">
                {!! dynamic_sidebar('pre_footer_sidebar') !!}
            </div>
        </div>
        <footer class="footer mt-40">
            <div class="container">
                <div class="footer-top"></div>
                <div class="row">
                    {!! dynamic_sidebar('footer_sidebar') !!}
                </div>
                <div class="footer-bottom mt-20">
                    <div class="row">
                        <div class="col-md-8">
                            <span class="color-gray-400 text-body-lead">{!! BaseHelper::clean(theme_option('copyright')) !!}</span>
                            {!! Menu::renderMenuLocation('footer-bottom-menu', [
                                    'view'    => 'footer-menu',
                                    'options' => ['class' => 'menu-footer color-gray-400'],
                            ]) !!}
                        </div>
                        @if (theme_option('social_links') && ($socialLinks = json_decode(theme_option('social_links'), true)))
                            <div class="col-md-4 text-center text-lg-end text-md-end">
                             <div class="footer-social">
                                    @foreach($socialLinks as $socialLink)
                                        @if (count($socialLink) == 3)
                                            <a class="icon-socials" style="background: url({{ RvMedia::getImageUrl(Arr::get($socialLink[1], 'value')) }}) no-repeat 0 0;"
                                                href="{{ Arr::get($socialLink[2], 'value') }}" target="_blank"
                                                title="{{ Arr::get($socialLink[0], 'value') }}"></a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </footer>

        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1111;">
            <div id="live-toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <span class="success text-success">
                        <span class="d-flex">
                            <i class="fi fi-rr-check d-flex align-items-center me-2"></i>
                            <strong class="me-auto">{{ __('Success') }}</strong>
                        </span>
                    </span>
                    <span class="danger text-danger">
                        <span class="d-flex">
                            <i class="fi fi-rr-cross-circle d-flex align-items-center me-2"></i>
                            <strong class="me-auto">{{ __('Error') }}</strong>
                        </span>
                    </span>
                    <span class="info text-info">
                        <span class="d-flex">
                            <i class="fi fi-rr-info d-flex align-items-center me-2"></i>
                            <strong class="me-auto">{{ __('Info') }}</strong>
                        </span>
                    </span>
                    <strong class="me-auto"></strong>
                    <small class="time"></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body"></div>
            </div>
        </div>

        @if (is_plugin_active('ecommerce'))
            {!! Theme::partial('ecommerce.quick-view-modal') !!}

            <div class="offcanvas offcanvas-end" tabindex="-1" id="shop-cart-offcanvas" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel" class="title-question">{{ __('Your Cart') }}</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="mini-cart-content"></div>
                </div>
            </div>
        @endif

        <div id="scrollUp"><i class="fi-rr-arrow-small-up"></i></div>

        <script>
            'use strict';

            window.trans = {
                "View All": "{{ __('View All') }}",
                "No reviews!": "{{ __('No reviews!') }}",
                "days": "{{ __('days') }}",
                "hours": "{{ __('hours') }}",
                "mins": "{{ __('mins') }}",
                "sec": "{{ __('sec') }}",
            };

            window.siteConfig = {
                "url" : "{{ route('public.index') }}",
            };

            @if (is_plugin_active('ecommerce') && EcommerceHelper::isCartEnabled())
                siteConfig.ajaxCart = "{{ route('public.ajax.cart') }}";
                siteConfig.cartUrl = "{{ route('public.cart') }}";
            @endif
        </script>

        {!! Theme::footer() !!}

        @if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
            <script type="text/javascript">
                window.noticeMessages = window.noticeMessages || [];
                @if (session()->has('success_msg'))
                    window.noticeMessages.push({
                        message: '{{ session('success_msg') }}'
                    });
                @endif

                @if (session()->has('error_msg'))
                    window.noticeMessages.push({
                        type: 'error',
                        message: '{{ session('error_msg') }}'
                    });
                @endif

                @if (isset($error_msg))
                    window.noticeMessages.push({
                        type: 'error',
                        message: '{{ $error_msg }}'
                    });
                @endif

                @if (isset($errors))
                    @foreach ($errors->all() as $error)
                        window.noticeMessages.push({
                            type: 'error',
                            message: '{!! BaseHelper::clean($error) !!}'
                        });
                    @endforeach
                @endif
            </script>
        @endif
    </body>
</html>
