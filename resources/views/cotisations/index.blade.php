
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
                                                <th class="cell">ID</th>
												<th class="cell">Réference</th>
												<th class="cell">Membre</th>
												<th class="cell">Période</th>
                                                <th class="cell">Mois</th>
                                                <th class="cell">Année</th>
												<th class="cell">Montant</th>
												<th class="cell">Mode paiement</th>
												<th class="cell" colspan="2">Statut</th>
                                                <th class="cell">Preuve</th>
                                                <th class="cell" colspan="2">Actions</th>
												
											</tr>
										</thead>
										<tbody>
											
											 @foreach($cotisations as $cotisation)
                    <tr>
                        <td>{{$cotisation->id}}</td>
                        <td><strong>{{ $cotisation->reference }}</strong></td>
                        <td>{{ $cotisation->user->name }}</td>
                        <td>{{$cotisation->date_cotisation}}</td>
                        <td>{{ $cotisation->mois }}</td>
                        <td>{{ $cotisation->annee }}</td>
                        <td>{{ number_format($cotisation->montant, 0, ',', ' ') }} FCFA</td>
                        <td>{{ $cotisation->mode_paiement}}</td>
                    
                       
                       
                       <td class="text-center align-middle" id="status-badge-{{ $cotisation->id }}">
    @if($cotisation->statut === 'paye')
        <span class="badge rounded-pill bg-success px-3" style="font-weight: 500;">Payé</span>
    @else
        <span class="badge rounded-pill bg-warning text-dark px-3" style="font-weight: 500;">Impayé</span>
    @endif
</td>

<td class="py-2 text-center">
                            @if($cotisation->preuve_paiement)
                                <a href="{{ asset('storage/' . $cotisation->preuve_paiement) }}" target="_blank" class="text-primary" title="Voir reçu">
                                    <i class="fas fa-file-invoice fa-lg"></i>
                                </a>
                            @else
                                <i class="fas fa-times text-light"></i>
                            @endif
                        </td>


<td class="text-center align-middle" id="action-container-{{ $cotisation->id }}">
    <div class="form-check form-switch d-inline-block shadow-sm rounded p-1 px-2 border bg-white">
        <input class="form-check-input ms-0 cursor-pointer" 
               type="checkbox" 
               role="switch" 
               style="width: 2.5em; height: 1.2em;"
               {{ $cotisation->statut === 'paye' ? 'checked' : '' }}
               onchange="changeStatus({{ $cotisation->id }})">
    </div>
</td>
                       
     
                    </tr>
                    @endforeach
		
										</tbody>
									</table>
									
				        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
						
			        </div><!--//tab-pane-->
			       
			        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
								
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
			        
						        </div><!--//table-responsive-->
						<script>
function changeStatus(id) {
    // On ne bloque pas l'UI, on envoie direct
    fetch(`/cotisations/${id}/toggle-status`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            // Mise à jour du badge de statut uniquement
            const badgeContainer = document.getElementById(`status-badge-${id}`);
            if(data.new_status === 'paye') {
                badgeContainer.innerHTML = '<span class="badge bg-success" style="font-size: 0.7rem;">PAYÉ</span>';
            } else {
                badgeContainer.innerHTML = '<span class="badge bg-warning text-dark" style="font-size: 0.7rem;">IMPAYÉ</span>';
            }
        } else {
            alert("Erreur de mise à jour");
            location.reload(); // En cas d'erreur, on refresh pour être sûr du statut
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        location.reload();
    });
}
</script>