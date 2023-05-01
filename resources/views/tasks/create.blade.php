@extends('tasks.layout')

@section('content')


<h1>create task</h1>

@if ($errors->any())

<h1>no creation made</h1>

@foreach ( $errors->all() as $error)

          <li>{{ $error }}</li>


    
@endforeach
    
@endif

<form action="{{ route('tasks.store') }}" method="POST">
        <input type="text" name="name" class="form-control" placeholder="Name">
        <textarea name="form-control" id="" cols="30" rows="10" placeholder="detail" name="detail"></textarea>
        <button type="submit">post</button>
</form>
    @csrf



@endsection

