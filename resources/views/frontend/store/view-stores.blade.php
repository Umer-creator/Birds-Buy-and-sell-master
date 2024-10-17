@extends('layouts.front')
@section('front')
    <section>
        {{-- start page header  --}}
        <section>

            <div class="page-header text-center mt-5 ml-5 mr-5"
                style="background-image: url('{{ asset('frontend/assets/gallery/page-header-bg.jpg/') }}')">
                <div class="container">
                    <h1 class="page-title">Stores<span>Birds Buy and Sell</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
        </section>
        {{-- end  page header  --}}

        {{-- start page top  pages nav --}}
        <section>
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stores</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
        </section>
        {{-- end  page top  pages nav --}}

        {{-- start Main page --}}
        <section>
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        {{--  Start Mid side birds content area --}}
                        <div class="col-lg-12">
                            {{-- start  Top Toolbox --}}
                            <section>
                                <div class="toolbox">
                                    <div class="toolbox-left">
                                        <div class="toolbox-info">
                                            Showing <span>Sellers</span> Stores
                                        </div><!-- End .toolbox-info -->
                                    </div><!-- End .toolbox-left -->


                                </div><!-- End .toolbox -->
                            </section>
                            {{-- end Top Toolbox --}}
                            {{-- Start Products Grid --}}
                            <livewire:store.stores />
                            {{-- End Products Grid --}}


                        </div><!-- End .col-lg-9 -->
                        {{--  end  Mid side birds content area --}}

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </section>
        {{-- end  Main page --}}


    </section>
@endsection
