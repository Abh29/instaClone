<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
/*     public function __construct()
    {
       $this->middleware('auth');
    } */

    public function create()
    { 
        if(auth()->user() == null){
            return redirect('/home');
        }
        else{
         return view('posts.create'); 
        }
    
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'description' =>'',
            'image' => ['required','image','max:8192'],
            'thumbnail' => 'image|max:1024',
        ]);
            $original_path = request('image')->store('uploads/originals','public');
            $new_path = request('image')->store('uploads','public');
            $thumbnail = request('image')->store('uploads/thumbnails','public');
            
            $image = Image::make(public_path("/storage/{$new_path}"))->fit(1200,1200);
            $image->save(null,100);
            $image = Image::make(public_path("/storage/{$thumbnail}"))->resize(200,200)->fit(1200,1200);
            $image->save(null,1);  
           

         
        auth()->user()->posts()->create([
              'caption' => $data['caption'],
              'description' => '',
              'image' => $new_path,
              'thumbnail' => $thumbnail,
        ]);

       /*  $user = auth()->user();
        $post = new Post();
        $post->user_id = $user->id;
        $post->caption = $data['caption'];
        $post->image = $data['image'];
        $post->save();
        $user->push(); */
            
        return redirect('/home');
    }

    public function show(Post $post)
    {
      /*   return veiw('posts.show',[
            'post' => $post,
        ]); */

        //this is the same as this 
        return view('posts.show',\compact('post'));


    }
    public function index()
    {
        return redirect('/');
    }
    public function edit()
    {
        return redirect('/');
    }
    public function update()
    {
        return redirect('/');
    }
    

}
