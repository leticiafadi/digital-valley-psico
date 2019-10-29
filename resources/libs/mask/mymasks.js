$(document).ready(function($){
    $('.date-mask').mask('00/00/0000', {placeholder : 'dd/mm/yyyy', minLength: 10});
    $('.matricula-mask').mask('000000', {placeholder: 'XXXXXX'});
    $('.telefone-celular-mask').mask('(00) 00000 0000', {placeholder: '(__) ____ ____'});
    $('.telefone-residencial-mask').mask('(00) 0000 0000', {placeholder: '(__) ____ ____'});
    $('.semestre-mask').mask('0000.0', {placeholder: 'XXXX.X'});
    $('.periodo-mask').mask('00/00/0000 ate 00/00/0000', {placeholder: 'dd/mm/yyyy ate dd/mm/yyyy'});
    $('.crp-mask').mask('00/00000', {placeholder: 'XX/XXXXX'});
    $('.siape-mask').mask('0000000', {placeholder: 'XXXXXXX'});
});