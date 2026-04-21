<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Gestion mutuelle de santé</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
			        </div><!--//col-->
		            <div class="app-search-box col">
		                <form class="app-search-form">   
							<input type="text" placeholder="Search..." name="search" class="form-control search-input">
							<button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fa-solid fa-magnifying-glass"></i></button> 
				        </form>
		            </div><!--//app-search-box-->
		            
		            <div class="app-utilities col-auto">
			            <div class="app-utility-item app-notifications-dropdown dropdown">    
				            <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
					            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
  <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>
					            <span class="icon-badge">3</span>
					        </a><!--//dropdown-toggle-->
					        
					        <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
					            <div class="dropdown-menu-header p-3">
						            <h5 class="dropdown-menu-title mb-0">Notifications</h5>
						        </div><!--//dropdown-menu-title-->
						        <div class="dropdown-menu-content">
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										       <img class="profile-image" src="assets/images/profiles/profile-1.png" alt="">
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">Amy shared a file with you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
											        <div class="meta"> 2 hrs ago</div>
										        </div>
									        </div><!--//col--> 
								        </div><!--//row-->
								        <a class="link-mask" href="notifications.html"></a>
							       </div><!--//item-->
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										        <div class="app-icon-holder">
											        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
	  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
	</svg>
										        </div>
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">You have a new invoice. Proin venenatis interdum est.</div>
											        <div class="meta"> 1 day ago</div>
										        </div>
									        </div><!--//col-->
								        </div><!--//row-->
								        <a class="link-mask" href="notifications.html"></a>
							       </div><!--//item-->
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										        <div class="app-icon-holder icon-holder-mono">
											        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-line" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
</svg>
										        </div>
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">Your report is ready. Proin venenatis interdum est.</div>
											        <div class="meta"> 3 days ago</div>
										        </div>
									        </div><!--//col-->
								        </div><!--//row-->
								        <a class="link-mask" href="notifications.html"></a>
							       </div><!--//item-->
							       <div class="item p-3">
								        <div class="row gx-2 justify-content-between align-items-center">
									        <div class="col-auto">
										       <img class="profile-image" src="assets/images/profiles/profile-2.png" alt="">
									        </div><!--//col-->
									        <div class="col">
										        <div class="info"> 
											        <div class="desc">James sent you a new message.</div>
											        <div class="meta"> 7 days ago</div>
										        </div>
									        </div><!--//col--> 
								        </div><!--//row-->
								        <a class="link-mask" href="notifications.html"></a>
							       </div><!--//item-->
						        </div><!--//dropdown-menu-content-->
						        
						        <div class="dropdown-menu-footer p-2 text-center">
							        <a href="notifications.html">View all</a>
						        </div>
															
							</div><!--//dropdown-menu-->					        
				        </div><!--//app-utility-item-->
			            <div class="app-utility-item">
				            <a href="settings.html" title="Settings">
					            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
  <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
</svg>
					        </a>
					    </div><!--//app-utility-item-->
			            
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png" alt="user profile"></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="account.html">Account</a></li>
								<li><a class="dropdown-item" href="settings.html">Settings</a></li>
								<li><hr class="dropdown-divider"></li>
								<li>
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
    </form>

    <a class="dropdown-item" href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="nav-icon">
            <i class="fas fa-sign-out-alt text-danger"></i>
        </span>
        <span class="nav-link-text text-danger">Déconnexion</span>    </a>
</li>
							</ul>
			            </div><!--//app-user-dropdown--> 
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="#"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">MUTUELLE SANTE</span></a>
	
		        </div><!--//app-branding-->  
		        
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1"  >
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link active" href="{{route('dashboard')}}">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
		  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
		</svg>
						         </span>
		                         <span class="nav-link-text">Dashboard</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="{{route('dashboard', ['view' => 'membres'])}}">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z"/>
  <path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z"/>
</svg>
						         </span>
		                         <span class="nav-link-text">Membres</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="{{route('dashboard', ['view' => 'cotisations'])}}">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
  <circle cx="3.5" cy="5.5" r=".5"/>
  <circle cx="3.5" cy="8" r=".5"/>
  <circle cx="3.5" cy="10.5" r=".5"/>
</svg>
						         </span>
		                         <span class="nav-link-text">Cotisations</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item ">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link " href="{{route('dashboard', ['view' => 'remboursements'])}}" >
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
	  <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
	</svg>
						         </span>
		                         <span class="nav-link-text">Rembourssements</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        
					    <li class="nav-item">
    <a class="nav-link {{ request('view') == 'etablissements' ? 'active' : '' }}" 
       href="{{ route('dashboard', ['view' => 'etablissements']) }}">
        <span class="nav-icon">
            {{-- Utilisation de 'fa-hospital-alt' pour un look plus moderne --}}
            <i class="fas fa-hospital-alt shadow-sm"></i>
        </span>
        <span class="nav-link-text">Etablissements</span>
    </a>
</li>
					   
					    
							<li class="nav-item">
    <form method="POST" action="{{ route('logout') }}" id="sidebar-logout-form" class="d-none">
        @csrf
    </form>
    <a class="nav-link" href="{{ route('logout') }}" 
       onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
        <span class="nav-icon">
            <i class="fas fa-sign-out-alt text-danger"></i>
        </span>
        <span class="nav-link-text text-danger">Déconnexion</span>
    </a>
</li> 
				    </ul><!--//app-menu-->
		       
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">

		    <div class="container-xl">
			   {{-- 1. SI ON A CLIQUÉ SUR MEMBRES --}}
    @if(request('view') == 'membres')
          
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Liste des adhérents</h1>
    </div>
    <div class="col-auto">
        <button type="button" class="btn btn-success text-white shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCreateUser" style="position: relative; z-index: 10;">
            <i class="fa-solid fa-plus me-1"></i> Nouveau membre
        </button>

    </div>
</div>

@if(session('success'))
    
    <div id="notif-session" class="alert alert-success alert-dismissible fade show shadow-sm" 
         role="alert" >
        
        
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Ce script ne s'exécute que si le message de succès existe
        setTimeout(function() {
            let alertElement = document.getElementById('notif-session');
            if (alertElement) {
                // Utilise la transition de Bootstrap
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                
                // Supprime l'élément après l'animation
                setTimeout(() => alertElement.remove(), 500);
            }
        }, 4000); // 4 secondes pour laisser le temps de lire
    </script>

@endif

@if(session('error'))
    
    <div id="notif-session" class="alert alert-danger alert-dismissible fade show shadow-sm" 
         role="alert" >
        
        
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('error') }}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Ce script ne s'exécute que si le message de succès existe
        setTimeout(function() {
            let alertElement = document.getElementById('notif-session');
            if (alertElement) {
                // Utilise la transition de Bootstrap
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                
                // Supprime l'élément après l'animation
                setTimeout(() => alertElement.remove(), 500);
            }
        }, 4000); // 4 secondes pour laisser le temps de lire
    </script>

@endif

@if($errors->any())
    <div id="notif-error" class="alert alert-danger shadow-sm" 
         style="position: fixed; top: 80px; right: 20px; z-index: 9999;">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        setTimeout(() => {
            let err = document.getElementById('notif-error');
            if(err) err.remove();
        }, 5000);
    </script>
@endif

<div class="modal fade" id="modalCreateUser" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h3 class="modal-title" id="modalLabel">Ajouter un nouvel adhérent</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                
                <div class="modal-body p-4">
                    <!-- SECTION 1 : IDENTITÉ -->
                    <div class="border-bottom pb-2 mb-3">
                        <h5 class="text-success"><i class="fa-solid fa-user-check"></i> Identité</h5>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nom complet <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Ex: IDRISSA ADAMOU GARBA" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Fonction</label>
                            <input type="text" name="fonction" class="form-control" placeholder="Ex: Agent, Cadre, Directeur...">
                        </div>
                    </div>

                    <!-- SECTION 2 : CONTACT -->
                    <div class="border-bottom pb-2 mb-3">
                        <h5 class="text-success"><i class="fa-solid fa-address-card"></i> Contact</h5>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="exemple@mail.com" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Téléphone / Contact</label>
                            <input type="tel" name="contact" class="form-control" placeholder="Ex: 90 00 00 00">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Localité</label>
                            <input type="text" name="localite" class="form-control" placeholder="Ex: Niamey, Zinder, Maradi...">
                        </div>
                    </div>

                    <!-- SECTION 3 : INFORMATIONS FINANCIÈRES -->
                    <div class="border-bottom pb-2 mb-3">
                        <h5 class="text-success"><i class="fa-solid fa-coins"></i> Informations financières</h5>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Salaire de base (FCFA) <span class="text-danger">*</span></label>
                            <input type="number" name="salaire_base" class="form-control" placeholder="Ex: 400633" required>
                            <small class="text-muted">Salaire brut mensuel en FCFA</small>
                        </div>
                    </div>

                    <!-- SECTION 4 : SÉCURITÉ -->
                    <div class="border-bottom pb-2 mb-3">
                        <h5 class="text-success"><i class="fa-solid fa-lock"></i> Sécurité</h5>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Mot de passe <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" placeholder="Minimum 8 caractères" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Confirmer le mot de passe <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Répéter le mot de passe" required>
                        </div>
                    </div>

                    <!-- SECTION 5 : RÔLE ET STATUT -->
                    <div class="border-bottom pb-2 mb-3">
                        <h5 class="text-success"><i class="fa-solid fa-gear"></i> Configuration</h5>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Rôle</label>
                            <select name="role" class="form-select">
                                <option value="membre" selected>Membre (Adhérent)</option>
                                <option value="admin">Administrateur</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Statut</label>
                            <select name="statut" class="form-select">
                                <option value="actif" selected>Actif</option>
                                <option value="inactif">Inactif</option>
                                <option value="suspendu">Suspendu</option>
                            </select>
                        </div>
                    </div>

                    <!-- MESSAGE D'INFORMATION -->
                    <div class="alert alert-info mt-2 mb-0">
                        <i class="fa-solid fa-circle-info"></i> 
                        <strong>À savoir :</strong>
                        <ul class="mb-0 mt-1">
                            <li>Le matricule est généré automatiquement (ex: MUT-2025-0001)</li>
                            <li>Le taux de cotisation sera calculé automatiquement (1,5% assuré + 1% si conjointe + 0,5% par enfant)</li>
                            <li>La part État = part assuré × 2</li>
                        </ul>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success text-white px-4">Créer l'adhérent</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="app-card app-card-orders-table shadow-sm mb-5">
    </div>


        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-3">
                {{-- On affiche ta liste ici --}}
                @include('users.index') 
            </div>
        </div>

		@elseif(request('view') == 'cotisations')


@if(session('success'))
    
    <div id="notif-session" class="alert alert-success alert-dismissible fade show shadow-sm" 
         role="alert" >
        
        
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Ce script ne s'exécute que si le message de succès existe
        setTimeout(function() {
            let alertElement = document.getElementById('notif-session');
            if (alertElement) {
                // Utilise la transition de Bootstrap
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                
                // Supprime l'élément après l'animation
                setTimeout(() => alertElement.remove(), 500);
            }
        }, 4000); // 4 secondes pour laisser le temps de lire
    </script>

@endif


@if(session('error'))
    
    <div id="notif-session" class="alert alert-danger alert-dismissible fade show shadow-sm" 
         role="alert" >
        
        
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('error') }}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Ce script ne s'exécute que si le message de succès existe
        setTimeout(function() {
            let alertElement = document.getElementById('notif-session');
            if (alertElement) {
                // Utilise la transition de Bootstrap
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                
                // Supprime l'élément après l'animation
                setTimeout(() => alertElement.remove(), 500);
            }
        }, 4000); // 4 secondes pour laisser le temps de lire
    </script>

@endif

		
		<div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Historique des Cotisations</h1>
            </div>
            <div class="col-auto">
                {{-- BOUTON POUR LE MODAL --}}
                <button class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#modalAddCotisation">
                    + Ajouter une cotisation
                </button>
            </div>
        </div>
		
		
		<div class="modal fade" id="modalAddCotisation" tabindex="-1" aria-labelledby="modalAddCotisationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddCotisationLabel">Enregistrer une Cotisation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cotisations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6 mb-3">
                        <label>Membre</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="" >Sélectionner un membre</option >
                            @foreach($membres as $membre)
                                <option value="{{ $membre->id }}">{{ $membre->name }}</option>
                            @endforeach
                        </select>
                    </div>

                        <div class="col-md-6 mb-3">
                        <label>Montant (FCFA)</label>
                        <input type="number" name="montant" class="form-control" placeholder="10000" required>
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
                        <input type="number" name="annee" class="form-control" value="{{ date('Y') }}" required>
                    </div>



                     <div class="col-md-3 mb-3">
                        <label>Date de la cotisation</label>
                        <input type="date" name="date_cotisation" class="form-control" value="{{ date('Y-m-d') }}" required>
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
                        <input type="file" name="preuve_paiement" class="form-control" required>
                    </div>
                    </div>

                    <div class="modal-footer px-0 pb-0 pt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary text-white">Enregistrer la cotisation</button>
                    </div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-3">
                {{-- On affiche ta liste ici --}}
                @include('cotisations.index') 
            </div>

        </div>

	

		@elseif(request('view') == 'remboursements')

		<div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Historique des Rembourssements</h1>
            </div>
            <div class="col-auto">
                {{-- BOUTON POUR LE MODAL --}}
                <button class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#modalAddRemboursement">
                    + Ajouter un remboursement
                </button>
            </div>
        </div>


		@if(session('success'))
    
    <div id="notif-session" class="alert alert-success alert-dismissible fade show shadow-sm" 
         role="alert" >
        
        
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Ce script ne s'exécute que si le message de succès existe
        setTimeout(function() {
            let alertElement = document.getElementById('notif-session');
            if (alertElement) {
                // Utilise la transition de Bootstrap
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                
                // Supprime l'élément après l'animation
                setTimeout(() => alertElement.remove(), 500);
            }
        }, 4000); // 4 secondes pour laisser le temps de lire
    </script>

@endif


@if(session('error'))
    
    <div id="notif-session" class="alert alert-danger alert-dismissible fade show shadow-sm" 
         role="alert" >
        
        
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('error') }}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Ce script ne s'exécute que si le message de succès existe
        setTimeout(function() {
            let alertElement = document.getElementById('notif-session');
            if (alertElement) {
                // Utilise la transition de Bootstrap
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                
                // Supprime l'élément après l'animation
                setTimeout(() => alertElement.remove(), 500);
            }
        }, 4000); // 4 secondes pour laisser le temps de lire
    </script>

@endif

		<div class="modal fade" id="modalAddRemboursement" tabindex="-1" aria-labelledby="modalAddRemboursementLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddRemboursementLabel">Enregistrer un remboursement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
<form action="{{ route('remboursements.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body p-4">

    <select name="beneficiaire_id" class="form-select">
    <option value="">-- Le membre lui-même --</option>
    @foreach($membres as $m)
        <optgroup label="Famille de {{ $m->name }}">
            @foreach($m->beneficiaires as $b)
                <option value="{{ $b->id }}">{{ $b->nom_complet }} ({{ $b->lien_parente }})</option>
            @endforeach
        </optgroup>
    @endforeach
</select>

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
	</div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Sélection des éléments
    const montantInput = document.getElementById('montant_facture');
    const selectEtab = document.getElementById('etablissement_id');
    const estimationSpan = document.getElementById('montant_estime');

    // 2. Fonction de calcul
    function calculerRemboursement() {
        // Récupère la valeur saisie
        let montant = parseFloat(montantInput.value) || 0;
        
        // Récupère le taux dynamique de l'établissement sélectionné
        // Si aucune option n'est choisie, on utilise 0
        let selectedOption = selectEtab.options[selectEtab.selectedIndex];
        let taux = selectedOption ? parseFloat(selectedOption.getAttribute('data-taux')) : 0;
        
        // Calcul (Ex: 10 000 * 70 / 100 = 7 000)
        let resultat = (montant * taux) / 100;
        
        // Mise à jour de l'affichage dans la modale
        estimationSpan.innerText = new Intl.NumberFormat('fr-FR').format(resultat);
    }

    // 3. Écouteurs d'événements
    if(montantInput && selectEtab) {
        montantInput.addEventListener('input', calculerRemboursement);
        selectEtab.addEventListener('change', calculerRemboursement);
    }
});
</script>

</div>
        </div>
    </div>
</div>


        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-3">
                {{-- On affiche ta liste ici --}}
                @include('remboursements.index') 
            </div>
        </div>

		@elseif(request('view') == 'etablissements')

		<div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Listes des etablissements</h1>
            </div>
            <div class="col-auto">
                {{-- BOUTON POUR LE MODAL --}}
                <button class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#modalEtablissement">
                    + Ajouter un etablissement
                </button>
            </div>
        </div>



		@if(session('success'))
    
    <div id="notif-session" class="alert alert-success alert-dismissible fade show shadow-sm" 
         role="alert" >
        
        
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Ce script ne s'exécute que si le message de succès existe
        setTimeout(function() {
            let alertElement = document.getElementById('notif-session');
            if (alertElement) {
                // Utilise la transition de Bootstrap
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                
                // Supprime l'élément après l'animation
                setTimeout(() => alertElement.remove(), 500);
            }
        }, 4000); // 4 secondes pour laisser le temps de lire
    </script>

@endif


@if(session('error'))
    
    <div id="notif-session" class="alert alert-danger alert-dismissible fade show shadow-sm" 
         role="alert" >
        
        
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('error') }}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        // Ce script ne s'exécute que si le message de succès existe
        setTimeout(function() {
            let alertElement = document.getElementById('notif-session');
            if (alertElement) {
                // Utilise la transition de Bootstrap
                alertElement.classList.remove('show');
                alertElement.classList.add('fade');
                
                // Supprime l'élément après l'animation
                setTimeout(() => alertElement.remove(), 500);
            }
        }, 4000); // 4 secondes pour laisser le temps de lire
    </script>

@endif

<div class="modal fade" id="modalEtablissement" tabindex="-1" aria-labelledby="modalAddRemboursementLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"  class="forced-colors:bg-green-500">
                <h5 class="modal-title" id="modalEtablissementLabel">Enregistrer un etablissement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
		<form action="{{ route('etablissements.store') }}" method="POST">
    @csrf
	<div class="modal-body p-4">
    <div class="card p-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nom de l'établissement</label>
                <input type="text" name="nom" class="form-control" placeholder="ex: Clinique de l'Espoir" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-select">
                    <option value="hopital">Hôpital</option>
                    <option value="clinique">Clinique</option>
                    <option value="pharmacie">Pharmacie</option>
                    <option value="laboratoire">Laboratoire</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Téléphone</label>
                <input type="text" name="telephone" class="form-control" placeholder="96768186">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="espoir@gmail.com">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Personne Ressource (Contact_personne)</label>
                <input type="text" name="contact_personne" class="form-control" placeholder="ex: Madame SG">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Ville</label>
                <input type="text" name="ville" class="form-control" placeholder="Ex: Niamey">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Adresse / Quartier</label>
                <input type="text" name="adresse" class="form-control" placeholder="Ex: Lazaret">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Statut Partenaire</label>
                <select name="statut" id="statut_select" class="form-select">
                    <option value="partenaire">Partenaire</option>
                    <option value="non_partenaire">Non Partenaire</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Taux de prise en charge (%)</label>
                <input type="number" name="taux_prise_en_charge" id="taux_input" class="form-control" value="70.00" step="0.01">
            </div>
        </div>

        <div class="col-12">
    <label class="form-label font-weight-bold">Services conventionnés</label>
    <div class="d-flex flex-wrap gap-3 p-2 border rounded bg-light">
        @php 
            $services_disponibles = ['Consultation', 'Pharmacie', 'Maternité', 'Radiologie', 'Analyse', 'Hospitalisation'];
        @endphp

        @foreach($services_disponibles as $srv)
            <div class="form-check me-3">
                <input class="form-check-input" type="checkbox" name="services_list[]" value="{{ $srv }}" id="srv_{{ $loop->index }}">
                <label class="form-check-label" for="srv_{{ $loop->index }}">
                    {{ $srv }}
                </label>
            </div>
        @endforeach
    </div>
</div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Enregistrer l'établissement</button>
                    </div>
    </div>
	</div>
</form>
</div>
        </div>
    </div>
</div>

        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body p-3">
                {{-- On affiche ta liste ici --}}
                @include('etablissements.index') 
            </div>
        </div>


    {{-- 2. SINON (PAR DÉFAUT), ON AFFICHE LES COMPTEURS --}}
    @else

        <h1 class="app-page-title">Tableau de bord - mutuelle de santé</h1>
        
            <div class="row g-4 mb-4">
    <div class="row g-4 mb-4">
    <div class="col-6 col-lg">
        <div class="app-card app-card-stat shadow-sm h-100 border-bottom-secondary border-success">
            <div class="app-card-body p-3 p-lg-4 text-center">
                <h4 class="stats-type mb-1 text-success"><i class="fa-solid fa-users me-2"></i>MEMBRES Actifs</h4>
                <div class="stats-figure font-weight-bold">{{ $total_membres }}</div>
            </div>
        </div>
    </div>


     <div class="col-6 col-lg">
        <div class="app-card app-card-stat shadow-sm h-100 border-bottom-secondary border-success">
            <div class="app-card-body p-3 p-lg-4 text-center">
                <h4 class="stats-type mb-1 text-red"><i class="fa-solid fa-users me-2"></i>MEMBRES Inactifs</h4>
                <div class="stats-figure font-weight-bold">{{ $membresInactifs }}</div>
            </div>
        </div>
    </div>


     <div class="col-6 col-lg">
        <div class="app-card app-card-stat shadow-sm h-100 border-bottom-secondary border-success">
            <div class="app-card-body p-3 p-lg-4 text-center">
                <h4 class="stats-type mb-1 text-danger"><i class="fa-solid fa-users me-2"></i>MEMBRES Supendus</h4>
                <div class="stats-figure font-weight-bold">{{ $membresSuspendu }}</div>
            </div>
        </div>
    </div>
    
    <div class="col-6 col-lg">
        <div class="app-card app-card-stat shadow-sm h-100 border-bottom-secondary border-warning">
            <div class="app-card-body p-3 p-lg-4 text-center">
                <h4 class="stats-type mb-1 text-warning"><i class="fa-solid fa-hospital me-2"></i>PARTENAIRES</h4>
                <div class="stats-figure font-weight-bold">{{ $etablissement_count }}</div>
            </div>
        </div>
    </div>
    
    <div class="col-6 col-lg text-nowrap">
        <div class="app-card app-card-stat shadow-sm h-100 border-bottom-secondary border-primary">
            <div class="app-card-body p-3 p-lg-4 text-center">
                <h4 class="stats-type mb-1 text-primary"><i class="fa-solid fa-wallet me-2"></i>COTISATIONS</h4>
                <div class="stats-figure font-weight-bold">{{ number_format($total_cotisations, 0, ',', ' ') }} <small class="fs-6">FCFA</small></div>
            </div>
        </div>
    </div>


    <div class="col-6 col-lg text-nowrap">
        <div class="app-card app-card-stat shadow-sm h-100 border-bottom-secondary border-primary">
            <div class="app-card-body p-3 p-lg-4 text-center">
                <h4 class="stats-type mb-1 text-primary"><i class="fa-solid fa-wallet me-2"></i>COTISATIONS EN ENTENTE DE PAYEMENT</h4>
                <div class="stats-figure font-weight-bold">{{($CotisatisationsEnAttente) }}</div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg text-nowrap">
        <div class="app-card app-card-stat shadow-sm h-100 border-bottom-secondary border-info">
            <div class="app-card-body p-3 p-lg-4 text-center">
                <h4 class="stats-type mb-1 text-info"><i class="fa-solid fa-hand-holding-dollar me-2"></i>PAYÉS</h4>
                <div class="stats-figure font-weight-bold">{{ number_format($total_remboursements, 0, ',', ' ') }} <small class="fs-6">FCFA</small></div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg">
        <div class="app-card app-card-stat shadow-sm h-100 border-bottom-secondary border-danger">
            <div class="app-card-body p-3 p-lg-4 text-center">
                <h4 class="stats-type mb-1 text-danger"><i class="fa-solid fa-clock-rotate-left me-2"></i>EN ATTENTE</h4>
                <div class="stats-figure text-danger font-weight-bold">{{ $demandes_en_attente }}</div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="app-card shadow-sm h-100 p-4">
            <h3 class="text-sm font-bold">Cotisations mensuelles</h3>
            <div style="height: 250px;"><canvas id="cotisationsMensuellesChart"></canvas></div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="app-card shadow-sm h-100 p-4">
            <h3 class="text-sm font-bold">Remboursements mensuels</h3>
            <div style="height: 250px;"><canvas id="remboursementsMensuelsChart"></canvas></div>
        </div>
    </div>
</div>


<div class="row g-4 mb-4">
    <div class="col-12 col-md-6">
        <div class="app-card app-card-chart h-100 shadow-sm p-4">
            <h3 class="app-card-title text-center mb-3">Statut des cotisations</h3>
            <div class="chart-container" style="position: relative; height:220px;">
                <canvas id="statutCotisationChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="app-card app-card-chart h-100 shadow-sm p-4">
            <h3 class="app-card-title text-center mb-3">Statut des remboursements</h3>
            <div class="chart-container" style="position: relative; height:220px;">
                <canvas id="statutRemboursementChart"></canvas>
            </div>
        </div>
    </div>
</div>


{{-- Ajoute tes autres blocs ici --}}
        </div>
    @endif

</div>


			</div>    
	    </div><!--//app-content-->
	    
	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script> 
    <script src="assets/js/index-charts.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 


<div id="editEtablissementModal" class="modal-custom" style="display:none; position: fixed; inset: 0; z-index: 9999; background: rgba(0,0,0,0.6); align-items: center; justify-content: center;">
    <div style="background: white; width: 90%; max-width: 650px; border-radius: 8px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        
        <div style="background: #15a362; color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center;">
            <h5 style="margin: 0; color: white;">Modifier l'Établissement</h5>
           <button type="button" onclick="closeEditModal()" style="background: none; border: none; color: white; font-size: 24px; cursor: pointer; line-height: 1;">
        &times;
    </button>
        </div>

        <form id="editEtablissementForm" method="POST" style="padding: 20px;">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                <div style="grid-column: span 2;">
                    <label style="display: block; font-weight: bold;">Nom de l'établissement</label>
                    <input type="text" name="nom" id="edit_nom" class="form-control">
                </div>
                
                <div>
                    <label style="display: block; font-weight: bold;">Type</label>
                    <select name="type" id="edit_type" class="form-select">
                        <option value="hopital">Hôpital</option>
                        <option value="clinique">Clinique</option>
                        <option value="pharmacie">Pharmacie</option>
                        <option value="laboratoire">Laboratoire</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-weight: bold;">Statut</label>
                    <select name="statut" id="edit_statut" class="form-select">
                        <option value="partenaire">Partenaire</option>
                        <option value="non_partenaire">Non Partenaire</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-weight: bold;">Téléphone</label>
                    <input type="text" name="telephone" id="edit_telephone" class="form-control">
                </div>
                <div>
                    <label style="display: block; font-weight: bold;">Email</label>
                    <input type="email" name="email" id="edit_email" class="form-control">
                </div>

                <div>
                    <label style="display: block; font-weight: bold;">Ville</label>
                    <input type="text" name="ville" id="edit_ville" class="form-control">
                </div>
                <div>
                    <label style="display: block; font-weight: bold;">Taux (%)</label>
                    <input type="number" name="taux_prise_en_charge" id="edit_taux" class="form-control">
                </div>

                <div style="grid-column: span 2;">
                    <label style="display: block; font-weight: bold;">Services (séparés par des virgules)</label>
                    <input type="text" name="services" id="edit_services" class="form-control" placeholder="Ex: Chirurgie, Pharmacie, Urgence">
                </div>
            </div>

            <div style="margin-top: 20px; text-align: right;">
                <button type="submit" class="btn btn-primary" style="background: #15a362; border: none;">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

<script>
function closeEditModal() {
    // Cette ligne cible l'ID de ta modale pour la cacher
    document.getElementById('editEtablissementModal').style.display = 'none';
}
</script>

<script>
    window.onclick = function(event) {
    let modal = document.getElementById('editEtablissementModal');
    if (event.target == modal) {
        closeEditModal();
    }
}
</script>

<script>
function openEditEtablissementModal(data) {
    const modal = document.getElementById('editEtablissementModal');
    const form = document.getElementById('editEtablissementForm');

    form.action = "/etablissements/" + data.id;
    
    document.getElementById('edit_nom').value = data.nom || '';
    document.getElementById('edit_type').value = data.type || '';
    document.getElementById('edit_statut').value = data.statut || 'partenaire';
    document.getElementById('edit_telephone').value = data.telephone || '';
    document.getElementById('edit_email').value = data.email || '';
    document.getElementById('edit_ville').value = data.ville || '';
    document.getElementById('edit_taux').value = data.taux_prise_en_charge || '';
    document.getElementById('edit_services').value = data.services || '';

    modal.style.display = 'flex';
}
</script>


    <div class="modal fade" id="modalEditionMembre" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">
                    <i class="fas fa-user-edit"></i> Modifier les informations de l'adhérent
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="formulaireEdition" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- IDENTITÉ -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nom Complet <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Matricule</label>
                            <input type="text" id="edit_matricule" class="form-control" disabled>
                            <small class="text-muted">Le matricule est généré automatiquement</small>
                        </div>
                    </div>

                    <!-- CONTACT -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="edit_profil" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Téléphone / Contact</label>
                            <input type="text" name="contact" id="edit_contact" class="form-control">
                        </div>
                    </div>

                    <!-- PROFESSION & LOCALISATION -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fonction</label>
                            <input type="text" name="fonction" id="edit_fonction" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Localité</label>
                            <input type="text" name="localite" id="edit_localite" class="form-control">
                        </div>
                    </div>

                    <!-- INFORMATIONS FINANCIÈRES -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Salaire de base (FCFA)</label>
                            <input type="number" name="salaire_base" id="edit_salaire_base" class="form-control">
                            <small class="text-muted">Base de calcul de la cotisation</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Taux de cotisation</label>
                            <input type="text" id="edit_taux" class="form-control" disabled>
                            <small class="text-muted">Calculé automatiquement selon les bénéficiaires</small>
                        </div>
                    </div>

                    <!-- CONFIGURATION -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rôle</label>
                            <select name="role" id="edit_role" class="form-select">
                                <option value="membre">Membre (Adhérent)</option>
                                <option value="admin">Administrateur</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Statut</label>
                            <select name="statut" id="edit_statut" class="form-select">
                                <option value="actif">Actif</option>
                                <option value="inactif">Inactif</option>
                                <option value="suspendu">Suspendu</option>
                            </select>
                        </div>
                    </div>

                    <!-- MOT DE PASSE -->
                    <div class="alert alert-info mt-2">
                        <i class="fas fa-info-circle"></i>
                        Laissez le mot de passe vide pour ne pas le changer.
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary text-white">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function remplirModaleEdit(user) {
    const url = "{{ url('users') }}/" + user.id;
    document.getElementById('formulaireEdition').action = url;

    // Remplir tous les champs
    document.getElementById('edit_name').value = user.name || '';
    document.getElementById('edit_matricule').value = user.matricule || 'Généré automatiquement';
    document.getElementById('edit_profil').value = user.email || '';
    document.getElementById('edit_contact').value = user.contact || '';
    document.getElementById('edit_fonction').value = user.fonction || '';
    document.getElementById('edit_localite').value = user.localite || '';
    document.getElementById('edit_salaire_base').value = user.salaire_base || '';
    document.getElementById('edit_taux').value = (user.taux_cotisation || 'Calculé auto') + '%';
    document.getElementById('edit_role').value = user.role || 'membre';
    document.getElementById('edit_statut').value = user.statut || 'actif';
}
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Récupération des données PHP (Une seule fois)
    const labelsMois = @json($nomsMois);
    const dataCotis = @json($dataCotisations);
    const dataRemb = @json($dataRemboursements);
    const dataCotisMensuelles = Object.values(@json($finalCotisMensuelles));
    const dataRembMensuclles = Object.values(@json($finalRembMensuclles));

    // 2. Configurations des styles
    const doughnutOptions = {
        maintainAspectRatio: false,
        cutout: '75%',
        plugins: {
            legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } }
        }
    };

    const lineOptions = {
        maintainAspectRatio: false,
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, grid: { drawBorder: false, borderDash: [5, 5] } },
            x: { grid: { display: false } }
        },
        elements: { line: { tension: 0.4 } }
    };

    // --- GRAPHIQUE 1 : Doughnut Cotisations ---
    const ctx1 = document.getElementById('statutCotisationChart');
    if (ctx1) {
        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: Object.keys(dataCotis),
                datasets: [{
                    data: Object.values(dataCotis),
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                    borderWidth: 2
                }]
            },
            options: doughnutOptions
        });
    }

    // --- GRAPHIQUE 2 : Doughnut Remboursements ---
    const ctx2 = document.getElementById('statutRemboursementChart');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: Object.keys(dataRemb),
                datasets: [{
                    data: Object.values(dataRemb),
                    backgroundColor: ['#0d6efd', '#f59e0b', '#dc3545'],
                    borderWidth: 2
                }]
            },
            options: doughnutOptions
        });
    }

    // --- GRAPHIQUE 3 : Courbe Mensuelle Cotisations ---
    const ctx3 = document.getElementById('cotisationsMensuellesChart');
    if (ctx3) {
        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: labelsMois,
                datasets: [{
                    label: 'Cotisations',
                    data: dataCotisMensuelles,
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    fill: true
                }]
            },
            options: lineOptions
        });
    }

    // --- GRAPHIQUE 4 : Courbe Mensuelle Remboursements ---
    const ctx4 = document.getElementById('remboursementsMensuelsChart');
    if (ctx4) {
        const context = ctx4.getContext('2d');
        const gradient = context.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(59, 130, 246, 0.4)');
        gradient.addColorStop(1, 'rgba(59, 130, 246, 0)');

        new Chart(ctx4, {
            type: 'line',
            data: {
                labels: labelsMois,
                datasets: [{
                    label: 'Remboursements',
                    data: dataRembMensuclles,
                    borderColor: '#3b82f6',
                    backgroundColor: gradient,
                    fill: true
                }]
            },
            options: lineOptions
        });
    }
});
</script>
</body>


</html> 

