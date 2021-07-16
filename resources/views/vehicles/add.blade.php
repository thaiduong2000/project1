@extends('master.master_layout')
@section('content')
@if(session('success'))
    

<div class="alert alert-success" role="alert">
    {{ session('success');}}
</div>

    
@endif
<form method="POST" action="{{ route('createVehicle')}}">

    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">name</label>
      <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">technologies</label>
        <select class="form-select" name="technology_id" aria-label="Default select example">
          @foreach ($technologies as $item)
              <option selected value="{{$item->id}}">{{ $item->name}}</option>   
          @endforeach
        </select>
      </div>

    <button type="submit" class="btn btn-primary">Create</button>

  </form>
@endsection