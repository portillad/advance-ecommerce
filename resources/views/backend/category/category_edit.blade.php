@extends('admin.admin_master')
@section('admin')


<div class="container-full">


<!-- Main content -->
<section class="content">
    <div class="row">
        
        


                <div class="col-12">

                    <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            


                        <form method="POST" action="{{ route('category.update',$category->id) }}">
                        @csrf
                                
                             <input type="hidden" name="id" value="{{ $category->id }}">

                                <div class="form-group">
                                    <h5>Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_eng" class="form-control" value="{{ $category->category_name_eng }}">
                                        @error('category_name_eng')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Category Name Spanish <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_esp" class="form-control" value="{{ $category->category_name_esp }}">
                                        @error('category_name_esp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}">
                                        @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            </div>
                        </form>





                        </div>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

            
                </div>
                <!-- /.col -->

    </div>

</section>
    <!-- /.content -->
    
</div>


@endsection