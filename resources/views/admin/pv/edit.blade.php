@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{$item_selected->variation_name}}</h4>
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
                            <form action="{{route('admin.pv.update', ['id'=>$item_selected->id])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="variation_name">Price variation name</label>
                                    <input type="text" class="form-control" name="variation_name" id="name" aria-describedby="emailHelp" value="{{$item_selected->variation_name}}">
                                    @if($errors->has('variation_name'))
                                        <p class="text-danger">{{ $errors->first('variation_name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="input_type">Input Type</label>
                                    <select name="input_type" id="input_type" class="form-control">
                                        <option disabled selected>Please select</option>
                                        @foreach($types as $type)
                                        <option value="{{ $type->input_type }}" {{ ($type->input_type==$item_selected->input_type ? 'selected' : '') }}>{{ $type->input_type }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('input_type'))
                                        <p class="text-danger">{{ $errors->first('input_type') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option disabled selected>Please select</option>
                                        <option value="0" {{ $item_selected->status==0 ? 'selected' : ''  }}>Deactive</option>
                                        <option value="1" {{ $item_selected->status==1 ? 'selected' : ''  }}>Active</option>
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
