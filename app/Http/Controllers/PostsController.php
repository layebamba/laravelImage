<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use  File;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(8);
        return view('pages.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request->all());
      $request->validate([
          'nom'=>'required|string|max:150',
          'context'=>'required|string|max:15000',
          'image'=>'required|image|mimes:jpg,png,jpeg,gift'
      ]);
      $file=$request->file('image');
      $exten=$file->getClientOriginalExtension();
      $newName= uniqid('',true).'.'.$exten;
      $destinationPath='images';
      $file->move($destinationPath,$newName);

      $data=new Post();
      $data->nom=$request->nom;
      $data->context=$request->context;
      $data->image=$newName;
      $data->save();
      session()->flash("flash_message","Ajout reussi avec succee");
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row=Post::findorFail($id);
        return view('pages.edit',compact('row'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
   {
      //  dd($request->all());
      $request->validate([
          'nom'=>'required|string|max:150',
          'context'=>'required|string|max:15000',
          'image'=>'nullable|image|mimes:jpg,png,jpeg,gift'
      ]);

     $data=Post::findorFail($request->id);
     if($request->hasFile('image'))
     {
        $file=$request->file('image');
      $exten=$file->getClientOriginalExtension();
      $newName= uniqid('',true).'.'.$exten;
      $destinationPath='images';
      $file->move($destinationPath,$newName);
            $data->image=$newName;

     }

     

      $data->nom=$request->nom;
      $data->context=$request->context;
      $data->save();
      session()->flash("flash_message","Votre article a été bien mis à jour");
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // dd($id);
       $post=Post::findorFail($id);
       File::delete('/images'.$post->image);
       session()->flash("flash_message","Votre article a été bien supprimé");
       $post->delete();
      return back();
    }
}
