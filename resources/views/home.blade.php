@extends('layouts.app')
<style>
    .follow-btn{
         max-height: 25px;
         color: white;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 12px;
         border: 1px solid transparent;
         background-color: #3897f0;
         margin-top: 10px;
            }
    .post-img{
        min-height:200px;
        max-width: 100%;
        max-height: 100%;
    }

    .addPostBtn:hover {
    color: white;
    padding: 0px 5px;
	background:linear-gradient(to bottom, #476e9e 5%, #3897f0 100%);
	background-color:#3897f0;
}


</style>

@section('content')
<div class="container">
    
    <div class="row d-flex" style="min-height:250px">
        <div class="col-3 mr-sm-5  mr-lg-0" style="height:250px;min-width:150px;">
            <img   class="pt-1 mr-5"  src="/storage/logo_pngs/logo2.png" style="height:80%; flex:1;">
        </div>
        <div class="col-8 pt-4 pl-4">
                <div class="d-flex">
                        <h1> {{ $user->user_name}}</h1>  
                      <button class="ml-4 follow-btn">follow</button>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{$count = $user->posts->count()}}</strong> posts</div>
                    <div class="pr-5"><strong>30k</strong> followers</div>
                    <div><strong>300</strong> following</div>
                </div>
                <div class="pt-2 font-weight-bold">{{ $user->profile->tittle }}</div>
                <div>{{$user->profile->description}}</div>
                <div class=" font-weight-bold pb-3"><a href="#" style="color: rgba(var(--fe0,0,53,105),1);"> {{$user->profile->url ?? 'tmp.org'}} </a></div>
            
        </div>
    
    </div>
    
   @if ((Auth::user())and($user == Auth::user()))  
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
        <div class="col-4 pt-5" style="width:33%"><img class="post-img lazy"  src="/storage/{{$post->thumbnail}}"
            data-srcset="/storage/{{$post->image}}" alt=""></div>
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


    <script>
    document.addEventListener("DOMContentLoaded", function() {
  var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

  if ("IntersectionObserver" in window) {
    let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          let lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          lazyImage.srcset = lazyImage.dataset.srcset;
          lazyImage.classList.remove("lazy");
          lazyImageObserver.unobserve(lazyImage);
        }
      });
    });

    lazyImages.forEach(function(lazyImage) {
      lazyImageObserver.observe(lazyImage);
    });
  } else {
    // Possibly fall back to a more compatible method here
  }
});

    </script>
</div>
@endsection
