@extends('auth.layouts.layout-basic')
@section('content')
<editar-atendimento :atendimento="{{$atendimento}}"></editar-atendimento> 
@endsection