@extends('layouts.app')

@section('content')
<div class="container">

        <h1>Add a New Post</h1>

        <div class="card-body">
                <form method="POST" action="/post" enctype="multipart/form-data" >
                    @csrf

                    <div class="form-group row">
                        <label for="caption" class="col-6 text-left ml-1">Post Caption</label>

                            <input id="caption" type="text" class="form-control
                             @error('camption') is-invalid @enderror"
                              name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>
                    <div class=" form-group row mb-5">
                        <label for="image" class=" col-6 text-left ml-1">add your image here !</label>
                        <input type="file" id="image" name="image" class=" form-control-file col-6"
                        required accept="image/*" autocomplete="image" autofocus>
                      
                        @error('image')
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