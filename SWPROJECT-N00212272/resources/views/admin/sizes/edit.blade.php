@extends('layouts.app')

@section('content')

<div class="container">
<form action="{{ route('admin.sizes.update', $size) }}" method="post" enctype="multipart/form-data">
    @method('put')
        @csrf
   <div class="form-group">
    <label for="ageRange">Age Range</label>
    <input type="text" class="form-control" id="ageRange" name="ageRange" field="ageRange" required value="{{$size->ageRange}}">
  </div>
     <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
@endsection