@extends('admin.layouts.master')
@section('content')

<div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Validation -->
                        <div class="intro-y box" style="margin-left:auto; margin-right:auto">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Add new store
                                </h2>
                                
                            </div>
                            <div id="form-validation" class="p-5">
                                <div class="preview">
                                    <!-- BEGIN: Validation Form -->
                                    <form action="{{ route('admin.stores.store') }}" method="POST">
                                    @csrf
                                    <div class="input-form mt-3">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Shop country <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 2 characters</span> </label>
                                            <select name="country_id" id="country_id" class="form-control">
                                               <option disabled selected>Please select one item</option>
                                               @foreach($countries as $country)
                                               <option value="{{ $country->id }}">{{ $country->name }}</option>
                                               @endforeach
                                            </select>
                                        </div>

                                        <div class="input-form mt-3">
                                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Shop name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 4 and 20 characters</span> </label>
                                            <input id="validation-form-1" type="text" name="name" class="form-control" placeholder="please insert shop nameLegend" minlength="4" maxlength="20" required="">
                                        </div>


                                        <div class="input-form mt-3">
                                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email address format</span> </label>
                                            <input id="validation-form-2" type="email" name="email" class="form-control" placeholder="example@gmail.com" required="">
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 6 characters</span> </label>
                                            <input id="validation-form-3" type="password" name="password" class="form-control" placeholder="secret" minlength="6" required="">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-5">Save</button>
                                    </form>
                                  
                                    <!-- END: Failed Notification Content -->
                                </div>
                                
                            </div>
                        </div>
                        <!-- END: Form Validation -->
                    </div>
                </div>

@endsection