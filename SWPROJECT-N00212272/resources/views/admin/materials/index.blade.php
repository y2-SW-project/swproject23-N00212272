@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="d-flex justify-content-center">
  <a href="{{ route('admin.materials.create') }}" class="btn btn-lg bg-success mb-2">New material</a>
  </div>
<div class="row">
	 @forelse ($materials as $material)
   
  <div class="col-md-4 col-6 mt-2">
	 <div class="card ">
			<div class="card-body"></a>
				<h4 class="card-title text-center d-none d-md-block ">{{($material->name)}}</h4>
				  <a href="{{route ('admin.materials.edit', $material )}}" class="btn btn-success mt-3  col-12 ">Edit</a>
				   <form action="{{ route('admin.materials.destroy',$material) }}" method="post" class=" mt-3 ">
                  {{-- laravel function to delete form --}}
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn  btn-danger  col-12" onclick="return confirm('Are you sure you want to delete')">Delete</button>
                     </form>
			</div>
	</div>

</div>



		 @empty
         <p>You have no Materials displaying.</p>
        @endforelse
		</div>
		</div>
		</div>
		
		
@endsection