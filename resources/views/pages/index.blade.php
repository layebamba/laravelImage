@extends('layouts.master')
@section('content')
 <?php
//echo e(dump($posts));
?> 


<div class="container">
    <div class="row">
        <div class="col-sm-12">
<h1 class="bg-primary text-center p-3 mt-5 text-white">Voici nos produits</h1>

 @if(session()->has('flash_message'))
    <div class="aler alert-success">
        <ul>
        <li>{{session()->get('flash_message')}}</li>
        </ul>
    </div>
    @endif
        </div>

    </div>

</div>
<div class="container-fluid">
    <div class="row">
        @foreach ($posts as $post)
            
        <div class="col-sm-3">
            <div class="card m-6" style="">
            <img src="{{asset('images/'.$post->image)}}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Mon Article</h5>
                <p class="card-text">
                    ceci est un article parmi tant d'autres!!!
                </p>
            <a href="{{url('/edit/'.$post->id)}}" class="btn btn-warning">Editer</a>
            <a href="{{url('/destroy/'.$post->id)}}" class="btn btn-danger">Supprimer</a>

            </div>

            </div>

        </div>

        @endforeach

        <div class="col-sm-12 p-5 text-center d-flex justify-content-center">
            {{$posts->links()}}
        </div>

    </div>

</div>
    
@endsection