<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="en"> <!--<![endif]-->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Meta -->
    <title>CIAK Prestamos</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Google Fonts -->
 	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700" rel="stylesheet"> 

	<!-- Custom & Default Styles -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="estilo.css">

</head>
<body>
	
	<div id="wrapper">
		<header class="header site-header colorfulheader">
			<div class="container">
				<nav class="navbar navbar-default yamm">
				    <div class="container-fluid">
				        <div class="navbar-header">
				            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>
							<a class="navbar-brand" href="index.html"><img src="images/lightlogo.png" alt="Linda"></a>
				        </div>
				        <div id="navbar" class="navbar-collapse collapse">
				            <ul class="nav navbar-nav navbar-right">
				                <li><a href="index.html">Inicio</a></li>
				                <li><a href="page-about.html">Acerca de</a></li>
				                <li class="active"><a href="case-studies.html">Simulador</a></li>
								<li><a href="page-contact.html">Contacto</a></li>
				                <li class=""><a href="blog.html">Iniciar Sesión</a></li>
                            </ul>
				        </div><!--/.nav-collapse -->
				    </div><!--/.container-fluid -->
				</nav><!-- end nav -->
			</div><!-- end container -->
		</header><!-- end header -->
        <h1>Conversor de Pesos a Otras Monedas</h1>
    <form action="" method="post" style="margin: 10px;">
        <input type="number" name="cantidad" placeholder="Cantidad a convertir" required step="any"><br><br>
        <label>A:</label>
        <select name="moneda_destino">
            <option value="USD">Dólar estadounidense (USD)</option>
            <option value="EUR">Euro (EUR)</option>
            <option value="JPY">Yen japonés (JPY)</option>
            <option value="GBP">Libra esterlina (GBP)</option>
            <option value="AUD">Dólar australiano (AUD)</option>
        </select><br><br>
        <input type="submit" value="Convertir">
        <input type="hidden" name="moneda_origen" value="MXN"> <!-- Fija la moneda de origen en MXN -->
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = $_POST["cantidad"];
    $moneda_origen = $_POST["moneda_origen"];
    $moneda_destino = $_POST["moneda_destino"];

    // Tasas de conversión (ejemplo, tasas ficticias)
    $tasas = [
        "USD" => 0.059,    
        "EUR" => 0.053, 
        "JPY" => 8.62,  
        "GBP" => 0.047,  
        "AUD" => 0.089,  
        "MXN" => 1.0,    // Tasa ficticia para MXN (1 MXN = 1 MXN)
        // Agrega más tasas según las monedas que admitas
    ];

    // Realiza la conversión
    $resultado = $cantidad * ($tasas[$moneda_destino] / $tasas[$moneda_origen]);

    echo "<h2>Resultado:</h2>";
    echo $cantidad . ' ' . $moneda_origen . ' = ' . $resultado . ' ' . $moneda_destino;
}
?>
		<footer class="footer primary-footer">
            <div class="container">
                <div class="row">
					<div class="col-md-4 col-sm-4">
                    	<div class="widget clearfix">
                    		<h4 class="widget-title">Suscribirse</h4>
                    		<div class="newsletter-widget">
		                        <form class="form-inline" role="search">
		                            <div class="form-1">
		                              	<input type="text" class="form-control" placeholder="Enter email here..">
										<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i></button>
		                            </div>
								</form>
                    		</div><!-- end newsletter -->
                    	</div><!-- end widget -->
                    </div><!-- end col -->
                    <div class="col-md-4 col-sm-4">
                    	<div class="widget clearfix">
                    		<h4 class="widget-title">Compañía</h4>
                    		<ul>
                    			<li><a href="page-about.html">Acerca de</a></li>
                    			<li><a href="page-contact.html">Contacto</a></li>
                    		</ul>
                    	</div><!-- end widget -->
                    </div><!-- end col -->
                    <div class="col-md-4 col-sm-4">
                    	<div class="widget clearfix">
                    		<h4 class="widget-title">Redes Sociales</h4>
                    		<ul>
                    			<li><a href="#">Facebook</a></li>
                    			<li><a href="#">Twitter</a></li>
                    			<li><a href="#">Google+</a></li>
                    			<li><a href="#">Linkedin</a></li>
                    		</ul>
                    	</div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->
           	</div><!-- end container -->
		</footer><!-- end primary-footer -->
		<footer class="footer secondary-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<p>2023 &copy; Grupo 6</p>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12">
						<ul class="list-inline">
							<li><a href="page.html">Aviso de Privacidad</a></li>
						</ul>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</footer><!-- end second footer -->
	</div><!-- end wrapper -->

	<!-- jQuery Files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/animate.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>