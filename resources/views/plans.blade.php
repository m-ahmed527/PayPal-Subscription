@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Plane:</div>

                <div class="card-body">
                    <form action="{{route('subscribe')}}" method="POST">
                        @csrf
                    <div class="row">
                        @foreach($plans as $plan)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                  <div class="card-header">
                                        ${{ $plan->price }}/Day
                                  </div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{ $plan->name }}</h5>

                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                    <input type="hidden" name="plan" value="{{ $plan->name }}">
                                    <input type="hidden" name="description" value="{{ $plan->description }}">
                                    <input type="hidden" name="prod_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product" value="{{ $product->name }}">
                                    <input type="hidden" name="prod_price" value="{{ $product->price }}">
                                   <button>Subscribe</button>

                                  </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
