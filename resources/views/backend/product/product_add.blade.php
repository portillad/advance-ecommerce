@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<!-- Main content -->
<section class="content">

    <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
        <h4 class="box-title">Add Product</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col">
            <form novalidate>
                <div class="row">
                <div class="col-12">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="brand_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_eng }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" class="form-control">
                                        <option value="" selected="" disabled="">Select SubCategory</option>
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>


                    
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Sub-SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subsubcategory_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Sub-SubCategory</option>
                                    </select>
                                    @error('subsubcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name Eng<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_eng" class="form-control">
                                    @error('product_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name Esp<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_esp" class="form-control">
                                    @error('product_name_esp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Code<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_code" class="form-control">
                                    @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Quantity<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control">
                                    @error('product_qty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags Eng<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_eng" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput">
                                    @error('product_tags_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Tags Esp<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_tags_esp" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput">
                                    @error('product_tags_esp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size Eng<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_eng" class="form-control" value="Small,Medium,Large" data-role="tagsinput">
                                    @error('product_size_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Size Esp<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_size_esp" class="form-control" value="Chico,Mediano,Grande" data-role="tagsinput">
                                    @error('product_size_esp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Color Esp<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_eng" class="form-control" value="Red,Black,White" data-role="tagsinput">
                                    @error('product_color_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Color Esp<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_color_esp" class="form-control" value="Rojo,Negro,Blanco" data-role="tagsinput">
                                    @error('product_color_esp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="selling_price" class="form-control">
                                    @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="discount_price" class="form-control">
                                    @error('discount_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Main Product Thumbnail<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="product_thumbnail" class="form-control">
                                    @error('product_thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Multi-Image<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="multi_img[]" class="form-control">
                                    @error('multi_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>





                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description Eng<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="short_description_eng" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Short Description Esp<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="short_description_esp" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>






                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description Eng<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea id="editor1" name="long_description_eng" rows="10" cols="80">
                                        Long Description English.
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Long Description Esp<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea id="editor2" name="long_description_esp" rows="10" cols="80">
                                        Long Description Spanish.
                                    </textarea>
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
                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                    <label for="checkbox_2">Hot Deals</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                    <label for="checkbox_3">Featured</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                    <label for="checkbox_4">Special Offer</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                    <label for="checkbox_5">Special Deals</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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
</div>

@endsection