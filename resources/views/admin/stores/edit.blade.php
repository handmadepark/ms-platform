@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{$item_selected->name}} - Edit store</h4>
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
                        <form action="{{route('admin.stores.update', ['id'=>$item_selected->id])}}" method="POST">
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
                                                    <option value="{{$country->id}}" {{($item_selected->country_id == $country->id) ? 'selected' : ''}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($errors->has('country_id'))
                                            <p class="text-danger">{{ $errors->first('country_id') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg">
                                        <label for="name">Store name</label>
                                        <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">
                                              <i class="fas fa-shopping-cart"></i>
                                              </span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" value="{{$item_selected->name}}" type="text" name="name">
                                        </div>
                                        @if($errors->has('name'))
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg">
                                        <div class="col-lg">
                                            <label for="phone">Store phone</label>
                                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-phone"></i>
                              </span>
                                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" value="{{$item_selected->phone}}" type="text" name="phone">
                                            </div>
                                            @if($errors->has('phone'))
                                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                                            @endif
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
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" value="{{$item_selected->related_person}}" type="text" name="related_person">
                                        </div>
                                        @if($errors->has('related_person'))
                                            <p class="text-danger">{{ $errors->first('related_person') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg">
                                        <label for="login">Store login</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" value="{{$item_selected->login}}" type="text" name="login">
                                        </div>
                                        @if($errors->has('login'))
                                            <p class="text-danger">{{ $errors->first('login') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg">
                                        <label for="password">Store password</label>
                                        <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-key"></i>
                              </span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="********" type="password" name="password">
                                        </div>
                                        @if($errors->has('password'))
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row row-sm mg-t-20">

                                    <div class="col-lg">
                                        <label for="address">Address</label>
                                        <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-map-marker"></i>
                              </span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" value="{{$item_selected->address}}" type="text" name="address">
                                        </div>
                                        @if($errors->has('address'))
                                            <p class="text-danger">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-lg">
                                        <label for="address">Store email</label>
                                        <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">
                                              <i class="fas fa-envelope"></i>
                                              </span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter new email address" type="email" name="email[]">
                                            <button class="btn btn-info" id="new_email_button" type="button">
                                                <span><i class="fas fa-plus"></i></span>
                                            </button>
                                        </div>
                                        @if($errors->has('email'))
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif

                                        <div id="new_email_section">
                                            @foreach(json_decode($item_selected->email) as $email)
                                                <div class="input-group mb-3">
                                                     <span class="input-group-text" id="basic-addon1">
                                                      <i class="fas fa-envelope"></i>
                                                      </span>
                                                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" value="{{$email}}" type="email" name="email[]">
                                                    <button class="btn btn-danger" id="remove_email_field" type="button">
                                                        <span><i class="fas fa-close"></i></span>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>


                                    </div>

                                    <div class="col-lg">
                                        <label for="address">Store social network links</label>
                                        <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">
                                              <i class="fas fa-globe"></i>
                                              </span>
                                            <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter new shop social address" type="url" name="social[]">
                                            <button class="btn btn-info" id="new_social_button" type="button">
                                                <span><i class="fas fa-plus"></i></span>
                                            </button>
                                        </div>
                                        @if($errors->has('social'))
                                            <p class="text-danger">{{ $errors->first('social') }}</p>
                                        @endif

                                        <div id="new_social_section">
                                            @foreach(json_decode($item_selected->social) as $social)
                                                <div class="input-group mb-3">
                                                     <span class="input-group-text" id="basic-addon1">
                                                      <i class="fas fa-globe"></i>
                                                      </span>
                                                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" value="{{$social}}" type="url" name="social[]">
                                                    <button class="btn btn-danger" id="remove_social_field" type="button">
                                                        <span><i class="fas fa-close"></i></span>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>


                                    </div>


                                </div>
                                <div class="checkbox">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="who_manage" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1" {{($item_selected->who_manage)  == 1 ? 'checked' : ''}}>
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

            <div class="row row-sm">
                <div class="col-xl-8">
                    <div class="card mg-b-20">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Payment cards</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0 text-md-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name on card</th>
                                        <th>Card number</th>
                                        <th>Expiration date</th>
                                        <th>Default</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($item_selected->getCards as $card)
                                        <tr>
                                            <td>{{$card->id}}</td>
                                            <td>{{$card->name_on_card}}</td>
                                            <td>**** **** **** {{ substr(Crypt::decryptString($card->card_number), -4)}}</td>
                                            <td>{{$card->expiration_month}} / {{$card->expiration_year}}</td>
                                            <td>
                                                @if($card->main == 1)
                                                    <p class="text-default">Default</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($card->status == 1)
                                                    <p class="text-success">Active</p>
                                                @else
                                                    <p class="text-danger">Inactive</p>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm">
                                            <span>
                                                <i class="fas fa-eye"></i>
                                            </span>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-danger text-center">There is no payment card</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto d-block">
                    <div class="card card-body pd-20 pd-md-40 border shadow-none">
                        <h5 class="card-title mg-b-20">{{$item_selected->name}} - payment details</h5>
                        <form action="{{route('admin.paymentCards.store')}}" method="POST">
                            @csrf
                            <input type="hidden"  name="store_id" id="store_id" value="{{$item_selected->id}}">
                            <div class="form-group">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Name on Card</label>
                                <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1">
                                      <i class="fas fa-user"></i>
                                      </span>
                                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" type="text" name="name_on_card">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Card Number</label>
                                <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                              <i class="fas fa-credit-card"></i>
                              </span>
                                    <input aria-describedby="basic-addon1" aria-label="Username" id="card_number" class="form-control" type="text" name="card_number">
                                </div>

                            </div>
                            <div class="d-flex pos-absolute t-5 r-10">
                                <img alt="" id="visa" class="wd-30 mg-r-5" src="{{asset('admin/img/visa.png')}}">
                                <img alt="" id="master" class="wd-30" src="{{asset('admin/img/mastercard.png')}}">
                            </div>
                            <div class="form-group">
                                <div class="row row-sm">
                                    <div class="col-sm-9">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Expiration Date</label>
                                        <div class="row row-sm">
                                            <div class="col-sm-7">
                                                <select name="expiration_month" id="expiration_month" class="form-control">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                    <option value="9">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                                <select name="expiration_year" id="expiration_year" class="form-control">
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                    <option value="2031">2031</option>
                                                    <option value="2031">2031</option>
                                                    <option value="2032">2032</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 mg-t-20 mg-sm-t-0">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">CVC
                                        </label>
                                        <input class="form-control" required="" name="cvc" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class=" mb-4">
                                <label for="">
                                <input type="checkbox" name="main" id="main">
                                Set as default payment card</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add Payment card</button>
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
                    $(wrapper).append(' <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-envelope"></i> </span> <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter shop address" type="email" name="email[]"> <button class="btn btn-danger" id="remove_email_field" type="button"> <span><i class="fas fa-close"></i></span> </button></div>');
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
        });

        $(document).ready(function(){
            $('#card_number').keyup(function(){
                var value = $(this).val();
                if (value.indexOf("4")==0) {
                    $('#visa').fadeIn("slow");
                    $('#master').fadeOut("slow");
                }
                else if(value.indexOf("5")==0) {
                    $('#master').fadeIn("slow");
                    $('#visa').fadeOut("slow");
                }
                else {
                    $('#master').fadeIn("slow");
                    $('#visa').fadeIn("slow");
                }
            })
        });
    </script>
@endsection
