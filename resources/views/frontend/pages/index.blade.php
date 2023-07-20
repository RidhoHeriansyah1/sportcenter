@extends('layouts.frontend')

@section('konten')
    <!--conten-->
    <!--section  -->
    <section class="hero-section" data-scrollax-parent="true">
        <div class="bg-tabs-wrap">
            <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
                <div class="bg bg_tabs" data-bg="{{ asset('template/images/bg/hero/1.jpg') }}"></div>
                <div class="overlay op7"></div>
            </div>
        </div>
        <div class="container small-container">
            <div class="intro-item fl-wrap">
                <span class="section-separator"></span>
                <div class="bubbles">
                    <h1>Explore Best Places In City</h1>
                </div>
                <h3>Find some of the best tips from around the city from our partners and friends.</h3>
            </div>
            <!-- main-search-input-tabs-->
            <div class="main-search-input-tabs  tabs-act fl-wrap">
                <!--tabs -->
                <div class="tabs-container fl-wrap">
                    <!--tab -->
                    <div class="tab">
                        <div id="tab-inpt1" class="tab-content first-tab">
                            <div class="main-search-input-wrap fl-wrap">
                                <div class="main-search-input fl-wrap">
                                    <div class="main-search-input-item">
                                        <label><i class="fal fa-keyboard"></i></label>
                                        <input type="text" placeholder="What are you looking for?" value="" />
                                    </div>
                                    <div class="main-search-input-item location autocomplete-container">
                                        <label><i class="fal fa-map-marker-check"></i></label>
                                        <input type="text" placeholder="Location" class="autocomplete-input"
                                            id="autocompleteid" value="" />
                                        <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                                    </div>
                                    <div class="main-search-input-item">
                                        <select data-placeholder="All Categories" class="chosen-select">
                                            <option>All Categories</option>
                                            <option>Shops</option>
                                            <option>Hotels</option>
                                            <option>Restaurants</option>
                                            <option>Fitness</option>
                                            <option>Events</option>
                                        </select>
                                    </div>
                                    <button class="main-search-button color2-bg"
                                        onclick="window.location.href='listing.html'">Search <i
                                            class="far fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--tabs end-->
            </div>
            <!-- main-search-input-tabs end-->
        </div>
        <div class="header-sec-link">
            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
        </div>
    </section>

    <!--section -->
    <section class="gray-bg hidden-section particles-wrapper">
        <div class="container">
            <div class="section-title">
                <h2>Explore Best Cities</h2>
                <div class="section-subtitle"> Categories</div>
                <span class="section-separator"></span>
                {{-- <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus.</p> --}}
            </div>
            <div class="listing-item-grid_container fl-wrap">
                <div class="row">
                    @foreach ($location as $location)
                        <!--  listing-item-grid  -->
                        <div class="col-sm-4">
                            <div class="listing-item-grid">
                                <div class="bg" data-bg="{{ url('admin/location/image') . '/' . $location->image }}">
                                </div>
                                <div class="d-gr-sec"></div>
                                <div class="listing-item-grid_title">
                                    <h3><a href="listing.html">{{ $location->name }}</a></h3>
                                    <p>Constant care and attention to the patients makes good record</p>
                                </div>
                            </div>
                        </div>
                        <!--  listing-item-grid end  -->
                    @endforeach
                </div>
            </div>
            <a href="listing.html" class="btn dec_btn color2-bg">View All Cities<i class="fal fa-arrow-alt-right"></i></a>
        </div>
    </section>

    <!--section-->
    <section>
        <div class="container big-container">
            <div class="section-title">
                <h2><span>Services</span></h2>
                <div class="section-subtitle">Best Services </div>
                <span class="section-separator"></span>
                {{-- <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut, convallis eros
                    sollicitudin turpis.</p> --}}
            </div>
            {{-- <div class="listing-filters gallery-filters fl-wrap">
                <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*">All Categories</a>
                <a href="#" class="gallery-filter" data-filter=".restaurant">Restaurants </a>
                <a href="#" class="gallery-filter" data-filter=".hotels">Hotels</a>
                <a href="#" class="gallery-filter" data-filter=".events">Events</a>
                <a href="#" class="gallery-filter" data-filter=".fitness">Fitness</a>
            </div> --}}
            <div class="row">
            <div class="grid-item-holder gallery-items fl-wrap">
                    @foreach ($service as $service)
                        <!--  gallery-item-->
                        <div class="gallery-item restaurant events">
                            <!-- listing-item  -->
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <a href="{{ route('frontend.detail.show', $service->id) }}"
                                            class="geodir-category-img-wrap fl-wrap">
                                            <img src="{{ url('admin/category/image') . '/' . $service->image }}"
                                                style="max-width:400px;max-height:190px;" alt="">
                                        </a>
                                        <div class=""><a href="author-single.html"></a>
                                            <span class="avatar-tooltip">Added By <strong>Alisa Noory</strong></span>
                                        </div>
                                        <div class="geodir-category-opt">
                                            <div class="listing-rating-count-wrap">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap title-sin_item">
                                        <div class="geodir-category-content-title fl-wrap">
                                            <div class="geodir-category-content-title-item">
                                                <h3 class="title-sin_map"><a
                                                        href="{{ route('frontend.detail.show', $service->id) }}">{{ $service->name }}</a>
                                                </h3>
                                                <div class="geodir-category-location fl-wrap"><a
                                                        href="{{ route('frontend.detail.show', $service->id) }}"><i
                                                            class="fas fa-map-marker-alt"></i> {{ $service->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="geodir-category-text fl-wrap">
                                            <p class="small-text">{{ $service->description }}</p>
                                            <div class="facilities-list fl-wrap">
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end -->
                        </div>
                        <!-- gallery-item  end-->
                    @endforeach
                </div>
                <a href="{{ route('frontend.all.service') }}" class="btn  dec_btn  color2-bg">Check All Service<i
                        class="fal fa-arrow-alt-right"></i></a>
            </div>
    </section>
    <!--content end-->
@endsection
