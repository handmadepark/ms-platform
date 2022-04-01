@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
                <div class="row row-sm">
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mg-b-0">New Store</h4>
                                    <div class="float-end">
                                        <a href="{{ URL::previous() }}">
                                            <button class="btn btn-sm btn-danger">
                                                <span><i class="fas fa-arrow-left"></i></span>
                                                Back
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('admin.stores.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label for="country_id">Store country</label>
                                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-flag"></i>
                              </span>
                                                <select name="country_id" class="form-control" id="country_id">
                                                    <option disabled selected>Please select</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <label for="name">Store name</label>
                                            <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">
                                              <i class="fas fa-shopping-cart"></i>
                                              </span>
                                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop name" type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="col-lg">
                                                <label for="phone">Store phone</label>
                                                <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-phone"></i>
                              </span>
                                                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop phone" type="text" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-sm mg-t-20">

                                        <div class="col-lg">
                                            <label for="related_person">Related person</label>
                                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <span>
                              <i class="fas fa-user"></i>
                              </span>
                              </span>
                                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop related person" type="text" name="related_person">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <label for="login">Store login</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop login" type="text" name="login">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <label for="password">Store password</label>
                                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-key"></i>
                              </span>
                                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="********" type="password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-sm mg-t-20">

                                        <div class="col-lg">
                                            <label for="address">Address</label>
                                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-map-marker"></i>
                              </span>
                                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop address" type="text" name="address">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <label for="address">Store email</label>
                                            <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">
                                              <i class="fas fa-envelope"></i>
                                              </span>
                                              <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop address" type="email" name="email[]">
                                                <button class="btn btn-info" id="new_email_button" type="button">
                                                    <span><i class="fas fa-plus"></i></span>
                                                </button>
                                            </div>

                                            <div class="input-group mb-3" id="new_email_section">
                                            </div>

                                        </div>

                                        <div class="col-lg">
                                            <label for="address">Store Social networks</label>
                                            <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">
                                              <i class="fas fa-globe"></i>
                                              </span>
                                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop social networks" type="url" name="social[]">
                                                <button class="btn btn-info" id="new_social_button" type="button">
                                                    <span><i class="fas fa-plus"></i></span>
                                                </button>
                                            </div>

                                            <div class="input-group mb-3" id="new_social_section"></div>

                                        </div>

                                    </div>
                                    <div class="checkbox">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="who_manage" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label mt-1">We manage this store</label>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    @endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var max_fields  = 5;
            var wrapper     = $('#new_email_section');
            var add_button  = $('#new_email_button');

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x<=max_fields){
                    x++;
                $(wrapper).append('<div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-envelope"></i> </span> <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop address" type="email" name="email[]"> <button class="btn btn-danger" id="remove_email_field" type="button"> <span><i class="fas fa-close"></i></span> </button> </div>');
                }
            });

            $(wrapper).on("click", "#remove_email_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });

        $(document).ready(function(){
            var max_fields  = 5;
            var wrapper     = $('#new_social_section');
            var add_button  = $('#new_social_button');

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x<=max_fields){
                    x++;
                    $(wrapper).append('<div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-globe"></i> </span> <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop social network" type="url" name="social[]"> <button class="btn btn-danger" id="remove_social_field" type="button"> <span><i class="fas fa-close"></i></span> </button> </div>');
                }
            });

            $(wrapper).on("click", "#remove_social_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        })
    </script>
@endsection
