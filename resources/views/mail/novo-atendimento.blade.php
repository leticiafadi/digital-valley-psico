<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">


	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="https://firebasestorage.googleapis.com/v0/b/leitor-mangas-flutter.appspot.com/o/app.css?alt=media&token=61425e4c-8c8f-4c9e-8a8b-bf484caf95ae" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="https://firebasestorage.googleapis.com/v0/b/leitor-mangas-flutter.appspot.com/o/app.css?alt=media&token=61425e4c-8c8f-4c9e-8a8b-bf484caf95ae" rel="stylesheet">
	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('imagens/template/icone.png') }}">
    

</head>

<body id="page-top">
	<div id="app">

		@include('guest.includes.navbar')
			

		<!-- Aqui tera o formulario, mais podera mudar de local-->
        <div class="container">

            <div class="row">
                Teste de Email
            </div>
        </div>


	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js}}"></script>

	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
	async defer>
	document.getElementById("buttonSubmit").disabled = true;
	</script>


</body>

</html>