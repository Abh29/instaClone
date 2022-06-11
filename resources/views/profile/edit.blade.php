@extends('layouts.app')

@section('content')
<div class="container">

        <h1>Edit Your Profile</h1>

        <div class="card-body">
                <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data" >
                    @csrf

                    @method('PATCH')

                    <div class="form-group row">
                        <label for="tittle" class="col-6 text-left ml-1">profile tittle</label>

                            <input id="tittle" type="text" class="form-control
                             @error('camption') is-invalid @enderror"
                              name="tittle" value="{{ old('tittle') }}" required autocomplete="tittle" autofocus>

                            @error('tittle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>
                    <div class="form-group row">
                            <label for="description" class="col-6 text-left ml-1">profile description</label>
    
                                <textarea id="description" type="text" class="form-control
                                 @error('camption') is-invalid @enderror" cols="30" rows="4"
                                  name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
                                 </textarea>
    
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>"{{ $message }}"</strong>
                                    </span>
                                @enderror
                            
                    </div>
                    <div class="form-group row">
                            <label for="url" class="col-6 text-left ml-1">profile url</label>
    
                                <input id="url" type="text" class="form-control
                                 @error('camption') is-invalid @enderror"
                                  name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>
    
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-primary">
                                Add New Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>




</div>
@endsection