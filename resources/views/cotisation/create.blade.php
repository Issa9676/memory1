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
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form action="{{route('uss.store')}}" class="settings-form" method="POST">
                       @csrf
                       <div  class="row g-3">
                        <div  class="col-md-12">
                            <label for="settings-input-3" class="form-label">Nom complet</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                            @error('name')
                            <div class="invalid-feedback">{{'message'}}
                            </div>
                            @enderror
                        </div>

                        <div  class="col-md-12">
                            <label for="settings-input-3" class="form-label">Adresse Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required>
                            @error('email')
                            <div class="invalid-feedback">{{'message'}}
                            </div>
                            @enderror
                        </div>


                        <div  class="col-md-6">
                            <label for="settings-input-3" class="form-label">Role</label>
                           <select name="role" class="form-select">
                            <option value="">choix du role</option>
                            <option value="membre" selected>Membre</option>
                                 <option value="admin" selected>Administrateur</option>

                                 </select>
                        </div>


                        <div  class="col-md-6">
                            <label class="form-label">Statut Initial</label>
                           <select name="statut" class="form-select">
                            <option value="">-- Choisir un statut initial--</option>
                            <option value="actif" selected>Actif</option>
                                 <option value="inactif" selected>Inactif</option>
                                    <option value="suspendu" selected>Suspendu</option>
                                    </select>
                        </div>

                        <div  class="col-md-12">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" required>
                            @error('password')
                            <div class="invalid-feedback">{{'message'}}
                            </div>
                            @enderror
                        </div>

                        <div  class="col-md-12">
                            <label class="form-label">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        
                        </div>

                         <div  class="mt-4">
                            <button type="submit" class="btn app-btn-primary">
                                Enregister le membre
                            </button>
                            <a href="{{route('users.index')}}" class="btn btn-light">Annuler</a>
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






