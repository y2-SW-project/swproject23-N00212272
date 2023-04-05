@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="d-flex justify-content-center">
 <a href="{{route('customer.products.create')}}" class="btn btn-danger" >Start Selling</a></div>
<form action="" method="GET">
<div class="row mt-3">
<div class="col-md-2 col-12">
<h2>Filter to your benefit</h2>
<div class="col-md-10 ">
<label>Filter by Category</label>
<select name="category_id" class="form-select">
	<option value="">Select category</option>
	<option value="1" {{Request::get('category_id') == '1'}}>Clothes</option>
	<option value="2" {{Request::get('category_id') == '2'}}>Accessories</option>
	<option value="3" {{Request::get('category_id') == '3'}}>Water</option>

<option value="4" {{Request::get('category_id') == '4'}}>Toys</option>

<option value="5" {{Request::get('category_id') == '5'}}>Car</option>

<option value="6" {{Request::get('category_id') == '6'}}>Nursery</option>
</select>
</div>
<div class="col-md-10">
<label>Filter by condition</label>
<select name="condition_id" class="form-select">
	<option value="">Select condition</option>
	<option value="1" {{Request::get('condition_id') == '1'}}>Bad</option>
	<option value="2" {{Request::get('condition_id') == '2'}}>Okay</option>
<option value="3" {{Request::get('condition_id') == '3'}}>Good</option>
<option value="4" {{Request::get('condition_id') == '4'}}>Excellent</option>
</select>
</div>
<div class="col-md-10">
<label>Filter by Size</label>
<select name="size_id" class="form-select">
	<option value="">Select category</option>
	<option value="1" {{Request::get('size_id') == '1'}}>0-6 months</option>
	<option value="2" {{Request::get('size_id') == '2'}}>6-12 months</option>
	<option value="3" {{Request::get('size_id') == '3'}}>1+</option>
	<option value="4" {{Request::get('size_id') == '4'}}>2+</option>
	<option value="5" {{Request::get('size_id') == '5'}}>3+</option>
	<option value="6" {{Request::get('size_id') == '6'}}>4+</option>
	<option value="7" {{Request::get('size_id') == '7'}}>5+</option>
</select>
</div>
<div class="col-md-10">
<label>Filter by Price</label>
<select name="price" class="form-select">
	<option value="">Select price</option>
	<option value="desc" {{Request::get('price') == 'desc'}}>highest->lowest</option>
	<option value="asc" {{Request::get('price') == 'asc'}}>lowest->highest</option>
</select>
</div>

<div class="col-md-10">
<br/>
<button type="submit" class="btn btn-primary">Filter</button>
</div>
</div>

</form>
	<div class="row col-md-8 col-12">
	 @forelse ($products as $product)
   
  <div class="col-md-4 col-6 mt-2">
	 <div class="card ">
		 <a href="{{route('customer.products.show', $product) }}"><img src="{{ asset('storage/images/' . $product->image1) }}" 
    class="card-img-top d-md-block d-none" height="250" alt="" />
	 <a href="{{route('customer.products.show', $product) }}"><img src="{{ asset('storage/images/' . $product->image1) }}" 
    class="card-img-top d-md-none d-block" height="150" alt="" />
			<div class="card-body"></a>
				<h4 class="card-title text-center d-none d-md-block ">{{($product->name)}}</h4>
				<h5 class="card-subtitle text-center">Category: {{($product->category->name) }}</h5>
				<h6 class="card-text text-center mt-2"><i class="fa-solid fa-location-pin px-2"></i>Price :£{{$product->price}}</h6>
				<div class="row">
			<a href="" class="btn btn-primary justify-content-center text-light mt-2  fw-semibold"
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
		</div>
		
		
@endsection