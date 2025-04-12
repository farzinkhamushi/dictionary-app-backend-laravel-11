@extends('admin.layouts.app')

@section('title')
    Edit "{{$word->name}}"
    
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-3">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="mt-2">
                        Edit "{{$word->name}}"
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="{{route('admin.words.update',$word->slug)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name*</label>
                                    <input
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        id="name"
                                        placeholder="Name*"
                                        value="{{$word->name}}"
                                    />
                                    <!--     
                                    <small id="helpId" class="form-text text-muted">Help text</small> 
                                    -->
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-dark btn-sm"
                                >
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection