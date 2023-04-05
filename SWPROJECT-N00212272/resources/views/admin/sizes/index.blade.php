@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="d-flex justify-content-center">
  <a href="{{ route('admin.sizes.create') }}" class="btn btn-lg bg-success mb-2">New size</a>
  </div>
<div class="row">
	 @forelse ($sizes as $size)
   
  <div class="col-md-4 col-6 mt-2">
	 <div class="card ">
			<div class="card-body"></a>
				<h4 class="card-title text-center d-none d-md-block ">{{($size->ageRange)}}</h4>
				  <a href="{{route ('admin.sizes.edit', $size )}}" class="btn btn-success mt-3  col-12 ">Edit</a>
				   <form action="{{ route('admin.sizes.destroy',$size) }}" method="post" class=" mt-3 ">
                  {{-- laravel function to delete form --}}
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn  btn-danger  col-12" onclick="return confirm('Are you sure you want to delete')">Delete</button>
                     </form>
			</div>
	</div>

</div>



		 @empty
         <p>You have no sizes displaying.</p>
        @endforelse
		</div>
		</div>
		</div>
		
		
@endsection