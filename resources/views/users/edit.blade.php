

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
						    
						    <div class="app-card-body">
							    <form  action="{{route('users.update', $membres->id)}}" method="POST">
                                    @csrf    
                                    @method('PUT')       
								    <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Nom complet<span class="ms-2" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover focus"  data-bs-placement="top" data-bs-content="This is a Bootstrap popover example. You can use popover to provide extra info."></label>
									    <input type="text" name="name" class="form-control" id="setting-input-1" value="{{old('name', $membres->name)}}" required>
									</div>

                                    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Address Email</label>
									    <input type="email" name="email" class="form-control @error('email') is-invalid                                            
                                        @enderror" value="{{old('email', $membres->email)}}" required>
                                        @error('email') <span class="text-danger">{{$message}}</span>@enderror
									</div>
									<div  class="col-md-6">
                            <label for="settings-input-3" class="form-label">Role</label>
                           <select name="role" class="form-select">
                            <option value="membre"  {{$membres->role=='membre' ? 'selected': ''}}  >Membre</option>
                                 <option value="admin" {{$membres->role=='admin' ? 'selected': ''}}>Administrateur</option>

                                 </select>
                        </div>


                        <div  class="col-md-6">
                            <label class="form-label">Statut du Compte</label>
                           <select name="statut" class="form-select">
                            <option value="actif" {{$membres->statut=='actif' ? 'selected': ''}}>Actif</option>
                                 <option value="inactif" {{$membres->statut=='inactif' ? 'selected': ''}}>Inactif</option>
                                    <option value="suspendu" {{$membres->statut=='suspendu' ? 'selected': ''}}>Suspendu</option>
                                    </select>
                        </div>

                        <hr>
                

                        <div  class="col-md-12">
                            <label class="form-label">Niveau mot de passe</label>
                            <input type="password" name="password" class="form-control "> 
                        </div>

                        <div  class="col-md-12">
                            <label class="form-label">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        
                        </div>
                        <hr>
                        <p></p>
                         <div class="col-12 mt-4 d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary text-white">
                        <i class="fas fa-arrow-left"></i> Annuler et Retour
                    </a>
                    
                    <button type="submit" class="btn btn-primary text-white">
                        <i class="fas fa-save"></i> Enregistrer les modifications
                    </button>
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