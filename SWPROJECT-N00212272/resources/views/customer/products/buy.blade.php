@extends('layouts.app')

@section('content')

  <div class="container my-5 ">
    <div class="row d-flex justify-content-center ">
      <div class="col-md-7 col-lg-5 col-xl-4">
        <div class="card">
          <div class="card-body p-3">
            <form action="{{ route('customer.products.destroy',$product) }}"  method="POST" enctype="multipart/form-data">
              @method('delete')
                @csrf
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-outline">
                  <input type="text" id="number" class="form-control form-control-lg" siez="17"
                    placeholder="1234 5678 9012 3457" required minlength="19" maxlength="19" />
                  <label class="form-label" for="number">Card Number</label>
                </div>
                <img src="https://img.icons8.com/color/48/000000/visa.png" alt="visa" width="64px" />
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-outline">
                  <input type="text" id="name" class="form-control form-control-lg" siez="17"
                    placeholder="Cardholder's Name" />
                  <label class="form-label" for="name">Cardholder's Name</label>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center pb-2">
                <div class="form-outline">
                  <input type="input" id="exp" class="form-control form-control-lg" placeholder="MM/YYYY"
                    size="7" id="exp" minlength="7" maxlength="7" />
                  <label class="form-label" for="typeExp">Expiration</label>
                </div>
                <div class="form-outline">
                  <input type="input" class="form-control form-control-lg"
                    placeholder="CVV" size="1" minlength="3" maxlength="3" />
                  <label class="form-label" for="typeText2">Cvv</label>
                </div>
                <div class="d-flex justify-content-between align-items-center pb-2">
               
                <button type="submit" class="btn  btn-secondary ml-2 " onclick="return confirm('Are you sure you want to buy this product') ">Complete Purchase</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
