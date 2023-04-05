@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="d-flex justify-content-center">
  <a href="{{ route('admin.categories.create') }}" class="btn btn-lg bg-success mb-2">New Category</a>
  </div>
<div class="row">
	 @forelse ($categories as $category)
   
  <div class="col-md-4 col-6 mt-2">
	 <div class="card ">
			<div class="card-body"></a>
				<h4 class="card-title text-center d-none d-md-block ">{{($category->name)}}</h4>
				  <a href="{{route ('admin.categories.edit', $category )}}" class="btn btn-success mt-3  col-12 ">Edit</a>
				   <form action="{{ route('admin.categories.destroy',$category) }}" method="post" class=" mt-3 ">
                  {{-- laravel function to delete form --}}
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn  btn-danger  col-12" onclick="return confirm('Are you sure you want to delete')">Delete</button>
                     </form>
			</div>
	</div>

</div>



		 @empty
         <p>You have no products displaying.</p>
        @endforelse
		</div>
		</div>
		</div>
		
		
@endsection