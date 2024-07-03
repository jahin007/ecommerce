@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Color</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('admin.color.update',$color->id)}}" method="post">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Colors</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="color" id="input" data-role="tagsinput" value="{{implode(',',json_decode($color->color))}}" required>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Color</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection

