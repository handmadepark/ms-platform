@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{$item->option_name}}</h4>
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
                        <form action="{{route('admin.pvoptions.update', ['id'=>$item->id])}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="pv_id">Variation</label>
                                <select name="pv_id" id="pv_id" class="form-control">
                                    <option selected disabled>Please select one item</option>
                                    @foreach($variations as $variation)
                                    <option value="{{$variation->id}}" {{$item->pv_id==$variation->id ? 'selected' : ''}}>{{$variation->variation_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('pv_id'))
                                <p class="text-danger">{{ $errors->first('pv_id') }}</p>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="name">Option name</label>
                            <input type="text" class="form-control" name="option_name" id="name" aria-describedby="emailHelp" value="{{ $item->option_name }}">
                            @if($errors->has('option_name'))
                                        <p class="text-danger">{{ $errors->first('option_name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option disabled selected>Please select</option>
                                <option value="0" {{$item->status==0 ? 'selected' : ''}}>Deactive</option>
                                <option value="1"  {{$item->status==1 ? 'selected' : ''}}>Active</option>
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
