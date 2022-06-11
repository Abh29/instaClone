@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')
<div class="container">
   @php
       if((Auth::user())and($user == Auth::user())){
            $show = true;
       }
       else{
            $show = false;
       }
   @endphp


    
    <div class="row d-flex" style="min-height:250px">
        <div class="col-3 mr-sm-5  mr-lg-0" style="height:250px;min-width:150px;">
            <img   class="pt-1 mr-5"  src="/pngs/logo2.png" style="height:80%; flex:1;">
        </div>
        <div class="col-8 pt-4 pl-4">
                
                   <div class="d-flex align-items-center">
                        <div class="align-items-baseline">
                                <h1> {{ $user->user_name}}</h1>  
                        </div>
                            @if(!$show)
                            <button class="ml-4 follow-btn">follow</button>
                            @endif
                   </div>
                

                <div class="d-flex">
                    <div class="pr-5"><strong>{{$count = $user->posts->count()}}</strong> posts</div>
                    <div class="pr-5"><strong>30k</strong> followers</div>
                    <div><strong>300</strong> following</div>
                </div>

                <div class="pt-2 font-weight-bold">{{$user->profile->tittle ??'...'}}</div>
                <div>{{$user->profile->description ?? '...'}}</div>
                <div class=" font-weight-bold pb-3"><a href="#" style="color: rgba(var(--fe0,0,53,105),1);"> {{$user->profile->url ?? 'tmp.org'}} </a></div>
            
                <div class="pt-3">
                        @if ($show)
                            <a href="/profile/{{$user->id}}/edit" >edit profile</a>
                        @endif  
                </div>
        </div>
    
    </div>
    
   @if ($show)  
        <div class=" d-flex align-items-baseline">
            <hr style="flex:1">
            <div class="d-flex justify-content-end">
                <a class="addPostBtn " href={{url("/post/create")}}>add a post</a>
            </div>
        </div>
        
    @else
            <hr>
   @endif
    
    <div class="row">
        @foreach ($user->posts as $post)
            <div class="col-4 pt-5 postContainer" style="width:33%">
                <div class="postImage w-100">

                   {{-- <a href="/post/{{$post->id}}"  data-toggle="modal" 
                    data-target="#myModal" onclick="show('/storage/{{$post->image}}')"
                    class="postImgLink"> --}}
                    <a href="/post/{{$post->id}}"  data-toggle="modal" 
                        data-target="#myModal" onclick="showPost('{{$post->id}}')"
                        class="postImgLink">
                    
                        <img class="post-img lazy"  src="/storage/{{$post->thumbnail}}"
                         data-srcset="/storage/{{$post->image}}" alt="{{$post->tittle}}">  
                    </a>

                </div>
            <div class="likeBtn">
                    <div class="postLink" data-toggle="modal" 
                    data-target="#myModal" onclick="show('/storage/{{$post->image}}')" 
                    style="cursor: pointer;">
                        <span class="likeIcon">&#9829</span> 99
                    </div>
            </div>
        </div>
      @endforeach
    </div>

   @if ($count == 0)
    <div class="row pt-5" >
            <div class="col-4"><img class="post-img" src="/pngs/filler.png" alt=""></div>
            <div class="col-4"><img class="post-img" src="/pngs/filler.png" alt=""></div>
            <div class="col-4"><img class="post-img" src="/pngs/filler.png" alt=""></div>
    </div>
    <div class="row pt-5" >
                <div class="col-4"><img class="post-img" src="/pngs/filler.png" alt=""></div>
                <div class="col-4"><img class="post-img" src="/pngs/filler.png" alt=""></div>
                <div class="col-4"><img class="post-img" src="/pngs/filler.png" alt=""></div>
    </div>
     @endif
    <div style="padding-top:300px"></div>


    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                   
                <div class="modal-content" id="modal-content">
                  <div class="modal-body">      
                    
                   </div>
    
                    <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
    
                 </div>
          
            </div>
    </div>

 </div>
    
   
   <script src="{{asset('js/index.js')}}"></script>


@endsection
