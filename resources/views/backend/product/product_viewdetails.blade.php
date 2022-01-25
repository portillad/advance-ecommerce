@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

<!-- Main content -->
<section class="content">

    <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">View Product Details</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col">
            <form>
                <div class="row">
                <div class="col-12">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Brand</h5>
                                <div class="controls">
                                    <input type="text" name="brand_id" class="form-control" value="{{ $brand->brand_name_en }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Category</h5>
                                <div class="controls">
                                    <input type="text" name="category_id" class="form-control" value="{{ $category->category_name_eng }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>SubCategory</h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_id" class="form-control" value="{{ $subcategory->subcategory_name_eng }}" readonly>
                                </div>
                            </div>
                        </div>

                    </div>


                    
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Sub-SubCategory</h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_id" class="form-control" value="{{ $subsubcategory->subsubcategory_name_eng }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name Eng</h5>
                                <div class="controls">
                                    <input type="text" name="product_name_eng" class="form-control" value="{{ $product->product_name_eng }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name Esp</h5>
                                <div class="controls">
                                    <input type="text" name="product_name_esp" class="form-control" value="{{ $product->product_name_esp }}" readonly>
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Code</h5>
                                <div class="controls">
                                    <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Quantity</h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control" value="{{ $product->product_qty }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags Eng</h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_eng" class="form-control" value="{{ $product->product_tags_eng }}" data-role="tagsinput" disabled>
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags Esp </h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_esp" class="form-control" value="{{ $product->product_tags_esp }}" data-role="tagsinput" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size Eng </h5>
                                <div class="controls">
                                    <input type="text" name="product_size_eng" class="form-control" value="{{ $product->product_size_eng }}" data-role="tagsinput" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size Esp </h5>
                                <div class="controls">
                                    <input type="text" name="product_size_esp" class="form-control" value="{{ $product->product_size_esp }}" data-role="tagsinput" disabled>
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Color Eng </h5>
                                <div class="controls">
                                    <input type="text" name="product_color_eng" class="form-control" value="{{ $product->product_color_eng }}" data-role="tagsinput" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Color Esp </h5>
                                <div class="controls">
                                    <input type="text" name="product_color_esp" class="form-control" value="{{ $product->product_color_esp }}" data-role="tagsinput" disabled>
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Selling Price </h5>
                                <div class="controls">
                                    <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Discount Price </h5>
                                <div class="controls">
                                    <input type="text" name="discount_price" class="form-control" value="{{ $product->discount_price }}" readonly>
                                </div>
                            </div>
                        </div>

                    </div>





                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description Eng </h5>
                                <div class="controls">
                                    <textarea name="short_description_eng" id="textarea" class="form-control" required placeholder="Textarea text" readonly>{!! $product->short_description_eng !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description Esp </h5>
                                <div class="controls">
                                    <textarea name="short_description_esp" id="textarea" class="form-control" required placeholder="Textarea text" readonly>{!! $product->short_description_esp !!}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>






                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description Eng </h5>
                                <div class="controls">
                                    <textarea id="editor1" name="long_description_eng" rows="10" cols="80" readonly>{!! $product->long_description_eng !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description Esp </h5>
                                <div class="controls">
                                    <textarea id="editor2" name="long_description_esp" rows="10" cols="80" readonly>{!! $product->long_description_esp !!}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>


                    <hr>



                    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $product->hot_deals == 1 ? 'checked' : '' }} disabled>
                                    <label for="checkbox_2">Hot Deals</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $product->featured == 1 ? 'checked' : '' }} disabled>
                                    <label for="checkbox_3">Featured</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $product->special_offer == 1 ? 'checked' : '' }} disabled>
                                    <label for="checkbox_4">Special Offer</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked' : '' }} disabled>
                                    <label for="checkbox_5">Special Deals</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>

        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->



    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Multiple Image</h4>
				  </div>
                  <form>
                      <div class="row row-sm">
                        @foreach($multiImgs as $img)
                        <div class="col-md-3">

                            <div class="card">
                                <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px">
                            </div>

                        </div>
                        @endforeach
                      </div>

                    <br><br>

                  </form>
				</div>
			  </div>
        </div>
    </section>



    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Thumbnail Image</h4>
				  </div>
                  <form>

                      <div class="row row-sm">
                          
                        <div class="col-md-3">

                            <div class="card">
                                <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" style="height: 130px; width: 280px">
                            </div>

                        </div>
                        
                      </div>

                    <br><br>

                  </form>
				</div>
			  </div>
        </div>
    </section>



</div>


<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_eng + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });


        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_eng + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>



<script type="text/javascript">
	function mainThumbUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThumb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
</script>

@endsection