@extends('web.layout')

@section('content')

    <!-- Title page -->
    <section class="bg-img1 kit-overlay1" style="background-image: url('{{ asset('template-web/images/bg-05.jpg') }}');">
        <div class="container size-h-3 p-tb-30 flex-col-c-c">
            <h2 class="t1-b-1 text-uppercase cl-0 txt-center m-b-25">
                Nuestro Estatuto
            </h2>

        </div>
    </section>

    <!--  -->

    <section class="bg-0 p-t-92 p-b-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 p-b-35">

                    <div class="flex-col-c-s p-b-35">
                        <h3 class="t1-b-1 cl-3 m-b-11">
                            {!! ($estatuto)? $estatuto->title : '' !!}
                        </h3>

                        <div class="size-a-2 bg-3"></div>
                    </div>

                    <div class="p-r-20 p-r-0-sr767">

                        {!! ($estatuto)? $estatuto->body : 'Todavía no se ha cargado estatuto' !!}

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
                                <img class="symbol-dark trans-04" src="images/icons/symbol-01-dark.png" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="images/icons/symbol-01-light.png" alt="IMG">
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
                                <img class="symbol-dark trans-04" src="images/icons/symbol-02-dark.png" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="images/icons/symbol-02-light.png" alt="IMG">
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
                                <img class="symbol-dark trans-04" src="images/icons/symbol-03-dark.png" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="images/icons/symbol-03-light.png" alt="IMG">
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
                                <img class="symbol-dark trans-04" src="images/icons/symbol-04-dark.png" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="images/icons/symbol-04-light.png" alt="IMG">
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