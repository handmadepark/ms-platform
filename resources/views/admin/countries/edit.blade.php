@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{$item_selected->name}}</h4>
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
                            <form action="{{route('admin.countries.update', ['id'=>$item_selected->id])}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Mainlands</label>
                                    <select name="mainland_id" class="form-control" id="mainland_id">
                                        <option disabled selected> Please select mainland</option>
                                        @foreach($mainlands as $mainland)
                                        <option value="{{ $mainland->id }}" {{ ($mainland->id == $item_selected->mainland_id) ? 'selected' : '' }}>{{ $mainland->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Country name</label>
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{$item_selected->name}}">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
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
