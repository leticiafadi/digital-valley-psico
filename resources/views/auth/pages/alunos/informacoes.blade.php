@extends('auth.layouts.layout-basic')
@section('content')
    <perfil-aluno :base_url="{{'"'.$base_url.'"'}}" :id_aluno="{{ $idaluno }}">  </perfil-aluno>
@endsection

<!-- 0 é o psicologo vendo o perfil do aluno-->