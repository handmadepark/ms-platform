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
                        <button class="btn btn-light">
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
                        <a href="{{route('admin.stores.store_manager.listings.create')}}">
                            <button class="btn btn-light">
                                <span><i class="fas fa-plus"></i></span>
                                Add new listing</button>
                        </a>
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
                                                <li><a href="" class="info-gradient me-2" data-bs-placement="top" data-bs-toggle="tooltip" title=""><i class="fa fa-eye"></i></a></li>
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
                                <div class="form-check mt-2 col-12">
                                    <a href="{{route('admin.stores.store_manager.listings.active')}}">
                                        <button class="btn btn-sm btn-dark-light w-100" >
                                            @if(Session::get('listing_status')=='active')
                                                <span>
                                                    <i class="fas fa-check"></i>
                                                </span>
                                            @endif
                                            Active - {{getListingActiveCount(Session::get('store_id'))}}
                                        </button>
                                    </a>
                                </div>
                                <div class="form-check mt-2 col-12">
                                    <a href="{{route('admin.stores.store_manager.listings.deactive')}}">
                                        <button class="btn btn-sm btn-dark-light w-100">
                                            @if(Session::get('listing_status')=='deactive')
                                                <span>
                                                    <i class="fas fa-check"></i>
                                                </span>
                                            @endif
                                            Deactive - {{getListingDeactiveCount(Session::get('store_id'))}}
                                        </button>
                                    </a>
                                </div>
                                <div class="form-check mt-2 col-12">
                                    <a href="{{route('admin.stores.store_manager.listings.deleted')}}">
                                        <button class="btn btn-sm btn-dark-light w-100">
                                            @if(Session::get('listing_status')=='deleted')
                                                <span>
                                                    <i class="fas fa-check"></i>
                                                </span>
                                            @endif
                                            Deleted - {{getListingDeletedCount(Session::get('store_id'))}}
                                        </button>
                                    </a>
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

        {{--$('.form-check-input').change(function(e){--}}
        {{--    var dataId = $(this).data('id');--}}
        {{--    $post = $(this);--}}
        {{--    $.ajaxSetup({--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        }--}}
        {{--    });--}}
        {{--    $.ajax({--}}
        {{--        url: "{{route('admin.stores.store_manager.getListings')}}",--}}
        {{--        type: "GET",--}}
        {{--        data: {--}}
        {{--            "listing_status":dataId--}}
        {{--        },--}}
        {{--        success:function(data)--}}
        {{--        {--}}
        {{--            $('#listing_status').html(data);--}}
        {{--        }--}}
        {{--    })--}}
        {{--});--}}
    </script>
@endsection
