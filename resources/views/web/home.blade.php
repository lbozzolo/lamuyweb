@extends('web.layout')

@section('content')

    @if($slider)
    <section class="slider">
        @include('web.partials.sliders')
    </section>
    @endif

    <section class="bg-0 p-t-92 p-b-60">
        <div class="container">
            <!-- Title section -->


            <!--  -->
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-4 p-b-40">
                    <div class="bg-10 h-full">
                        <a href="services-detail-01.html" class="hov-img0 of-hidden bg-0">
                            <img src="{{ asset('template-web/images/services-01.jpg') }}" alt="IMG">
                        </a>

                        <div class="p-rl-30 p-t-26 p-b-20">
                            <h4 class="p-b-9">
                                <a href="services-detail-01.html" class="t1-m-1 cl-0 hov-link2 trans-02">
                                    Management Training
                                </a>
                            </h4>

                            <p class="t1-s-2 cl-13">
                                We support and help people increase manage-ment experience.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 p-b-40">
                    <div class="bg-10 h-full">
                        <a href="services-detail-01.html" class="hov-img0 of-hidden bg-0">
                            <img src="{{ asset('template-web/images/services-02.jpg') }}" alt="IMG">
                        </a>

                        <div class="p-rl-30 p-t-26 p-b-20">
                            <h4 class="p-b-9">
                                <a href="services-detail-01.html" class="t1-m-1 cl-0 hov-link2 trans-02">
                                    Business Consulting
                                </a>
                            </h4>

                            <p class="t1-s-2 cl-13">
                                If you are going to use a passage of Lorem Ipsum, you need to be sure
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 p-b-40">
                    <div class="bg-10 h-full">
                        <a href="services-detail-01.html" class="hov-img0 of-hidden bg-0">
                            <img src="{{ asset('template-web/images/services-03.jpg') }}" alt="IMG">
                        </a>

                        <div class="p-rl-30 p-t-26 p-b-20">
                            <h4 class="p-b-9">
                                <a href="services-detail-01.html" class="t1-m-1 cl-0 hov-link2 trans-02">
                                    Financial Planning
                                </a>
                            </h4>

                            <p class="t1-s-2 cl-13">
                                Analysis the business plan for deployment in the market.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why chosse us -->
    <section class="bg-12 p-t-92 p-b-70">
        <div class="container">
            <!-- Title section -->
            <div class="flex-col-c-c p-b-50">
                <h3 class="t1-b-1 cl-3 txt-center m-b-11">
                    Why Chosse Us
                </h3>

                <div class="size-a-2 bg-3"></div>
            </div>

            <!--  -->
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-6 col-lg-3 p-b-30">
                    <!-- Block1 -->
                    <div class="block1 trans-04">
                        <div class="block1-show trans-04">
                            <div class="block1-symbol txt-center wrap-pic-max-s m-b-23 pos-relative lh-00 trans-04">
                                <img class="symbol-dark trans-04" src="{{ asset('template-web/images/icons/symbol-01-dark.png') }}" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="{{ asset('template-web/images/icons/symbol-01-light.png') }}" alt="IMG">
                            </div>

                            <h4 class="block1-title t1-m-1 text-uppercase cl-3 txt-center trans-04">
                                Experienced adviser
                            </h4>
                        </div>

                        <div class="block1-hide flex-col-c-c p-t-8 trans-04">
                            <p class="t1-s-2 cl-12 txt-center p-b-26">
                                Sed nec egestas diam, vitae imper-diet nisi. Vivamus cursus
                            </p>

                            <a href="#" class="flex-c-c size-a-1 p-rl-15 t1-s-2 text-uppercase cl-6 bg-0 hov-btn1 trans-02">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-6 col-lg-3 p-b-30">
                    <!-- Block1 -->
                    <div class="block1 trans-04">
                        <div class="block1-show trans-04">
                            <div class="block1-symbol txt-center wrap-pic-max-s m-b-23 pos-relative lh-00 trans-04">
                                <img class="symbol-dark trans-04" src="{{ asset('template-web/images/icons/symbol-02-dark.png') }}" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="{{ asset('template-web/images/icons/symbol-02-light.png') }}" alt="IMG">
                            </div>

                            <h4 class="block1-title t1-m-1 text-uppercase cl-3 txt-center trans-04">
                                Great Ideas
                            </h4>
                        </div>

                        <div class="block1-hide flex-col-c-c p-t-8 trans-04">
                            <p class="t1-s-2 cl-12 txt-center p-b-26">
                                Sed nec egestas diam, vitae imper-diet nisi. Vivamus cursus
                            </p>

                            <a href="#" class="flex-c-c size-a-1 p-rl-15 t1-s-2 text-uppercase cl-6 bg-0 hov-btn1 trans-02">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-6 col-lg-3 p-b-30">
                    <!-- Block1 -->
                    <div class="block1 trans-04">
                        <div class="block1-show trans-04">
                            <div class="block1-symbol txt-center wrap-pic-max-s m-b-23 pos-relative lh-00 trans-04">
                                <img class="symbol-dark trans-04" src="{{ asset('template-web/images/icons/symbol-03-dark.png') }}" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="{{ asset('template-web/images/icons/symbol-03-light.png') }}" alt="IMG">
                            </div>

                            <h4 class="block1-title t1-m-1 text-uppercase cl-3 txt-center trans-04">
                                Worldwide System
                            </h4>
                        </div>

                        <div class="block1-hide flex-col-c-c p-t-8 trans-04">
                            <p class="t1-s-2 cl-12 txt-center p-b-26">
                                Sed nec egestas diam, vitae imper-diet nisi. Vivamus cursus
                            </p>

                            <a href="#" class="flex-c-c size-a-1 p-rl-15 t1-s-2 text-uppercase cl-6 bg-0 hov-btn1 trans-02">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-6 col-lg-3 p-b-30">
                    <!-- Block1 -->
                    <div class="block1 trans-04">
                        <div class="block1-show trans-04">
                            <div class="block1-symbol txt-center wrap-pic-max-s m-b-23 pos-relative lh-00 trans-04">
                                <img class="symbol-dark trans-04" src="{{ asset('template-web/images/icons/symbol-04-dark.png') }}" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="{{ asset('template-web/images/icons/symbol-04-light.png') }}" alt="IMG">
                            </div>

                            <h4 class="block1-title t1-m-1 text-uppercase cl-3 txt-center trans-04">
                                Security Information
                            </h4>
                        </div>

                        <div class="block1-hide flex-col-c-c p-t-8 trans-04">
                            <p class="t1-s-2 cl-12 txt-center p-b-26">
                                Sed nec egestas diam, vitae imper-diet nisi. Vivamus cursus
                            </p>

                            <a href="#" class="flex-c-c size-a-1 p-rl-15 t1-s-2 text-uppercase cl-6 bg-0 hov-btn1 trans-02">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection