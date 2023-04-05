@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('admin.materials.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
    <label for="name">name</label>
    <input type="text" class="form-control" id="name" field ="name" name="name" :value=@old('name') required>
  </div>
      <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection