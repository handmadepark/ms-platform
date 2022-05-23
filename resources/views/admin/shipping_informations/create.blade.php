@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">New Shipping service</h4>
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
                <div class="card-body">
                    <form action="{{route('admin.shipping_informations.store')}}" method="POST">
                        @csrf

                         <div class="form-group">
                            <label for="country_id">Country</label>
                            <select class="form-control" id="country_id" name="country_id">
                                <option disabled selected>Please select country</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country_id'))
                                <p class="text-danger">{{ $errors->first('country_id') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_name">Company name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" aria-describedby="emailHelp" placeholder="Enter company name">
                            @if($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('company_name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                            @if($errors->has('description'))
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Date range</label>
                            @foreach($mainlands as $mainland)
                            <div class="form-inline mt-3">
								  <label class=" col-1">{{$mainland->name}}</label>                            	
							      <select class="form-control col-2" id="delivery_time" name="min_day[]">
							      	<option>1</option>
							      	<option>2</option>
							      	<option>3</option>
							      	<option>4</option>
							      	<option>5</option>
							      	<option>6</option>
							      	<option>7</option>
							      	<option>8</option>
							      	<option>9</option>
							      	<option>10</option>
							      	<option>11</option>
							      	<option>12</option>
							      	<option>13</option>
							      	<option>14</option>
							      	<option>15</option>
							      	<option>16</option>
							      	<option>17</option>
							      	<option>18</option>
							      	<option>19</option>
							      	<option>20</option>
							      	<option>21</option>
							      	<option>22</option>
							      	<option>23</option>
							      	<option>24</option>
							      	<option>25</option>
							      	<option>26</option>
							      	<option>27</option>
							      	<option>28</option>
							      	<option>29</option>
							      	<option>30</option>
							      	<option>31</option>
							      </select> 
							      &nbsp; - &nbsp;

							      <select class="form-control col-2" id="delivery_time" name="max_day[]">
							      	<option>1</option>
							      	<option>2</option>
							      	<option>3</option>
							      	<option>4</option>
							      	<option>5</option>
							      	<option>6</option>
							      	<option>7</option>
							      	<option>8</option>
							      	<option>9</option>
							      	<option>10</option>
							      	<option>11</option>
							      	<option>12</option>
							      	<option>13</option>
							      	<option>14</option>
							      	<option>15</option>
							      	<option>16</option>
							      	<option>17</option>
							      	<option>18</option>
							      	<option>19</option>
							      	<option>20</option>
							      	<option>21</option>
							      	<option>22</option>
							      	<option>23</option>
							      	<option>24</option>
							      	<option>25</option>
							      	<option>26</option>
							      	<option>27</option>
							      	<option>28</option>
							      	<option>29</option>
							      	<option>30</option>
							      	<option>31</option>
							      </select>

							</div>
							@endforeach

                            @if($errors->has('description'))
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option disabled selected>Please select</option>
                                <option value="0">Deactive</option>
                                <option value="1">Active</option>
                            </select>
                            @if($errors->has('status'))
                                <p class="text-danger">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection
