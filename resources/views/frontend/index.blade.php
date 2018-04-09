@extends('frontend.layouts.app')

@section('navbar')
<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
        @foreach($modules as $key => $module)
            <li @if(!request()->module && $key == 0) class="active" @elseif(request()->module == $module) class="active" @endif>
                <a href="/filter_products/{{$module}}">
                    {{$module}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection

@section('content')
<div class="container">
   <!--Slider Content start-->
   <div id="main-carousel" class="owl-carousel owl-theme">
        @foreach($products as $product)
            <div class="item">
               <div class="image-box">
                    <img src='{{asset("images/$product->image_name")}}'>
                    <a href="/products/{{$product->id}}" class="btn btn-custom">
                        View
                    </a>
               </div>
               <h1 class="text-center">{{$product->name}}</h1>
            </div>
        @endforeach
    </div>
    <!--Slider Content end-->
</div>
@push('styles')
    <!-- Styles & libraries -->
    <link rel="stylesheet" href="{{asset('css/frontend/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/frontend/owl.carousel.min.css')}}"/>
    <!--Main CSS-->
    <link rel="stylesheet" href="{{asset('css/frontend/style.css')}}"/>
@endpush
@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/frontend/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/frontend/main.js')}}"></script>
@endpush    
@endsection
