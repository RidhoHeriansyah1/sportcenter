@extends('layouts.frontend')
@section('konten')
                <!-- content-->
                <div class="content">
                    <section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
                        <div class="bg-parallax-wrap">
                            <img class="bg par-elem " src="{{ url('admin/category/image'). '/' . $data->image }}"  data-scrollax="properties: { translateY: '30%' }" style="transform: translateZ(0px) translateY(-3.39463%);"></img>
                            <div class="overlay"></div>
                        </div>
                        <div class="container">
                            <div class="list-single-header-item  fl-wrap">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h1>{{ $data->name }} </h1>
                                        <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>  {{ $data->venue->name }}</a> <a href="#"> <i class="fal fa-phone"></i>{{ $data->venue->phone }}</a> <a href="#"><i class="fal fa-envelope"></i> yourmail@domain.com</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="gray-bg no-top-padding">
                        <div class="container">
                            <div class="clearfix"></div>
                            <div class="row">
                                <!-- list-single-main-wrapper-col -->
                                <div class="col-md-8">
                                    <!-- list-single-main-wrapper -->
                                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                        <!-- list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap block_box">
                                            <div class="list-single-main-item-title">
                                                <h3>Description</h3>
                                            </div>
                                            <div class="list-single-main-item_content fl-wrap">
                                            <p>{{ $data->description }}</p>
                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->
                                        <!-- list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap block_box">
                                            <div class="list-single-main-item-title">
                                                <h3>Listing Features</h3>
                                            </div>
                                            <div class="list-single-main-item_content fl-wrap">
                                                <div class="listing-features fl-wrap">
                                                    <ul class="no-list-style">
                                                        {{-- @foreach ($amenity as $amenity)
                                                        <li>{{ $amenity->amenity_id }}</li>
                                                        @endforeach --}}
                                                        <li><a href="#"><i class="fa fa-rocket"></i> Elevator in building</a></li>
                                                        <li><a href="#"><i class="fa fa-wifi"></i> Free Wi Fi</a></li>
                                                        <li><a href="#"><i class="fa fa-motorcycle"></i> Free Parking</a></li>
                                                        <li><a href="#"><i class="fa fa-cloud"></i> Air Conditioned</a></li>
                                                        <li><a href="#"><i class="fa fa-shopping-cart"></i> Online Ordering</a></li>
                                                        <li><a href="#"><i class="fa fa-paw"></i> Pet Friendly</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->
                                    </div>
                                </div>
                                <!-- list-single-main-wrapper-col end -->
                                <!-- list-single-sidebar -->
                                <div class="col-md-4">
                                    <!--box-widget-item -->
                                    <div class="box-widget-item fl-wrap block_box">
                                        <div class="box-widget-item-header">
                                            <h3>Working Hours</h3>
                                        </div>
                                        <div class="box-widget opening-hours fl-wrap">
                                            <div class="box-widget-content">
                                                <ul class="no-list-style">
                                                    {{-- @foreach ($room as $room)
                                                    <li class="mon">{{ $room->time_start }}-{{ $room->time_end }}</li>
                                                    @endforeach --}}
                                                    
                                                    <li class="mon"><span class="opening-hours-day">Monday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                                                    <li class="tue"><span class="opening-hours-day">Tuesday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                                                    <li class="wed"><span class="opening-hours-day">Wednesday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                                                    <li class="thu"><span class="opening-hours-day">Thursday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                                                    <li class="fri"><span class="opening-hours-day">Friday </span><span class="opening-hours-time">9 AM - 5 PM</span></li>
                                                    <li class="sat"><span class="opening-hours-day">Saturday </span><span class="opening-hours-time">9 AM - 3 PM</span></li>
                                                    <li class="sun"><span class="opening-hours-day">Sunday </span><span class="opening-hours-time">Closed</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget-item end -->
                                </div>
                                <!-- list-single-sidebar end -->
                            </div>
                        </div>
                    </section>
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!--content end-->
                @endsection
