@extends('layouts.app')

@section('content')

<div class="container">
<form action="{{ route('admin.materials.update', $material) }}" method="post" enctype="multipart/form-data">
    @method('put')
        @csrf
   <div class="form-group">
    <label for="name">name</label>
    <input type="text" class="form-control" id="name" name="name" field="name" required value="{{$material->name}}">
  </div>
     <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection