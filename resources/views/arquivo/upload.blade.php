@extends('layout.my_layout')

@section('content')

<form action="" method="post" enctype="multipart/form-data">
    {{--@csrf TOKEN --}}
    {{ csrf_field() }}
    <input type="file" name="photo">
    <input type="submit">
</form>

@endsection