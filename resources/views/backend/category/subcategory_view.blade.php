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
                        <h3 class="box-title">SubCategory List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>SubCategory Eng</th>
                                    <th>SubCategory Esp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $item)
                                <tr>
                                    <td>{{ $item['category']['category_name_eng'] }}</td>
                                    <td>{{ $item->subcategory_name_eng }}</td>
                                    <td>{{ $item->subcategory_name_esp }}</td>
                                    <td>
                                        <a href="{{ route('subcategory.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('subcategory.delete', $item->id) }}" class="btn btn-danger" title="Delete Data" onclick="return confirm('Do you really want to delete this SubCategory?')"><i class="fa fa-trash"></i></a>
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
                        <h3 class="box-title">Add SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            


                        <form method="POST" action="{{ route('subcategory.store') }}">
                        @csrf
                                
                             

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

                                <div class="form-group">
                                    <h5>SubCategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_eng" class="form-control">
                                        @error('subcategory_name_eng')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>SubCategory Name Spanish<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_esp" class="form-control">
                                        @error('subcategory_name_esp')
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