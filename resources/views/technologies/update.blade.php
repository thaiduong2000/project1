@extends('master.master_layout')
@section('content')

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success');}}
</div>
@endif

<form method="POST" action="{{ route('updateTechnology')}}" >
    {{ method_field('PUT')}}
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <input  name="id" type="hidden" value="{{ $technology->id }}"/>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">name</label>
      <input type="text" class="form-control" value="{{ $technology->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection