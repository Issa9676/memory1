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
      
    <div class="modal fade" id="modalCreateUser" tabindex="-1" aria-labelledby="modalCreateUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalCreateUserLabel">
                    <i class="fa-solid fa-user-plus me-2"></i>Ajouter un nouvel utilisateur
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label font-weight-bold">Nom Complet</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-user text-muted"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Ex: Ismaël Traoré" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label font-weight-bold">Adresse Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="exemple@mail.com" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label font-weight-bold">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fa-solid fa-lock text-muted"></i></span>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label font-weight-bold">Rôle</label>
                            <select name="role" class="form-select border-left-primary">
                                <option value="membre" selected>Membre</option>
                                <option value="admin">Administrateur</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label font-weight-bold">Statut</label>
                            <select name="statut" class="form-select border-left-success">
                                <option value="actif" selected>Actif</option>
                                <option value="inactif">Inactif</option>
                                <option value="suspendu">Suspendu</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary px-4">Créer le compte</button>
                </div>
            </form>
        </div>
    </div>
</div>    					

 
    <!-- Javascript -->          
    <script src="{{asset("assets/plugins/popper.min.js")}}"></script>
    <script src="{{asset("assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>  
    
    <!-- Page Specific JS -->
    <script src="{{asset("assets/js/app.js")}}"></script> 

</body>
</html> 






