@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Sub Category</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('admin.subcategory.update',$subcategory->id)}}" method="post" >
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">SubCategory Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" value="{{$subcategory->name}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Category</label>
                            <div class="controls">
                                <select name="category">
                                    <option value="" disabled selected>Open this category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id==$subcategory->cat_id ? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">SubCategory Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required>{!!$subcategory->description!!}</textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update SubCategory</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection

