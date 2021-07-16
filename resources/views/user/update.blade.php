@extends('master.master_layout')
@section('content')

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success');}}
</div>
@endif

<form method="POST" action="{{ route('updateUser')}}" >
    {{ method_field('PUT')}}
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <input  name="id" type="hidden" value="{{ $user->id }}"/>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">name</label>
      <input type="text" class="form-control" value="{{ $user->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">password</label>
      <input type="password" class="form-control"value="{{ $user->password}}" name="password" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">id_role</label>
      <select class="form-select" name="id_role"   aria-label="Default select example">
          @foreach ($roles as $item)
              <option selected value="{{ $item->id }}">{{ $item->name}}</option>   
          @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection