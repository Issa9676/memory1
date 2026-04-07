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
			    <h1 class="app-page-title" >Remboursement</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Demande</h3>
		                <div class="section-intro">Enregistrer une demande de remboursement</div>
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
							<form action="{{ route('remboursements.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Établissement de santé</label>
        <select name="etablissement_id" id="etablissement_id" class="form-control" required>
            <option value="">-- Choisir un établissement --</option>
            @foreach($etablissements as $etab)
                <option value="{{ $etab->id }}" data-taux="{{ $etab->taux_prise_en_charge }}">
                    {{ $etab->nom }} (Taux: {{ $etab->taux_prise_en_charge }}%)
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Montant total de la facture (FCFA)</label>
        <input type="number" name="montant_facture" id="montant_facture" class="form-control" step="0.01" required>
    </div>

    <div class="alert alert-info">
        <strong>Estimation du remboursement :</strong> 
        <span id="montant_estime">0</span> FCFA
    </div>

    <div class="mb-3">
        <label>Photo de la facture / Justificatif</label>
        <input type="file" name="facture_path" class="form-control" accept="image/*,.pdf" required>
    </div>

    <div class="mb-3">
        <label>Motif des soins</label>
        <input type="text" name="motif" class="form-control" placeholder="Ex: Consultation pédiatrique" required>
    </div>

    <button type="submit" class="btn btn-primary">Soumettre la demande</button>
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
    
    
    <script>
    const etablissementSelect = document.getElementById('etablissement_id');
    const montantInput = document.getElementById('montant_facture');
    const afficheMontant = document.getElementById('montant_estime');

    function calculerRemboursement() {
        const option = etablissementSelect.options[etablissementSelect.selectedIndex];
        const taux = option.getAttribute('data-taux') || 0;
        const montant = montantInput.value || 0;

        const resultat = (montant * taux) / 100;
        afficheMontant.innerText = resultat.toLocaleString('fr-FR');
    }

    etablissementSelect.addEventListener('change', calculerRemboursement);
    montantInput.addEventListener('input', calculerRemboursement);
</script>


</body>
</html> 






