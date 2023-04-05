@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('admin.conditions.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
    <label for="type">type</label>
    <input type="text" class="form-control" id="type" field ="type" name="type" :value=@old('type') required>
  </div>
      <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection