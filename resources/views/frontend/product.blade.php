@extends('frontend.layouts.app')

@section('navbar')

<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
       <li class="active">
            <a href="/">
                Home
            </a>
        </li>
    </ul>
</div>

@endsection

@section('content')

<div class="container">
    <h3 class="text-center">Product</h3>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 main-image-container">
                    <img class="img-fluid" src='{{asset("images/$product->image_name")}}' width="500" />
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 main-description-container">
                    <h1 class="text-center">
                        {{ $product->name }}
                    </h1>
                    <p class="text-center"><small>Created at: {{$product->created_at}}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>    
@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript">
        $('document').ready(function(){
            updateViewCount({{$product->id}});
        });
    </script>
@endpush    
@endsection