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
                        <h3 class="box-title">Slider List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Slider Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $item)
                                <tr>
                                    <td><img src="{{ asset($item->slider_img) }}" style="width: 70px; height: 40px;"></td>    
                                    <td>
                                        @if($item->title == NULL)
                                            <span class="badge badge-pill badge-danger"> No Title </span>
                                        @else
                                            {{ $item->title }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->description == NULL)
                                            <span class="badge badge-pill badge-danger"> No Description </span>
                                        @else
                                            {{ $item->description }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge badge-pill badge-danger"> Inactive </span>
                                        @endif
                                    </td>
                                    <td width="30%">
                                        <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('slider.delete', $item->id) }}" class="btn btn-danger" title="Delete Data" onclick="return confirm('Do you really want to delete this Slider?')"><i class="fa fa-trash"></i></a>
                                        @if($item->status == 1)
                                            <a href="{{ route('slider.inactive', $item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a href="{{ route('slider.active', $item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                        @endif
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
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            


                        <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                        @csrf
                                
                             

                                <div class="form-group">
                                    <h5>Slider Title</h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Slider Description</h5>
                                    <div class="controls">
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Slider Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_img" class="form-control">
                                        @error('slider_img')
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