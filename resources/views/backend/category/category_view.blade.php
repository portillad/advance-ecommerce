@extends('admin.admin_master')
@section('admin')


<div class="container-full">


<!-- Main content -->
<section class="content">
    <div class="row">
        
        <div class="col-8">

            <div class="box">


                <div class="col-12">

                    <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category Icon</th>
                                    <th>Category Eng</th>
                                    <th>Category Esp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                <tr>
                                    <td><span><i class="{{ $item->category_icon }}"></i></span></td>
                                    <td>{{ $item->category_name_eng }}</td>
                                    <td>{{ $item->category_name_esp }}</td>
                                    <td>
                                        <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('brand.delete', $item->id) }}" class="btn btn-danger" title="Delete Data" onclick="return confirm('Do you really want to delete this Category?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

            
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>







        
        <div class="col-4">

            <div class="box">


                <div class="col-12">

                    <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            


                        <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                                
                             

                                <div class="form-group">
                                    <h5>Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_eng" class="form-control">
                                        @error('category_name_eng')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Category Name Spanish <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_esp" class="form-control">
                                        @error('category_name_esp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control">
                                        @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
            <!-- /.row -->
        </div>

    </div>

</section>
    <!-- /.content -->
    
</div>


@endsection