@extends('master.master_layout')
@section('content')
@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success');}}
</div>
@endif
<form method="POST" action="{{ $action }}">
    @if(isset($vehicle->id))
      {{ method_field('PUT')}}
    @endif

    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <input  name="id" type="hidden" value="{{ $vehicle->id }}"/>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">name</label>
      <input type="text" class="form-control" name="name" value="{{ $vehicle->name }}" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">id_role</label>
      <select class="form-select" name="technology_id" aria-label="Default select example">
        @foreach ($technologies as $item)
            <option selected value="{{$item->id}}">{{ $item->name}}</option>   
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">{{ $button }}</button>

  </form>
@endsection