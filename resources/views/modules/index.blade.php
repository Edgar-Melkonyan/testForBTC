@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-success">
        <strong>{{Session::get('message')}}</strong>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Oops!</strong> There are several problems<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modules</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/update/modules">
                        {{ csrf_field() }}
                        @foreach($modules as $module)
                            <div class="check-box-container">
                                <span>{{$module->name}} </span>
                                <input type="checkbox" name="modules[]" value="{{$module->name}}" 
                                    {{ ((is_array(old('modules')) && in_array($module->name, old('modules'))) ? ' checked' : $module->active == 1 ? 'checked' : '')  }}
                                    @if($module->name == 'User picked') id="picked" @endif>
                            </div>
                        @endforeach
                        <div id="products" class="check-box-main-container">
                            @foreach($products as $product)
                               <div class="check-box-container">
                                  <span>{{$product->name}}</span> 
                                  <input type="checkbox" name="products[]" value="{{$product->id}}" 
                                     {{ ((is_array(old('products')) && in_array($product->id, old('products'))) ? ' checked' : $product->picked == 1 ? 'checked' : '')  }}>
                               </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/custom.js')}}"></script>
@endpush    
@endsection
