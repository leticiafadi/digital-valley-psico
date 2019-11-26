@extends('aluno.layouts.layout-basic')
@section('content')
    estou atualizando as informacoes
    <atualizar-info :id_aluno="{{ Auth::user()->id }}">  </atualizar-info>
@endsection
