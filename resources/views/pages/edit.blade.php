@extends('layouts.master')
@section('content')
    
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <h1 class="bg-primary p-3 mt-5 text-center text-white">Editer L'Article</h1>

    </div>
</div>

<div class="row">
<div class="col-sm-12">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
                
            @endforeach
        </ul>

    </div>
    @endif
    @if(session()->has('flash_message'))
    <div class="aler alert-success">
        <ul>
        <li>{{session()->get('flash_message')}}</li>
        </ul>
    </div>
    @endif

</div>

    <div class="col-sm-12">
    <form action="{{url('/update')}}" novalidate method="POST" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="form-group text-left" >
            <label for="exampleFormControlInput1">Nom</label>
        <input type="text" value="{{$row->nom}}" required class="form-control" name="nom" id="exampleFormControlInput1">
        </div>
    <input type="hidden" name="id" value="{{$row->id}}">
             <div class="form-group text-left" >
            <label for="exampleFormControlTextarea1">Contenu</label>
<textarea name="context"  required class="form-control">{{$row->context}}</textarea>       
 </div>
 <div class="form-group text-left">
     <label for="exampleFormControlFile1">Image</label>
     <input type="file" name="image" required class="form-control-file" id="exampleFormControlFile1">
 </div>
 <button type="submit" class="btn btn-success mb-2">Modifier</button>

        </form>
<img src="{{asset('images/'.$row->image)}}" width="300" alt="">    </div>

</div>
</div>
@endsection