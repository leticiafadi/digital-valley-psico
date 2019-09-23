@extends('auth.layouts.layout-basic')
@section('content')
<aluno :base_url="{{'"'.$base_url.'"'}}" :cursos="{{$cursos}}"></aluno> 
@endsection