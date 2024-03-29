@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
   <label for="name"><dt>name</dt></label>
    <input type="text" class="form-control" id="name" field ="name" name="name" :value=@old('description') required>
  </div>
  <div class="form-group">
    <label for="description"><dt>Description</dt></label>
    <textarea class="form-control" id="description" field ="description" name="description" required rows="10" :value=@old('description')></textarea>
  </div>

   <div class="form-group">
   <label for="image1"><dt>Presenting image</dt></label>
    <input type="file" name="image1" title="image1" field="image1" class="form-control-file" id="image1">
  </div>
   <div class="form-group">
    <label for="image2"><dt>Second image</dt></label>
    <input type="file" name="image2" title="image2" field="image2" class="form-control-file" id="image2">
  </div>
   <div class="form-group">
     <label for="image3"><dt>Third image</dt></label>
    <input type="file" name="image3"  title="image3" field="image3" class="form-control-file" id="image3">
  </div>

  <div class="form-group">
   <label for="categories"><dt>category</dt></label>
    <select class="form-control form-control-lg" name="category_id" required>
    @forelse($categories as $category)
    <option value="{{$category->id}}" {{(old('category_id') == $category->id) ? "selected" : ""}}>
        {{$category->name}}
        </option>
    @empty
    <p>No categories</p>
    @endforelse
    </select>
    <div class="form-group">
    <label for="category_id"><dt>condtions</dt></label>
    <select class="form-control form-control-lg" name="condition_id" required>
    @forelse($conditions as $condition)
    <option value="{{$condition->id}}" {{(old('condition_id') == $condition->id) ? "selected" : ""}}>
        {{$condition->type}}
        </option>
    @empty
    <p>No conditions</p>
    @endforelse
    </select>
      <div class="form-group">
   <label for="size_id"><dt>sizes</dt></label>
    <select class="form-control form-control-lg" name="size_id" required>
    @forelse($sizes as $size)
    <option value="{{$size->id}}" {{(old('size_id') == $size->id) ? "selected" : ""}}>
        {{$size->ageRange}}
        </option>
    @empty
    <p>No sizes</p>
    @endforelse
    </select>
    <div class="form-group">
  <label for="price"><dt>Enter a price:</dt></label>
  <input type="number" class="form-control"  id="price" name="price" value="@old('price')" required>
</div>
<div class="form-group my-3">
  <label for="materials"> <strong> Materials</strong> <br> </label>
    
        @foreach ($materials as $material)
                            <input type="checkbox", value="{{$material->id}}" name="materials[]">
                           {{$material->name}}
                        @endforeach
      </div>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection