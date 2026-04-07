

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
		                <div class="section-intro">AJouter ici un nouvel membre</div>
	                </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                    
                                @endforeach
                            </ul>
                    @endif
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <form action="{{ route('etablissements.update', $etablissement->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card p-4">
        <h5 class="mb-4">Modifier l'établissement : {{ $etablissement->nom }}</h5>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label font-weight-bold">Nom de l'établissement</label>
                <input type="text" name="nom" class="form-control" value="{{ $etablissement->nom }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label font-weight-bold">Type</label>
                <select name="type" class="form-select">
                    <option value="hopital" {{ $etablissement->type == 'hopital' ? 'selected' : '' }}>Hôpital</option>
                    <option value="clinique" {{ $etablissement->type == 'clinique' ? 'selected' : '' }}>Clinique</option>
                    <option value="pharmacie" {{ $etablissement->type == 'pharmacie' ? 'selected' : '' }}>Pharmacie</option>
                    <option value="laboratoire" {{ $etablissement->type == 'laboratoire' ? 'selected' : '' }}>Laboratoire</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ $etablissement->telephone }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $etablissement->email }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Personne Ressource</label>
                <input type="text" name="contact_personne" class="form-control" value="{{ $etablissement->contact_personne }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Ville</label>
                <input type="text" name="ville" class="form-control" value="{{ $etablissement->ville }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Adresse / Quartier</label>
                <input type="text" name="adresse" class="form-control" value="{{ $etablissement->adresse }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Statut Partenaire</label>
                <select name="statut" id="statut_select" class="form-select">
                    <option value="partenaire" {{ $etablissement->statut == 'partenaire' ? 'selected' : '' }}>Partenaire</option>
                    <option value="non_partenaire" {{ $etablissement->statut == 'non_partenaire' ? 'selected' : '' }}>Non Partenaire</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Taux de prise en charge (%)</label>
                <input type="number" name="taux_prise_en_charge" id="taux_input" class="form-control" value="{{ $etablissement->taux_prise_en_charge }}" step="0.01">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Services proposés</label>
            <textarea name="services" class="form-control" rows="2">{{ $etablissement->services }}</textarea>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('etablissements.index') }}" class="btn btn-secondary">Annuler</a>
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