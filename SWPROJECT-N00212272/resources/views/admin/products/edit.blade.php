@extends('layouts.app')

@section('content')

<div class="container">
<form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
    @method('put')
        @csrf
   <div class="form-group">
    <label for="name">name</label>
    <input type="text" class="form-control" id="name" name="name" field="name" required value="{{$product->name}}">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" field="description"  required rows="10">{{$product->description}}</textarea>
  </div>

   <div class="form-group">
    <label for="image1">Presenting image</label>
    <input type="file" name="image1" title="image1" field="image1" class="form-control-file" id="image1">
  </div>
   <div class="form-group">
    <label for="image2">Second image</label>
    <input type="file" name="image2" title="image2" field="image2" class="form-control-file" id="image2">
  </div>
   <div class="form-group">
    <label for="image3">Third image</label>
    <input type="file" name="image3"  title="image3" field="image3" class="form-control-file" id="image3">
  </div>

  <div class="form-group">
    <label for="category">category</label>
    <select class="form-control form-control-lg" name="category_id" required>
    @forelse($categories as $category)
    @if($category->id == $product->category->id)
    <option value="{{$category->id}}" selected >{{$category->name}}</option>
    @else
    <option value="{{$category->id}}">
    {{$category->name}}
    @endif
    @empty
    <p>No categories</p>
    @endforelse
    </select>
     <div class="form-group">
    <label for="category">condtions</label>
    <select class="form-control form-control-lg" name="condition_id" required>
    @forelse($conditions as $condition)
    @if($condition->id == $product->condition->id)
    <option value="{{$condition->id}}" selected >{{$condition->type}}</option>
    @else
    <option value="{{$condition->id}}">
    {{$condition->type}}
    @endif
    @empty
    <p>No conditions</p>
    @endforelse
    </select>
      <div class="form-group">
    <label for="category">sizes</label>
    <select class="form-control form-control-lg" name="size_id" required>
    @forelse($sizes as $size)
    @if($size->id == $product->size->id)
    <option value="{{$size->id}}" selected >{{$size->ageRange}}</option>
    @else
    <option value="{{$size->id}}">
    {{$size->ageRange}}
    @endif
    @empty
    <p>No sizes</p>
    @endforelse
    </select>
    <div class="form-group">
  <label for="price">Enter a price:</label>
  <input type="number" class="form-control"  id="price" name="price" placeholder="{{$product->price}}" value="{{$product->price}}" required>
</div>
<div class="form-group my-3">
  <label for="materials"> <strong> Materials</strong> <br> </label>
    {{--Gets all the Materials into an array with checkbox  --}}
    @forelse ($materials as $material)
      <input type="checkbox" name="materials[]" value="{{$material->id}}" 
     {{-- In this array the material id of this product = to the material id in the pivot table is checked with the name with the material printed --}}
     {{ in_array($material->id,$material_id) ? 'checked' : '' }}>
     {{$material->name}}
     @empty
     <p>There are no materials available</p>                       
      @endforelse
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>


@endsection