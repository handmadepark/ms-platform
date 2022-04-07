@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Settings</span>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title  mg-b-10">Category treeview </h3>
                            <p class="mg-b-20">You can add sub and clild categories from here.</p>
                            <div class="row">
                                <!-- col -->
                                @foreach($categories as $cat)
                                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 mt-4 mt-lg-0">
                                        <ul id="tree2" class="tree">
                                            <li class="branch">
                                                <i class="fas fa-folder"></i>
                                                <a href="javascript:void(0);">{{$cat->name}}</a>
                                                <ul>
                                                    @foreach($cat->getSubCategories as $sub)
                                                        <li class="branch">
                                                            <i class="fas fa-folder text-warning"></i>
                                                            <input type="text" class="form-control form-control-sm" name="name" value="{{$sub->name}}" id="">
                                                            <ul>
                                                                @foreach($sub->getChildCategory as $child)
                                                                    <li class="branch"><i class="fas fa-folder"></i>
                                                                        <input type="text" class="form-control form-control-sm" name="name" value="{{$child->name}}" id="">
                                                                        <ul>
                                                                            <li>Report1</li>
                                                                            <li>Report2</li>
                                                                            <li>Report3</li>
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
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
            <!-- row -->


        </div>
        <!-- Container closed -->
    </div>
@endsection
