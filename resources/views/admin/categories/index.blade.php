@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Categories</h4>
                                <div class="float-end">
                                    <a href="{{route('admin.categories.deleted')}}">
                                        <button class="btn btn-sm btn-outline-warning">
                                            <span><i class="fas fa-trash text-danger"></i></span>
                                            Deleted categories - {{$count_deleted}}
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.categories.create') }}">
                                        <button class="btn btn-sm btn-info">
                                            <span><i class="fas fa-plus"></i></span>
                                            New category
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- col -->
                                @foreach($categories as $cat)
                                    <div class="col-lg-6 col-xl-4 col-md-12 col-sm-12 mt-4 mt-lg-0">
                                        <ul id="tree2" class="tree">
                                            <li class="branch"><i class="fas fa-folder"></i><a href="javascript:void(0);">Treeview1</a>
                                                <ul>
                                                    <li style="display: none;">Company Maintenance</li>
                                                    <li class="branch" style="display: none;"><i class="fas fa-folder"></i>Employees
                                                        <ul>
                                                            <li class="branch" style="display: none;"><i class="fas fa-folder"></i>Reports
                                                                <ul>
                                                                    <li style="display: none;">Report1</li>
                                                                    <li style="display: none;">Report2</li>
                                                                    <li style="display: none;">Report3</li>
                                                                </ul>
                                                            </li>
                                                            <li class="branch" style="display: none;"><i class="fas fa-folder"></i>Employee Maint.
                                                                <ul>
                                                                    <li class="branch" style="display: none;"><i class="fas fa-folder"></i>Reports
                                                                        <ul>
                                                                            <li style="display: none;">Report1</li>
                                                                            <li style="display: none;">Report2</li>
                                                                            <li style="display: none;">Report3</li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="branch" style="display: none;"><i class="fas fa-folder"></i>Employee Maint.<ul>
                                                                            <li class="branch" style="display: none;"><i class="fas fa-folder"></i>Reports
                                                                                <ul>
                                                                                    <li style="display: none;">Report1</li>
                                                                                    <li style="display: none;">Report2</li>
                                                                                    <li style="display: none;">Report3</li>
                                                                                </ul>
                                                                            </li>
                                                                            <li style="display: none;">Employee Maint.</li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li style="display: none;">Human Resources</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                 @endforeach
                            <!-- /col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
