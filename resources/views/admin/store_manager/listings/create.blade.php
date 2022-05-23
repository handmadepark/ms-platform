@extends('admin.store_manager.layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/sorting_gallery_web_master/style.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/sorting_gallery_web_master/libs/cropper/style.css') }}">
    <!--Internal Sumoselect css-->
	<link rel="stylesheet" href="{{ asset('admin/plugins/sumoselect/sumoselect.css') }}">
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .personalization_checkox {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 18px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

            /* Hide the browser's default checkbox */
            .personalization_checkox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
            }

            /* Create a custom checkbox */
            .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            }

            /* When the checkbox is checked, add a blue background */
            .personalization_checkox input:checked ~ .checkmark {
            background-color: #2196F3;
            }

            /* Create the checkmark/indicator (hidden when not checked) */
            .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            }

            /* Show the checkmark when checked */
            .personalization_checkox input:checked ~ .checkmark:after {
            display: block;
            }

            /* Style the checkmark/indicator */
            .personalization_checkox .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            }

    </style>
@endsection
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Add a new listing</h4>
                <div class="float-end">
                    <a href="{{ URL::previous() }}">
                        <button class="btn btn-sm btn-danger">
                            <span><i class="fas fa-arrow-left"></i></span>
                            Back to listings
                        </button>
                    </a>
                </div>
            </div>
            <div class="row row-sm mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Photos</h4>
                                    <p>Add as many as you can so buyers can see every detail.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Photos *</strong>
                                    <p>Use up to ten photos to show your item's most important qualities.</p>
                                    <p>Tips:</p>
                                    <ul>
                                        <li>Use natural light and no flash.</li>
                                        <li>Include a common object for scale.</li>
                                        <li>Show the item being held, worn, or used.</li>
                                        <li>Shoot against a clean, simple background.</li>
                                        <li>Add photos to your variations so buyers can see all their options.</li>
                                    </ul>
                                </div>
                                <div class="col-md-8">
                                    <div class="box-images sortable">
                                        <div class="card-box add-image" onclick="selectImages(this)">
                                            <div class="inner-card">
                                                <img src="{{asset('admin/sorting_gallery_web_master/assets/add-img.svg')}}" alt="">
                                                <div class="title-box">
                                                    <p>Add a photo</p>
                                                </div>
                                                <input onchange="getImages(this)" type="file" multiple accept="image/png, image/gif, image/jpeg" hidden>
                                            </div>
                                        </div>
                                        <div class="modal-box">
                                            <div class="barrier" onclick="closeModal(this)"></div>
                                            <div class="img-box">
                                                <div class="main-img">
                                                    <img src="{{ asset('admin/img/files/image.png')}}" alt="">
                                                </div>
                                                <div class="close-btn" onclick="closeModal(this)">
                                                    <span><i class="fas fa-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cropper-box">
                                            <div class="barrier" onclick="closeCropper()"></div>
                                            <div class="content-crop">
                                                <div class="img-area">
                                                    <img src="" alt="">
                                                </div>
                                                <div class="close-btn" onclick="closeCropper()">
                                                    <span><i class="fas fa-close"></i></span>
                                                </div>
                                                <div class="options">
                                                    <div class="optionBtn" mode="4-3" onclick="reSetting(4 / 3, this)">
                                                        <div class="icon"></div>
                                                        <div class="optionTitle">
                                                            <span>4:3</span>
                                                        </div>
                                                    </div>
                                                    <div class="optionBtn" mode="5-3" onclick="reSetting(5 / 3, this)">
                                                        <div class="icon"></div>
                                                        <div class="optionTitle">
                                                            <span>5:3</span>
                                                        </div>
                                                    </div>
                                                    <div class="optionBtn default active" mode="16-9" onclick="reSetting(16 / 9, this)">
                                                        <div class="icon"></div>
                                                        <div class="optionTitle">
                                                            <span>16:9</span>
                                                        </div>
                                                    </div>
                                                    <div class="optionBtn" mode="21-9" onclick="reSetting(21 / 9, this)">
                                                        <div class="icon"></div>
                                                        <div class="optionTitle">
                                                            <span>21:9</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button-box">
                                                    <button class="btn btn-outline-danger cancel" onclick="closeCropper()">Cancel</button>
                                                    <button class="btn btn-outline-primary save" onclick="cutImg()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Video</h4>
                                    <p>Bring your product to life with a 5 to 15 second videoвЂ”it could help you drive more sales. The video won't feature sound, so let your product do the talking!</p>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong>Quick tips</strong>
                                        <ul>
                                            <li>Film wearable items on a model or show a functional item being used.</li>
                                            <li>Adjust your settings to record high resolution videoвЂ”aim for 1080p or higher.</li>
                                            <li>Crop your video after you upload it to get the right dimensions.</li>
                                        </ul>
                                        <a href="#">Learn how to make videos that sell</a>
                                        <br>
                                        <span class="btn btn-primary btn-file">
                                         <i class="fas fa-upload"></i>    Upload video... <input id="file-input" class="btn btn-sm btn-info button-icon" type="file" accept="video/*">
                                        </span>
                                    </div>
                                        <div class="col-md-4">
                                            <video id="video" width="300" height="300" controls></video>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="alert alert-info alert-dismissible" style="color:black; font-size:16px;">
                                                <span><i class="fas fa-warning text-warning"></i></span>
                                                <strong>Buyers are loving listing videos!</strong>
                                                <p>We know that shoppers are more likely to purchase an item if the listing includes a video. Cha-ching!*
                                                    *Based on a July 2020 analysis of over 5 million buyers, comparing the purchasing behavior of those who were shown listing videos to those who were not.
                                                </p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Listing title</h4>
                                    <p>Tell the world all about your item and why they'll love it.</p>
                                </div>
                            </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="title" class="col-sm-12 col-form-label"><strong>Title</strong></label>
                                        <p class="col-sm-12">Include keywords that buyers would use to search for your item.</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="category_id" class="col-sm-12 col-form-label"><strong>Category</strong></label>
                                        <p class="col-sm-12">
                                            Type a two- or three-word description of your item to get category suggestions that will help more shoppers find it.
                                        </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <select name="category_id" id="category_id" class="form-control form-control-lg select2" data-bs-placeholder="Select category">
                                                <option disabled selected>Search your product category ...</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{ (!is_null($category->parent) ? $category->parent['name'].' -> ' : '') }} {{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <small>Shoppers will find this item in all of these categories:</small>
                                        </div>
                                    </div>
                                </div>
                                <div id="variations_div">
                                
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                       <label for="description" class="col-sm-12 col-form-label"><strong>Description</strong></label>
                                       <p class="col-sm-12">Start with a brief overview that describes your itemвЂ™s finest features. Shoppers will only see the first few lines of your description at first, so make it count!
                                       Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <p>Preview listing as a Google search result</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="material" class="col-sm-12 col-form-label"><strong>Tags</strong> <small>Optional</small></label>
                                        <p class="col-sm-12">
                                            What words might someone use to search for your listings? Use all 13 tags to get found.
                                        </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <input data-role="tagsinput" name="material[]" id="material" placeholder="enter product material" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="materials" class="col-sm-12 col-form-label"><strong>Material </strong> <small>Optional</small></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <input data-role="tagsinput" name="materials[]" id="materials" placeholder="enter product materials" type="text">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Inventory and pricing</h4>
                                </div>
                            </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="price" class="col-sm-12 col-form-label"><strong>Price</strong></label>
                                        <p class="col-sm-12">Remember to factor in the costs of materials, labor, and other business expenses. If you offer free shipping, make sure to include the cost of shipping so it doesn't eat into your profits.</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="price">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="quantity" class="col-sm-12 col-form-label"><strong>Quantity *</strong></label>
                                        <p class="col-sm-12">
                                            For quantities greater than one, this listing will renew automatically until it sells out. YouвЂ™ll be charged a USD 0.20 USD listing fee each time.
                                        </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <input type="text" id="quantity" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="sku" class="col-sm-12 col-form-label"><strong>SKU</strong> <small>Optional</small></label>
                                        <p class="col-sm-12">
                                            SKUs are for your use only buyers want see them.
                                        </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <input type="text" id="sku" class="form-control">
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Variations
                                        <div class="float-end" id="edit_variations_button">
                                            <button class="btn btn-dark">
                                                <span>
                                                    <i class="fas fa-pencil"></i>
                                                </span>
                                                Edit Variations
                                            </button>
                                        </div>
                                    </h4>
                                </div>
                            </div>
                                <div class="row mb-3" id="variations_content">
                                    <div class="col-sm-3">
                                        <p class="col-sm-12">Remember to factor in the costs of materials, labor, and other business expenses. If you offer free shipping, make sure to include the cost of shipping so it doesn't eat into your profits.</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <a class="btn ripple btn-info" data-bs-target="#modaldemo3" data-bs-toggle="modal" href="#">Add variations</a>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Personalization
                                        <div class="float-end form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="personalization-checkbox">
                                        </div>
                                    </h4>
                                </div>
                            </div>
                                <div class="row mb-3">
                                    <p class="col-sm-12">Collect personalized information for this listing.</p>
                                    <div class="col-sm-12" id="personalization-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Instructions for buyers
                                                    </div>
                                                    <div class="card-body">
                                                        <p>Enter the personalization instructions you want buyers to see.</p>
                                                        <div class="mt-3">
                                                            <textarea name="" class="form-control" id="personalization_text" cols="30" rows="5"></textarea>
                                                        </div>
                                                        <div class="mt-2">
                                                        <label class="personalization_checkox">Personalization is optional
                                                            <input type="checkbox" id="personalization_checkox">
                                                            <span class="checkmark"></span>
                                                        </label> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="text-center">What the buyer will see</p>
                                                        <div class="card">
                                                            <strong>Add your personalization <small id="optional">(optional)</small></strong>
                                                            <p id="buyers_text">See item description for details</p>
                                                            <textarea name="" class="form-control" readonly id="" cols="30" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




                    <div class="modal fade" id="modaldemo3" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">Add variations</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true"><i class="fas fa-times"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <p>List all the options you offer. Buyers will see them in the order they are here.</p>
                                    <div id="variation_hidden_div">
                                        
                                    </div>
                                    <hr>
                                    <div class="form-row" id="variations_showen_div">
                                        <div class="form-group col-md-4">
                                        <label for="pv_id">Add a variation</label>
                                        <select name="pv_id" class="form-control" id="pv_id"></select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="button" id="save_changes">Save changes</button>
                                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection
@section('scripts')
    <!-- Sorging Gallery Web Master -->
    <script src="{{ asset('admin/sorting_gallery_web_master/main.js')}}"></script>
    <script src="{{ asset('admin/sorting_gallery_web_master/libs/cropper/cropper.js')}}"></script>
    <script src="{{ asset('admin/sorting_gallery_web_master/libs/cropper/jquery-cropper.js')}}"></script>
    <script src="{{ asset('admin/sorting_gallery_web_master/jquery-ui.js')}}"></script>
    <!--Internal Sumoselect js-->
		<script src="{{ asset('admin/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <script>

        const input = document.getElementById('file-input');
        const video = document.getElementById('video');
        const videoSource = document.createElement('source');

        input.addEventListener('change', function() {
            const files = this.files || [];

            if (!files.length) return;

            const reader = new FileReader();

            reader.onload = function (e) {
                videoSource.setAttribute('src', e.target.result);
                video.appendChild(videoSource);
                video.load();
                video.play();
            };

            reader.onprogress = function (e) {
                console.log('progress: ', Math.round((e.loaded * 100) / e.total));
            };
            reader.readAsDataURL(files[0]);
        });

        $(document).ready(function() {
            $('.select2').select2();
        });
        
        $(document).ready(function(){
            $('.select2').change(function (e){
                $('#variations_div').empty();
                e.preventDefault();
                let id = $(this).val();
                $.ajax({
                    type:"GET",
                    url:'{{url('admin/stores/listings/gv')}}'+"/"+id,
                    dataType:'json',
                    success:function(response)
                    {
                        $('#variations_div').append(response['html']); 
                        if(response['html'])
                        {
                            $('.testselect2').SumoSelect({search: true, searchText: 'Enter material..'});
                        } 
                    }
                }),

                $.ajax({
                    type:"GET",
                    url:'{{url('admin/stores/listings/gpv')}}'+"/"+id,
                    dataType:'json',
                    success:function(response)
                    {
                        $('#pv_id').html('');
                        $('#pv_id').html('<option disabled selected>Please select one item</>');
                        $('#pv_id').append(response['html']);
                    }
                });
            });
        });
        		
        $(document).on("change", "#scale_id", function(){
            var scale_id = this.value;
            var variation_id = $('#variation_hidden_id').val();            
            $.ajax({
                    type:"GET",
                    url:'{{url('admin/stores/listings/gso')}}'+"/"+scale_id+"/"+variation_id,
                    dataType:'json',
                    success:function(response)
                    {
                            $('#size').html('');
                            $.each(response, function(index, value) {
                                $('#size').append('<option value='+value.id+'>'+value.size_option_name+'</option>');
                            });
    						
    						$('#scale_size').html('');                        
                            $.each(response, function(index, value) {
                                $('#scale_size').append('<option value='+value.id+'>'+value.size_option_name+'</option>');
                            });
                            $('#scale_size').append('<option value="all">Add all option</option>');
                            $('#scale_div').hide();
                    }
                });
        });
        $('#variation_hidden_div').hide();
        let count = 0;
            $(document).on("change", "#pv_id",function (e){
                e.preventDefault();
                let id = $(this).val();
				
                    $.ajax({
                    type:"GET",
                    url:'{{url('admin/stores/listings/gpvo')}}'+"/"+id,
                    success:function(iresponse)
                    {
                        $('#variation_hidden_div').show();
                        count++;
                        if(count==2)
                        {
                            $('#variations_showen_div').hide();
                        }
                        $('#variation_hidden_div').append(iresponse);
                    }
                });
    
            });   
            

            function delete_variation_div(dataId)
            {
                $('#selected_variation[data-id="'+dataId+'"]').remove();
                count--;
                if(count==2)
                {
                    $('#variations_showen_div').hide();
                }
                else
                {
                	$('#variations_showen_div').show();
                }
            }
            
            
            var max_fields  = 13;
            var x = 1;
            $(document).on("click", "#pvnew_button", function(e){
            var pvnew_value = $('#pvnew').val();
                e.preventDefault();
                if(pvnew_value.length>0)
                {
                    if(x<=max_fields){
                        x++;
                        $('#pvnew_section').append('<div class="input-group mb-3"> <input aria-describedby="basic-addon1" aria-label="Username" data-id="'+x+'" readonly class="form-control" type="text" name="pvnew[]" id="pvnew_field"  value="'+pvnew_value+'"><button class="btn btn-dark" onclick="update_pvnew_field('+x+')" type="button"> <span><i class="fas fa-pencil"></i></span> </button> <button class="btn btn-danger" id="remove_pvnew_field" type="button"> <span><i class="fas fa-close"></i></span> </button></div>');
                    	$('#pvnew').val('');
                    }
                }
                else
                {
                	alert("Enter text...");
                }
            });
            
            function update_pvnew_field(dataId)
            {
            	$('#pvnew_field[data-id="'+dataId+'"]').prop('readonly', false);	
            }

            $(document).on("click", "#remove_pvnew_field", function(e){
                e.preventDefault();
                $(this).val('');
                $(this).parent('div').remove();
                x--;
            });
            
            
            $(document).on("change","#scale_size", function(e){
        		e.preventDefault();
        		var scale_id = $('[id=scale_id]:eq(1)').val();
        		let scale_size_id = $(this).val();
        		$.ajax({
                type:"GET",
                url:'{{url('admin/stores/listings/gsso')}}'+"/"+scale_id+"/"+scale_size_id,
                success:function(htmlresponse){
        				$('#scalesize_new_section').append(htmlresponse);
                	}
                });
        	});
        	
        	$(document).on("change", "#pv_options", function(e){
        		e.preventDefault();
        		let pv_id = $(this).val();
        		$.ajax({
        			type:"GET",
        			url:'{{url('admin/stores/listings/gpvodiv')}}'+"/"+pv_id,
        			success:function(html_response){
                        $('#pv_options').hide();
						$('#pv_generated_div').append(html_response);
        			}
        		})
        	});
        	
            
            $(document).on("click", "#remove_size_option_field", function(e){
                e.preventDefault();
                $(this).val('');
                $(this).parent('div').remove();
            });
            
            $('#edit_variations_button').hide();
            $(document).on("click", "#save_changes", function(){
                $.ajax({
        			type:"GET",
        			url:'{{url('admin/stores/listings/getVariationsContent')}}',
        			success:function(html_response){
                        $('#modaldemo3').modal('hide');
                        $('#edit_variations_button').show();
                        $('#variations_content').empty();
						$('#variations_content').append(html_response);
        			}
        		})
            });

            $(document).on("click", "#edit_variations_button", function(e){
                $("#modaldemo3").modal('show');
            });

            $('#personalization-content').hide();
            $(document).on("change", "#personalization-checkbox", function(e){
                if($('#personalization-checkbox').prop('checked'))
                {
                    $('#personalization-content').fadeIn('slow');
                }
                else
                {
                    $('#personalization-content').fadeOut('slow');
                }
            });

            $(document).on("keyup", "#personalization_text", function(){
               var text = $(this).val();
               $('#buyers_text').text(text);
            })

            $('#optional').hide();
            $(document).on("change", "#personalization_checkox", function(e){
                if($('#personalization_checkox').prop('checked'))
                {
                    $('#optional').show();
                }
                else
                {
                    $('#optional').hide();
                }
            });
            
            
            
      

    </script>
@endsection
