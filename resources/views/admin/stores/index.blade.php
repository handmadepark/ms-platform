@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Stores</h4>
                                <div class="float-end">
                                    <a href="{{route('admin.stores.deleted')}}">
                                        <button class="btn btn-sm btn-outline-warning">
                                            <span><i class="fas fa-trash"></i></span>
                                            Deleted stores - {{$count_deleted}}
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.stores.create') }}">
                                        <button class="btn btn-sm btn-info">
                                            <span><i class="fas fa-plus"></i></span>
                                            New store
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0 text-md-nowrap text-center" id="stores">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Who manage</th>
                                        <th>Opening date</th>
                                        <th>Payment Card</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($stores as $store)
                                        <tr>
                                            <td>{{$store->id}}
                                            </td>
                                            <td>
                                                <a href="{{route('admin.stores.edit', ['id'=>$store->id])}}">
                                                    {{$store->name}}
                                                </a>
                                            </td>
                                            <td>{{$store->getCountry['name']}}</td>
                                            <td>
                                                @if($store->who_manage==1)
                                                <p class="text-primary">We manage this store</p>
                                                @else
                                                <p class="text-warning">Store owner</p>
                                                @endif
                                            </td>
                                            <td>{{$store->created_at->format('j F Y')}}</td>
                                            <td>
                                                {{ $store->getCards->count() }}

                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="check_status" {{ ($store->status==1) ? 'checked' : ''}}>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="">
                                                    <button class="btn btn-sm btn-info">
                                                        <span><i class="fas fa-eye"></i></span>
                                                    </button>
                                                </a>
                                                <a href="{{route('admin.stores.edit', ['id'=>$store->id])}}">
                                                    <button class="btn btn-sm btn-primary">
                                                        <span><i class="fas fa-pen"></i></span>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin.stores.store_manager', ['id'=>$store->id]) }}">
                                                    <button class="btn btn-sm btn-warning">
                                                        <span><i class="fas fa-cog"></i></span>
                                                    </button>
                                                </a>
                                                <a href="{{route('admin.stores.destroy', ['id'=>$store->id])}}">
                                                    <button class="btn btn-sm btn-danger">
                                                        <span><i class="fas fa-trash"></i></span>
                                                    </button>
                                                </a>

                                            </td>
                                        </tr>


                                    @empty
                                    <tr>
                                        <td colspan="8">
                                            <p class="text-danger text-center">There is no store</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#stores').DataTable();
        } );

    </script>
@endsection
