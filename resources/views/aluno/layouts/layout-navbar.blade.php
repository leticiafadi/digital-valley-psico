<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Psicologia UFC</title>

	<!-- Bootstrap core CSS-->
	<link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

	<!--CSS basic for the ATENDIMENTO-->
	<link rel="stylesheet" href="{{asset('css/atendimento.css')}}">

	<!-- Custom styles for this template-->
	<link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!--Date picker-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gijgo@1.9.13/css/gijgo.min.css">
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- My stu=yles-->
	<link rel="stylesheet" href="{{asset('css/libs/button-rounded.css')}}">

</head>

<body id="page-top">
	<div id="app">

		@include('auth.includes.navbar')


		@if(session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Feito!</strong> {{session('success')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif

		
		@if ($errors->any())
			<div class="alert alert-danger alert-dismissible">
				<ul>
					@foreach ($errors->all() as $error)
						<li><strong>Atenção </strong>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div id="wrapper">
			<div id="content-wrapper">
				@yield('content')
			</div>
		</div>


	</div>
		


	<script src="{{ asset('js/app.js') }}" ></script>

	<script src="{{asset('admin/vendor/jquery/jquery.js')}}"></script>

	<script src="{{asset('js/libs/vue.min.js')}}" type="text/javascript"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="{{asset('js/dashboard/registrar-funcionario.js')}}" type="text/javascript"></script>

		
	<script src="{{asset('js/mask/jquery-mask.js')}}" type="text/javascript"></script>	
	<script src="{{asset('js/mask/mymasks.js')}}" type="text/javascript"></script>



	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" defer></script>
	
	<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
		
</body>

</html>