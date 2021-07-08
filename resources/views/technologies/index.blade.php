@extends('master.master_layout')
@section('content')
<table class="table">
    @if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success');}}
</div>
@endif
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">acction</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($technologies as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>
          <div class=d-flex >
           <a href="{{ route('getTechnology', $item->id)  }}" class="btn btn-primary me-2">Update</a>
           <form method="POST" action="{{ route('getTechnology',$item->id) }}">
             @csrf
             {{ method_field('delete')}}
             <button  type="submit" onclick="confirm('Are you sure want to delete?')" class="btn btn-danger">Delete</button>
           </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection