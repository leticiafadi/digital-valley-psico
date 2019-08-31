<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap core CSS-->
	<link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">

	<!--formulario inicial-->
	<link rel="stylesheet" href="{{asset('css/formulario-inicial.css')}}">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/erro.css') }}" rel="stylesheet">
    

	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('imagens/template/icone.png') }}">
    

</head>

<body id="page-top">
	<div id="app">

		@include('errors.includes.navbar')
		@if ($erro==404)    
    		<div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>404</h1>
                        </div>
                        <h2>Oops! This Page Could Not Be Found</h2>
                        <p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
                        <a href="home" class="button">Homepage</a>
                    </div>
            </div>
          
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="2655c0c9cf6bd08795091c21-text/javascript"></script>
            <script type="2655c0c9cf6bd08795091c21-text/javascript">
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());        
                gtag('config', 'UA-23581568-13');
            </script>
            <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js" data-cf-settings="2655c0c9cf6bd08795091c21-|49" defer=""></script>
		@endif
		@if ($erro==405)    
    		<div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>405</h1>
                        </div>
                        <h2>Oops! The request method is not allowed</h2>
                        <p>Sorry but the method you are looking for does not allowed</p>
                        <a href="home" class="button">Homepage</a>
                    </div>
            </div>
          
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="2655c0c9cf6bd08795091c21-text/javascript"></script>
            <script type="2655c0c9cf6bd08795091c21-text/javascript">
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());        
                gtag('config', 'UA-23581568-13');
            </script>
            <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js" data-cf-settings="2655c0c9cf6bd08795091c21-|49" defer=""></script>
		@endif

		@yield('content')


	</div>
	<script type="text/javascript" src="{{asset('js/libs/jquery-1.9.1.js')}}"></script>
	<script src="{{asset('js/mask/jquery-mask.js')}}"></script>

	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
	async defer>
	document.getElementById("buttonSubmit").disabled = true;
	</script>

	<script src="{{asset('js/mask/mymasks.js')}}"></script>

</body>

</html>