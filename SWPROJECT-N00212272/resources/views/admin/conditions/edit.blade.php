@extends('layouts.app')

@section('content')

<div class="container">
<form action="{{ route('admin.conditions.update', $condition) }}" method="post" enctype="multipart/form-data">
    @method('put')
        @csrf
   <div class="form-group">
    <label for="type">type</label>
    <input type="text" class="form-control" id="type" name="type" field="type" required value="{{$condition->type}}">
  </div>
     <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection