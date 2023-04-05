@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('admin.sizes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
    <label for="ageRange">ageRange</label>
    <input type="text" class="form-control" id="ageRange" field ="ageRange" name="ageRange" :value=@old('ageRange') required>
  </div>
      <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection