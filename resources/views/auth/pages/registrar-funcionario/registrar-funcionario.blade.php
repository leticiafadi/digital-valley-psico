@extends('auth.layouts.layout-basic')

@section('content')



<cadastrar-usuario  errors={{$errors->all}} :old='{"nome":"{{old("nome")}}","data_nascimento" :"{{old("data_nascimento")}}","genero" : "{{old("genero")}}", "siape" : "{{old("siape")}}", "crp" : "{{old("crp")}}", "id_pais":"{{old("id_pais")}}", "id_estado" : "{{old("id_estado")}}", "id_cidade": "{{old("id_cidade")}}", "endereco" : "{{old("endereco")}}", "bairro" :"{{old("bairro")}}", "numero" : "{{old("numero")}}", "email":"{{old("email")}}", "telefone_celular" : "{{old("telefone_celular")}}", "telefone_residencial":"{{old("telefone_residencial")}}" }'  base-url="{{ $base_url }}"/>

@endsection