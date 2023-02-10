@extends('layout')
@section('content')
<div class="container">
    <div class="jumbotron text-center mt-3">
       <h4>Bievenido(a) {{Auth::user()->name}}</h4>
    </div>
</div>
    
@endsection