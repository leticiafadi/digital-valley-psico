@extends('auth.layouts.layout-basic')
@section('content')
<aluno :base-url="{{'"'.$base_url.'"'}}" :cursos="{{$cursos}}"></aluno> 
@endsection