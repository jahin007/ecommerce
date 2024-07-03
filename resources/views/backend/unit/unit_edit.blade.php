@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Unit</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('admin.unit.update',$unit->id)}}" method="post">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Unit Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" value="{{$unit->name}}" required>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required>{!!$unit->description!!}</textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Unit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection

