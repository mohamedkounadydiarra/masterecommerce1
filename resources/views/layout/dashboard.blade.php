
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>dashboard</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>

	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  " id="navbar">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >	
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="../assets/icone.png" alt="profile">
						<div class="user-details">
							<span>{{Auth::user()->pseudo}}</span>
							<div id="more-details">Bienvenue<i class="fa fa-chevron-down m-l-5"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i><a href="https://web.whatsapp.com/send?phone=+22392859900&text=Bonjours%20comment%20vous%20allez%20%3F%20nous%20utilisons%20votre%20logiciel%20de%20gestion%20de%20stock"target="_blank">Contacter le support</a></a></li>
							<li class="list-group-item"> 
								<form method="POST" action="{{ route('user_logout') }}">
								@csrf
								@method('post')
								<button type="submit" class="btn btn-primary">Logout</button>
							</form></li>
							<li class="list-group-item"><a href="{{route('acceuil')}}"><i class="feather icon-log-out m-r-5"></i>retour au site</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Admin</label>
					</li>
					<li class="nav-item">
					    <a href="dashboard.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Produit</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{route('produit_create')}}">Ajouter</a></li>
					        <li><a href="listeproduit.php">Nos Produits</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Catégorie</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{route('categorie_create')}}">Ajouter</a></li>
					        <li><a href="{{route('categorie_index')}}">Nos Catégories</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Commande</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="listeunite.php">Nos Commandes</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Commentaire</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="listefournisseur.php">Nos Commentaires</a></li>
					    </ul>
					</li>
		
					
					<li class="nav-item">
					    <a href="#" class="nav-link"><p class="img-radius" disabled style="">Version 1.1</p></a>
					</li>
				</ul>

				
				
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<h4 class="img-radius" style="color:white;">SUGU</h4>	
						<img src="../assets/images/logo-icon.png" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tableau de bord</h5>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        @yield('content')
        <!-- [ Main Content ] end -->
    </div>
</div>

    <!-- Required Js -->
    <script src="../../assets/js/vendor-all.min.js"></script>
    <script src="../../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../../assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="../../assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="../../assets/js/pages/dashboard-main.js"></script>
</body>
<script>
    $(document).ready(function() {
        // Lorsque la touche est relâchée dans l'entrée de recherche
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            // Parcourez chaque ligne du tableau pour effectuer la recherche
            $("#myTable tbody tr").filter(function() {
                // Utilisez "td:eq(n)" pour cibler la colonne n pour effectuer la recherche (n étant l'index de la colonne, commence à 0)
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
     </script>
</html>
