@extends('admin.store_manager.layouts.master')
@section('content')
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Listings <small id="listing_status"></small></span>
                </div>
            </div>

            <div class="breadcrumb-header justify-content-between">
                <div class="justify-content-start">
                    <button class="btn btn-sm btn-info">
                        <input type="checkbox" name="" id="selectAll">
                    </button>
                    <button class="btn btn-light">
                        <span><i class="fas fa-check"></i></span>
                        Activate
                    </button>
                    <button class="btn btn-light">
                        <span><i class="fas fa-close"></i></span>
                        Deactivate
                    </button>
                    <button class="btn btn-light">
                        <span><i class="fas fa-trash-alt"></i></span>
                        Delete
                    </button>
                </div>
                <div class="justify-content-end">
                    <button class="btn btn-light">
                        <span><i class="fas fa-plus"></i></span>
                        Add new listing</button>
                </div>

            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row row-sm">
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="row row-sm">
                        <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
                            <div class="card">
                                <div class="card-body h-100  product-grid6">
                                    <div class="pro-img-box product-image">
                                        <a href="#">
                                            <img class=" pic-1" src="{{asset('admin/img/ecommerce/9.jpg')}}" alt="product-image">
                                            <img class="pic-2" src="{{asset('admin/img/ecommerce/09.jpg')}}" alt="product-image-1">
                                        </a>
                                        <ul class="icons">
                                            <li><a href="#" class="info-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" class="primary-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-pencil"></i></a></li>
                                            <li><a href="#" class="secondary-gradient" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Quick View" aria-label="Quick View"><i class="fas fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center pt-2">
                                        <h5 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">Product name</h5>
                                        <span class="tx-10 ms-auto">
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star-half text-warning"></i>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet...</p>
                                        <strong> $99.99</strong> | <strong class="text-success">in stock</strong>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="checkbox" class="listing_checkbox" name="" id="item">
                                    <label for="item">Select item</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
                            <div class="card">
                                <div class="card-body h-100  product-grid6">
                                    <div class="pro-img-box product-image">
                                        <a href="#">
                                            <img class=" pic-1" src="{{asset('admin/img/ecommerce/9.jpg')}}" alt="product-image">
                                            <img class="pic-2" src="{{asset('admin/img/ecommerce/09.jpg')}}" alt="product-image-1">
                                        </a>
                                        <ul class="icons">
                                            <li><a href="#" class="info-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" class="primary-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-pencil"></i></a></li>
                                            <li><a href="#" class="secondary-gradient" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Quick View" aria-label="Quick View"><i class="fas fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center pt-2">
                                        <h5 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">Product name</h5>
                                        <span class="tx-10 ms-auto">
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star-half text-warning"></i>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet...</p>
                                        <strong> $99.99</strong> | <strong class="text-success">in stock</strong>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="checkbox" class="listing_checkbox" name="" id="item">
                                    <label for="item">Select item</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
                            <div class="card">
                                <div class="card-body h-100  product-grid6">
                                    <div class="pro-img-box product-image">
                                        <a href="#">
                                            <img class=" pic-1" src="{{asset('admin/img/ecommerce/9.jpg')}}" alt="product-image">
                                            <img class="pic-2" src="{{asset('admin/img/ecommerce/09.jpg')}}" alt="product-image-1">
                                        </a>
                                        <ul class="icons">
                                            <li><a href="#" class="info-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" class="primary-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-pencil"></i></a></li>
                                            <li><a href="#" class="secondary-gradient" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Quick View" aria-label="Quick View"><i class="fas fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center pt-2">
                                        <h5 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">Product name</h5>
                                        <span class="tx-10 ms-auto">
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star-half text-warning"></i>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet...</p>
                                        <strong> $99.99</strong> | <strong class="text-success">in stock</strong>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="checkbox" class="listing_checkbox" name="" id="item">
                                    <label for="item">Select item</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
                            <div class="card">
                                <div class="card-body h-100  product-grid6">
                                    <div class="pro-img-box product-image">
                                        <a href="#">
                                            <img class=" pic-1" src="{{asset('admin/img/ecommerce/9.jpg')}}" alt="product-image">
                                            <img class="pic-2" src="{{asset('admin/img/ecommerce/09.jpg')}}" alt="product-image-1">
                                        </a>
                                        <ul class="icons">
                                            <li><a href="#" class="info-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" class="primary-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-pencil"></i></a></li>
                                            <li><a href="#" class="secondary-gradient" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Quick View" aria-label="Quick View"><i class="fas fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center pt-2">
                                        <h5 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">Product name</h5>
                                        <span class="tx-10 ms-auto">
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star-half text-warning"></i>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet...</p>
                                        <strong> $99.99</strong> | <strong class="text-success">in stock</strong>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="checkbox" class="listing_checkbox" name="" id="item">
                                    <label for="item">Select item</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
                            <div class="card">
                                <div class="card-body h-100  product-grid6">
                                    <div class="pro-img-box product-image">
                                        <a href="#">
                                            <img class=" pic-1" src="{{asset('admin/img/ecommerce/9.jpg')}}" alt="product-image">
                                            <img class="pic-2" src="{{asset('admin/img/ecommerce/09.jpg')}}" alt="product-image-1">
                                        </a>
                                        <ul class="icons">
                                            <li><a href="#" class="info-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" class="primary-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-pencil"></i></a></li>
                                            <li><a href="#" class="secondary-gradient" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Quick View" aria-label="Quick View"><i class="fas fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center pt-2">
                                        <h5 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">Product name</h5>
                                        <span class="tx-10 ms-auto">
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star-half text-warning"></i>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet...</p>
                                        <strong> $99.99</strong> | <strong class="text-success">in stock</strong>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="checkbox" class="listing_checkbox" name="" id="item">
                                    <label for="item">Select item</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
                            <div class="card">
                                <div class="card-body h-100  product-grid6">
                                    <div class="pro-img-box product-image">
                                        <a href="#">
                                            <img class=" pic-1" src="{{asset('admin/img/ecommerce/9.jpg')}}" alt="product-image">
                                            <img class="pic-2" src="{{asset('admin/img/ecommerce/09.jpg')}}" alt="product-image-1">
                                        </a>
                                        <ul class="icons">
                                            <li><a href="#" class="info-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" class="primary-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-pencil"></i></a></li>
                                            <li><a href="#" class="secondary-gradient" data-bs-placement="top" data-bs-toggle="tooltip" title="" data-bs-original-title="Quick View" aria-label="Quick View"><i class="fas fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center pt-2">
                                        <h5 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">Product name</h5>
                                        <span class="tx-10 ms-auto">
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star text-warning"></i>
													<i class="fas fa-star-half text-warning"></i>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet...</p>
                                        <strong> $99.99</strong> | <strong class="text-success">in stock</strong>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="checkbox" class="listing_checkbox" name="" id="item">
                                    <label for="item">Select item</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Listings status
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-check col-12">
                                    <input class="form-check-input" data-id="3"  type="radio" name="listing_status" @if (Session::get('listing_status')=='all_listings') checked @endif id="all_listings">
                                    <label class="form-check-label" for="all_listings">
                                        All listings - {{getListingsCount(Session::get('store_id'))}}
                                    </label>
                                </div>
                                <div class="form-check col-12">
                                    <input class="form-check-input"   type="radio" name="listing_status" @if (Session::get('listing_status')=='active_listings') checked @endif data-id="1" id="active_listings">
                                    <label class="form-check-label" for="active_listings">
                                        Active listings - {{getListingActiveCount(Session::get('store_id'))}}
                                    </label>
                                </div>
                                <div class="form-check col-12">
                                    <input class="form-check-input"  type="radio" name="listing_status" @if (Session::get('listing_status')=='deactive_listings') checked @endif data-id="0" id="deactive_listings">
                                    <label class="form-check-label" for="deactive_listings">
                                        Deactive listings - {{getListingDeactiveCount(Session::get('store_id'))}}
                                    </label>
                                </div>
                                <div class="form-check col-12">
                                    <input class="form-check-input" type="radio" name="listing_status" @if (Session::get('listing_status')=='deleted_listings') checked @endif data-id="2" id="deleted_listings">
                                    <label class="form-check-label" for="deleted_listings">
                                        Deleted listings - {{getListingDeletedCount(Session::get('store_id'))}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Category</div>
                            <div class="card-body">
                                <select name="category_id" class="form-control" id="">
                                    <option disabled selected>Please select one item</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->


        </div>
        <!-- Container closed -->
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#selectAll').click(function() {
                if ($(this).prop('checked')) {
                    $('.listing_checkbox').prop('checked', true);
                } else {
                    $('.listing_checkbox').prop('checked', false);
                }
            });
        });

        $('#all_listings').click(function(){
            var all_listings = $(this).attr('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.stores.store_manager.getListings')}}",
                type: "POST",
                data: {
                    "listing_status":all_listings
                },
                success:function(data)
                {
                    $('#listing_status').html(data);
                }
            })
        });

        $('#active_listings').click(function(){
            var active_listings = $(this).attr('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.stores.store_manager.getListings')}}",
                type: "POST",
                data: {
                    "listing_status":active_listings
                },
                success:function(data)
                {
                    $('#listing_status').html(data);
                }
            })
        });

        $('#deactive_listings').click(function(){
            var deactive_listings = $(this).attr('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.stores.store_manager.getListings')}}",
                type: "POST",
                data: {
                    "listing_status":deactive_listings
                },
                success:function(data)
                {
                    $('#listing_status').html(data);
                }
            })
        });

        $('#deleted_listings').click(function(){
            var deleted_listings = $(this).attr('data-id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.stores.store_manager.getListings')}}",
                type: "POST",
                data: {
                    "listing_status":deleted_listings
                },
                success:function(data)
                {
                    $('#listing_status').html(data);
                }
            })
        });


    </script>
@endsection
