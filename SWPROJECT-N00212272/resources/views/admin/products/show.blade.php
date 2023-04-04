@extends('layouts.app')
   
@section('content')
<div class= "container mt-4">
<div id="carouselPic"  class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" height="700" src="{{ asset('storage/images/' . $product->image1) }}" alt="First slide">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100"height="700" src="{{ asset('storage/images/' . $product->image2) }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="700" src="{{ asset('storage/images/' . $product->image3) }}" alt="Third slide">
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

              <div class="container bg-secondary mt-3 pb-4">
              <div class="container">
                <div class="row">
                <p class="opacity-70 col-2 mt-4">
                    <strong>Created: </strong> {{ $product->created_at->diffForHumans() }}
                </p>
              
                  <p class="opacity-70 col-2 mt-4">
                    <strong>Updated at: </strong> {{ $product->updated_at->diffForHumans() }}
                </p>
               {{-- button to bring you to edit page --}}
                  <a href="{{route ('admin.products.edit', $product )}}" class="btn btn-success mt-3 col-12 ">Edit</a>
               
                 {{-- deletes the product --}}
                 <form action="{{ route('admin.products.destroy',$product) }}" method="post" class=" mt-3 ">
                  {{-- laravel function to delete form --}}
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn  btn-danger col-12" onclick="return confirm('Are you sure you want to delete')">Delete</button>
                     </form>
                      </div>  
                      <div class="row mt-5 border">
                      <h1 class="col-12 text-center ">Product Information</h1>
                <h3 class="col-6 ">Name:</h3>
                <h3 class="col-6">{{$product->name}}</h3>
                <h3 class="col-6">Category:</h3>
                <h3 class="col-6">{{$product->category->name}}</h3>
                <h3 class="col-6">Price:</h3>
                <h3 class="col-6">£{{$product->price}}</h3>
                 <h3 class="col-6">Condition:</h3>
                <h3 class="col-6">{{$product->condition->type}}</h3>
                <h3 class="col-6">Size:</h3>
                <h3 class="col-6">{{$product->size->ageRange}}</h3>
                <h3 class="col-6">Materials used:</h3>
                 @forelse ($product->materials as $material)
                        <h3 class="col-1">{{$material->name}}</h3>
                        @empty
                        <h3>No sizes available</h3>
                @endforelse
                
                  </div>
         </div>  
    </div>
    <div class="footer">
    this is the footer
    </div>
@endsection