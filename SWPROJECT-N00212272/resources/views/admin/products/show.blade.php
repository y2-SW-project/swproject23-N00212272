@extends('layouts.app')
   
@section('content')
<div class= "container mt-4">
<div id="carouselPic"  class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner border border-secondary rounded">
    <div class="carousel-item active">
      <img class="d-block d-md-none w-100" height="200" src="{{ asset('storage/images/' . $product->image1) }}" alt="First slide">
        <img class="d-none d-md-block w-100" height="700" src="{{ asset('storage/images/' . $product->image1) }}" alt="First slide">
    </div>
    <div class="carousel-item ">
    <img class="d-block d-md-none w-100" height="200" src="{{ asset('storage/images/' . $product->image2) }}" alt="Second slide">
        <img class="d-none d-md-block w-100" height="700" src="{{ asset('storage/images/' . $product->image2) }}" alt="Second slide">
    </div>
    <div class="carousel-item">
     <img class="d-block d-md-none w-100" height="200" src="{{ asset('storage/images/' . $product->image3) }}" alt="Third slide">
        <img class="d-none d-md-block w-100" height="700" src="{{ asset('storage/images/' . $product->image3) }}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" role="button" data-bs-target="#carouselPic"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" role="button" data-bs-target="#carouselPic" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

              <div class="container bg-primary rounded mt-3 pb-4">
              <div class="container">
                <div class="row">
                <p class="opacity-70 col-md-2 col-6 mt-4">
                    <strong>Created: </strong> {{ $product->created_at->diffForHumans() }}
                </p>
              
                  <p class="opacity-70 col-md-2 col-6 mt-4">
                    <strong>Updated at: </strong> {{ $product->updated_at->diffForHumans() }}
                </p>
               {{-- button to bring you to edit page --}}
                  <a href="{{route ('admin.products.edit', $product )}}" class="btn btn-success mt-3  col-12 ">Edit</a>
               
                 {{-- deletes the product --}}
                 <form action="{{ route('admin.products.destroy',$product) }}" method="post" class=" mt-3 ">
                  {{-- laravel function to delete form --}}
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn  btn-danger  col-12" onclick="return confirm('Are you sure you want to delete')">Delete</button>
                     </form>
                      </div>  
                      <div class="row mt-5 border rounded">
                      <h1 class="col-12 text-center mb-4 mt-4">Product Information</h1>
                <h3 class="col-6 mt-2"><strong>Name:</strong></h3>
                <h3 class="col-6 mt-2">{{$product->name}}</h3>
                <h3 class="col-6 mt-2 "><strong>Description:</strong></h3>
                <h3 class="col-6 mt-2">{{$product->description}}</h3>
                <h3 class="col-6 mt-2"><strong>Category:</strong></h3>
                <h3 class="col-6 mt-2">{{$product->category->name}}</h3>
                <h3 class="col-6 mt-2"><strong>Price:</strong></h3>
                <h3 class="col-6 mt-2">£{{$product->price}}</h3>
                 <h3 class="col-6 mt-2"><strong>Condition:</strong></h3>
                <h3 class="col-6 mt-2">{{$product->condition->type}}</h3>
                <h3 class="col-6 mt-2"><strong>Size:</strong></h3>
                <h3 class="col-6 mt-2">{{$product->size->ageRange}}</h3>
                <h3 class="col-6 mt-2"><strong>Materials used:</strong></h3>
                 @forelse ($product->materials as $material)
                        <h3 class="col-1 mt-2 mb-2">{{$material->name}}</h3>
                        @empty
                        <h3>No materials available</h3>
                @endforelse
                  </div>
         </div>  
    </div>
    <div class="container mt-4">
    <h1 class="text-center">Other Products you may be interested in</h1>
    	<div class="row col-md-12 col-12">
	 @forelse ($products as $product)
   
  <div class="col-md-4 col-12  mt-3 ">
	 <div class="card border border-secondary ">
		 <a href="{{route('admin.products.show', $product) }}"><img src="{{ asset('storage/images/' . $product->image1) }}" 
    class="card-img-top d-md-block d-none" height="250" alt="" />
	 <a href="{{route('admin.products.show', $product) }}"><img src="{{ asset('storage/images/' . $product->image1) }}" 
    class="card-img-top d-md-none d-block" height="150" alt="" />
			<div class="card-body border border-primary"></a>
				<h3 class="card-title display-secondary text-center d-none d-md-block ">{{($product->name)}}</h3>
				<h4 class="card-subtitle display-secondary text-center mt-2"><i class="fa-solid fa-location-pin px-2"></i>Price :£{{$product->price}}</h4>
				<h5 class="card-text text-center mt-2 "><strong>Condition: </strong>{{($product->condition->type)}}</h5>
				<div class="row">
			<a href="" class="btn btn-secondary justify-content-center text-light mt-2  fw-semibold"
				>Add to Basket</a
			></div>
		</div>
</div>
</div>



		 @empty
         <p>You have no products displaying.</p>
        @endforelse
  </div>
  </div>

@endsection
