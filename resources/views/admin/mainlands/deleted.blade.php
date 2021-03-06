@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Deleted mainlands</h4>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0 text-md-nowrap text-center" id="mainlands">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Operations</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mainlands as $mainland)
                                        <tr>
                                            <td>{{$mainland->id}}</td>
                                            <td>{{$mainland->name}}</td>
                                            <td>
                                                @if($mainland->status==1)
                                                    <button class="btn btn-sm btn-outline-success">Active</button>
                                                @else
                                                    <button class="btn btn-sm btn-outline-warning">Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.mainlands.restore', ['id'=>$mainland->id])  }}">
                                                    <button class="btn btn-sm btn-info">
                                                        <span><i class="fas fa-redo-alt"></i></span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
            $('#mainlands').DataTable();
        } );
    </script>
@endsection
