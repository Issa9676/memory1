<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset("assets/plugins/fontawesome/js/all.min.js")}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">

</head> 

<body class="app"> 
    
    
    <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>

			    
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">
						    
						    <li class="nav-item">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">
							        
			                        <span class="nav-link-text">Mutuelle</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->
					    </ul><!--//footer-menu-->
				    </nav>
			    </div><!--//app-sidepanel-footer-->
	        </div><!--//sidepanel-inner-->
	    </div>
      
    <div class="app-wrapper">
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title" >Membres</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Ajout</h3>
		                <div class="section-intro">Enregistrer une Cotisation</div>
	                </div>



                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form action="{{route('cotisations.store')}}" enctype="multipart/form-data" method="POST">
                       @csrf
                       <div  class="row g-3">
                        <div class="col-md-6 mb-3">
                        <label>Membre</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">Sélectionner un membre</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                        <div class="col-md-6 mb-3">
                        <label>Montant (FCFA)</label>
                        <input type="number" name="montant" class="form-control" placeholder="10000">
                    </div>


                        <div class="col-md-3 mb-3">
                        <label>Mois</label>
                        <select name="mois" class="form-control">
                            @foreach(['01'=>'Janvier','02'=>'Février','03'=>'Mars','04'=>'Avril','05'=>'Mai','06'=>'Juin','07'=>'Juillet','08'=>'Août','09'=>'Septembre','10'=>'Octobre','11'=>'Novembre','12'=>'Décembre'] as $val => $nom)
                                <option value="{{ $val }}">{{ $nom }}</option>
                            @endforeach
                        </select>
                    </div>


                       <div class="col-md-3 mb-3">
                        <label>Année</label>
                        <input type="number" name="annee" class="form-control" value="{{ date('Y') }}">
                    </div>



                     <div class="col-md-3 mb-3">
                        <label>Date de la cotisation</label>
                        <input type="date" name="date_cotisation" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>


                        <div class="col-md-6 mb-3">
                        <label>Mode de Paiement</label>
                        <select name="mode_paiement" class="form-control">
                            <option value="wave">Wave</option>
                            <option value="orange_money">Orange Money</option>
                            <option value="espece">Espèce</option>
                            <option value="virement">Virement</option>
                        </select>
                    </div>



                     <div class="col-md-6 mb-3">
                        <label>Statut paiement</label>
                    <select name="statut" class="form-control">
                            <option value="impaye">Impayé (En attente)</option>
                        </select>
                    </div>


                        <div class="col-md-12 mb-3">
                        <label>Preuve de paiement (Image/Bordereau)</label>
                        <input type="file" name="preuve_paiement" class="form-control">
                    </div>

                         <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Valider le paiement</button>
                    <a href="{{ route('cotisations.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
                       </div>

                    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
                
                
                
			    	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="{{asset("assets/plugins/popper.min.js")}}"></script>
    <script src="{{asset("assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>  
    
    <!-- Page Specific JS -->
    <script src="{{asset("assets/js/app.js")}}"></script> 

</body>
</html> 






