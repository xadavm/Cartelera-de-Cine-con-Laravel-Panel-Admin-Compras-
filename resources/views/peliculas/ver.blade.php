@extends('estilo.layout')
@section('title', 'Informacion pelicula')
@section('content')
<link href="{{ asset('styles/bootstrap-4.1.2/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}" rel="stylesheet">
<link href="{{ asset('styles/main_styles.css') }}" rel="stylesheet">
<link href="{{ asset('styles/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('styles/comun.css') }}" rel="stylesheet">
<center>
<STYLE>
.video-responsive {
    height: 0;
    overflow: hidden;
    padding-bottom: 56.25%;
    padding-top: 30px;
    position: relative;
    }
.video-responsive iframe, .video-responsive object, .video-responsive embed {
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    }
</STYLE>

<center>

    <section class="row">
    <h1 class="col-md-8"></h1>
    <div class="col-md-15" role="group">
           <p class="float-right">
               
    
               
               <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <section class="row">
    <h1 class="col-md-20"></h1>
    <div class="col-md-15" role="row">
           <p class="float-center">
           @role('administrador')
           <a class="btn btn-success" href="{{ route('peliculas.create' )}}">
    
               <i class="fa fa-plus" aria-hidden="true"></i> Panel Admin</a>       @endrole
               </div>
                            <ul><li><p href="{{ url('/home') }}" class="text-sm text-gray-700 underline">     <strong>Bienvenido</strong> {{ auth()->user()->name }}<p>
    </div></ul></li>
   
                        @else
                        <a class="btn btn-md btn-secondary" href="{{ route('login' )}}">
               <i class="fa fa-plus" aria-hidden="true"></i> Iniciar sesión</a>
                            @if (Route::has('register'))
                            <a class="btn btn-md btn-secondary" href="{{ route('register' )}}">
               <i class="fa fa-plus" aria-hidden="true"></i> Registrarse</a>                        @endif
                        @endauth
                    </div>
                @endif
               </p>
         </div>
    </section>
    
    
    <style>
    
    
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    /* Float four columns side by side */
    .column {
      float: right;
      width: 26%;
      padding: 30px 20px;
    }
    
    
    
    
    /* Responsive columns */
    @media screen and (max-width: 400px) {
      .column {
        width: 80%;
        display: grid;
        margin-bottom: 55px;
      }
    }
    
    /* Style the counter cards */
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 15px;
      text-align: center;
      background-color: #f1f1f1;
    }
    
    
    </style>
    
    <div class="super_container">

	<!-- Header -->


<header class="header">
  <div class="header_overlay"></div>
  <div class="header_content d-flex flex-row align-items-center justify-content-start">
    <div class="logo">
      <a href="{{ route('peliculas.index' )}}">
        <div class="d-flex flex-row align-items-center justify-content-start">
          <div><img src={{ asset('images/logo_1.png') }} alt=""></div>
          <div>EntertainmentAlfredo</div>
        </div>
      </a>	
    </div>

    <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
    <nav class="main_nav">
      <ul class="d-flex flex-row align-items-start justify-content-start">
        @if (Route::has('login'))
@auth
@role('administrador')
        <a class="btn btn-success" href="adminalfredo">

          <i class="" aria-hidden="true"></i>Panel Administrador</a>               <p></p><li></li>
          @endrole
          
          <p href="{{ url('/home') }}" class="text-sm text-gray-700 underline">     <strong>Bienvenido</strong> {{ auth()->user()->name }}<p>
            <p></p><li></li>

          <a class="btn btn-md btn-danger" href="{{ route('logout' )}}">
           <i class="" aria-hidden="true"></i> Cerrar sesión</a><li></li>
                            @else
                            <li><a href=" {{ route('contacto.index' )}}">Contacto</a></li>
                            <li></li>	 <li></li> <li></li> <li></li> <li></li> <li></li> <li></li>
                            <a class="btn btn-md btn-secondary" href="{{ route('login' )}}">
                   <i class="" aria-hidden="true"></i> Iniciar sesión</a><li></li>
                                @if (Route::has('register'))
                                <a class="btn btn-md btn-secondary" href="{{ route('register' )}}">
                   <i class="" aria-hidden="true"></i> Registrarse</a>                        @endif
                            @endauth
                   
                    @endif
                    <li></li>
                 
        
      </ul>
      
    </nav>
		
		</div>
	</header>
    
    <h2> <div class="text-center"></h2></div>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <br><br>
<h2> <div class="text-center">Cartelera EntertainmentAlfredo</h2></div>
            <div class="col-sm-5 align-self-center text-center">
                <div class="card shadow">
                    <div class="card-body">  
                         <!-- pruebas imagen -->

    <img class="" src="/caratulas/{{ $pelicula->foto}}" class="card-img" alt="...">
      <h2 class="card-title">{{ $pelicula->nombre}}</h2>
     <p class="card-text">{{ $pelicula->descripcion}}</p>  
      <strong class="card-text text-muted">Duración: {{ $pelicula->duracion}} minutos</strong>
     <form action="{{ route('peliculas.destroy', $pelicula->id)}}" method="post">
   
@role('administrador')

<a class="btn btn-warning"  href="{{ route('peliculas.edit', $pelicula->id)}}">Modificar
</a>
     @csrf
     @method('DELETE')
      <button type="submit" class="btn btn-danger">Eliminar</button>@endrole

     
     </form>
     <div class="video-responsive">
     <IFRAME SRC="{{ $pelicula->trailer}}"   allowfullscreen="true"></IFRAME>
            </div></center>
        </div>
    </div>  

   
		<!-- Features -->

		<div class="features">
			<div class="container">
				<div class="row">
					
					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src={{ asset('images/icon_1.svg') }} alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Pagos rápidos y seguros</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon ml-auto mr-auto"><img src={{ asset('images/icon_2.svg') }} alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Medidas de seguridad COVID 19</div>
							</div>
						</div>
					</div>

					<!-- Feature -->
					<div class="col-lg-4 feature_col">
						<div class="feature d-flex flex-row align-items-start justify-content-start">
							<div class="feature_left">
								<div class="feature_icon"><img src={{ asset('images/icon_3.svg') }} alt=""></div>
							</div>
							<div class="feature_right d-flex flex-column align-items-start justify-content-center">
								<div class="feature_title">Recibe tu ticket de entradas facilmente</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="footer_content">
				<div class="container">
					<div class="row">
						
						<!-- About -->
						<div class="col-lg-4 footer_col">
							<div class="footer_about">
								<div class="footer_logo">
									<a href="#">
										<div class="d-flex flex-row align-items-center justify-content-start">
											<div class="footer_logo_icon"><img src={{ asset('images/logo_2.png') }} alt=""></div>
											<div>Cartelera EntertainmentAlfredo</div>
										</div>
									</a>		
								</div>
								<div class="footer_about_text">
									<p>Todas las películas de Cartelera y los horarios del Cine EntertainmentAlfredo - Telde</p>
								</div>
							</div>
						</div>

						<!-- Footer Links -->
						<div class="col-lg-4 footer_col">
							<div class="footer_menu">
								<div class="footer_title">Soporte</div>
								<ul class="footer_list">
									<li>
										<a href="#"><div>Terminos y Condiciones</div></a>
									</li>
									<li>
										<a href=" {{ route('contacto.index' )}}"><div>Contacto</div></a>
									</li>
								</ul>
							</div>
						</div>

						<!-- Footer Contact -->
						<div class="col-lg-4 footer_col">
						
								<div class="footer_social">
									<div class="footer_title">Redes Sociales</div>
									<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
										<li><a href="https://twitter.com/alfrejimglez"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
								<div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Alfredo Jimenez Gonzalez
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
								<nav class="footer_nav ml-md-auto order-md-2 order-1">
									<ul class="d-flex flex-row align-items-center justify-content-start">
									
										<li><a href="contacto">Contacto</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
		
</div>


<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('styles/bootstrap-4.1.2/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/progressbar/progressbar.min.js') }}"></script>
<script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
		

</body>
</html>
@endsection

    