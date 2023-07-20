@extends('layouts.frontend')
@section('konten')
    <div class="content">
        <!--section-->
        <section>
            <div class="container big-container">
                {{-- <div class="section-title">
                <h2><span>Services</span></h2>
                <div class="section-subtitle">Best Services </div>
                <span class="section-separator"></span>
            </div> --}}
                <div class="row">
                    <div class="grid-item-holder gallery-items fl-wrap">
                        @foreach ($service as $item)
                            <!--  gallery-item-->
                            <div class="gallery-item restaurant events">
                                <!-- listing-item  -->
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img">
                                            <a href="{{ route('frontend.detail.show', $item->id) }}"
                                                class="geodir-category-img-wrap fl-wrap">
                                                <img src="{{ url('admin/category/image') . '/' . $item->image }}"
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
                                                            href="{{ route('frontend.detail.show', $item->id) }}">{{ $item->name }}</a>
                                                    </h3>
                                                    <div class="geodir-category-location fl-wrap">
                                                        <a href="{{ route('frontend.detail.show', $item->id) }}">
                                                            <i class="fas fa-map-marker-alt"></i> {{ $item->name }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-text fl-wrap">
                                                <p class="small-text">{{ $item->description }}</p>
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
                </div>
                {{ $service->links() }}
        </section>
        <!--content end-->
    @endsection
