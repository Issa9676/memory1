
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-9 text-left">
										<thead>
											<tr>
                                                <th class="cell">ID</th>
												<th class="cell">Nom de l'établissement</th>
												<th class="cell">Type</th>
												<th class="cell">LOCALISTION</th>
												<th class="cell">CONTACT</th>
                                                <th class="cell">Personne Ressource</th>
                                                <th class="cell">Paramètres de partenariat</th><th class="cell">Taux de prise en charge</th>
                                                <th class="cell">Services proposés</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Actions</th>
												
											</tr>
										</thead>
										<tbody>
											
											 @foreach($etablissements as $e)
            <tr>
                <td class="cell">{{$e->id}}</td>
                <td class="cell">{{ $e->nom }}</td>
                <td class="cell">{{ $e->type }}</td>
                <td class="cell">
                    <strong >{{$e->ville}}</strong>
                    <br>
                    <small class="text-muted">{{$e->adresse}}</small>
                </td>
                <td class="cell">
                    <strong>{{$e->telephone}}</strong>
                    <br>
                <small class="text-muted">
                    
                {{$e->email}}</small>
                    
                </td>
                <td class="cell">{{$e->contact_personne}}</td>


                <td class="cell">
                    <span class="badge {{ $e->statut == 'non_partenaire' ? 'bg-danger' : 'bg-success' }}">
                        {{ ucfirst($e->statut) }}
                    </span>
                </td>

                <td class="cell">
                    <span class="badge {{ $e->taux_prise_en_charge == '70000' ? 'bg-success' : 'bg-info' }}">
                        {{ ucfirst($e->taux_prise_en_charge) }}
                    </span>
                </td>
                <td class="cell">
    @if($e->services)
        {{-- On transforme la chaine en liste (array) --}}
        @php $liste_services = explode(',', $e->services); @endphp

        @foreach($liste_services as $service)
            <span class="badge bg-info text-white mb-1">
                {{ trim($service) }} {{-- trim enlève les espaces inutiles --}}
            </span>
        @endforeach
    @else
        <span class="text-muted">Aucun service</span>
    @endif
</td>
                <td class="cell">{{ $e->created_at->format('d/m/Y') }}</td>

                <td class="cell" colspan="2">
                    
                    <button type="button" 
        onclick="openEditEtablissementModal({{ json_encode($e) }})" 
        class="btn btn-sm btn-primary">
Modifier
</button>
<form action="{{ route('etablissements.destroy', $e->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet établissement ?')">
        <i class="fa fa-trash"></i> Supprimer

    </button>
</form>
                </td>
            </tr>
            @endforeach
		
										</tbody>
									</table>
									

								</div>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
			        </div><!--//tab-pane-->
			        
			        
			        
			        
						        </div><!--//table-responsive-->
						    