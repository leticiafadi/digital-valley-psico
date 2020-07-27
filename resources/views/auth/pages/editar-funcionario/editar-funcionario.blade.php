@extends('auth.layouts.layout-basic')

@section('content')
<editar-usuario :funcionario='{{$funcionario}}'></editar-usuario>

@endsection