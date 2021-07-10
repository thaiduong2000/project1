@extends('master.master_layout')
@section('content')
@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success');}}
</div>
@endif
<div class="d-flex justify-content-end">
  <a href="{{ route('viewAddUser') }}" class="btn btn-success">Add new</a>
</div>
<table class="table" >

    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">role</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($user as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->id_role}}</td>
        <td>
         <div class=d-flex >
           <a href="{{ route('viewUpdateUser',$item->id)  }}" class="btn btn-primary me-2">Update</a>
          <form method="POST" action="{{ route('deleteUser',$item->id)  }}">
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