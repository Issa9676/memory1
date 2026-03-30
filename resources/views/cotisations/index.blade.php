
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
                       <td id="statut-text-{{ $cotisation->id }}">
    @if($cotisation->statut === 'paye')
        <span class="badge bg-success-soft text-success">Payé</span>
    @else
        <span class="badge bg-danger-soft text-danger">Impayé</span>
    @endif
</td>

<td id="status-container-{{ $cotisation->id }}">
    <button onclick="changeStatus({{ $cotisation->id }})" 
            class="btn btn-sm {{ $cotisation->statut === 'paye' ? 'btn-outline-danger' : 'btn-outline-success' }}" 
            title="{{ $cotisation->statut === 'paye' ? 'Marquer comme impayé' : 'Marquer comme payé' }}">
        <i class="fas {{ $cotisation->statut === 'paye' ? 'fa-times' : 'fa-check' }}"></i>
        {{ $cotisation->statut === 'paye' ? 'Annuler' : 'Valider' }}
    </button>
</td>
						<td>
                            @if($cotisation->preuve_paiement)
                                <a href="{{ asset('storage/' . $cotisation->preuve_paiement) }}" target="_blank" class="btn btn-sm btn-outline-primary">Voir reçu</a>
                            @else
                                <span class="text-muted">Aucune</span>
                            @endif
                        </td>
                        <td id="statut-text-{{ $cotisation->id }}">
    @if($cotisation->statut === 'paye')
        <span class="badge bg-success-soft text-success">Payé</span>
    @else
        <span class="badge bg-danger-soft text-danger">Impayé</span>
    @endif
</td>

<td id="status-container-{{ $cotisation->id }}">
    <button onclick="changeStatus({{ $cotisation->id }})" 
            class="btn btn-sm {{ $cotisation->statut === 'paye' ? 'btn-outline-danger' : 'btn-outline-success' }}" 
            title="{{ $cotisation->statut === 'paye' ? 'Marquer comme impayé' : 'Marquer comme payé' }}">
        <i class="fas {{ $cotisation->statut === 'paye' ? 'fa-times' : 'fa-check' }}"></i>
        {{ $cotisation->statut === 'paye' ? 'Annuler' : 'Valider' }}
    </button>
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
           
            const statutCell = document.getElementById(`statut-text-${id}`);
            if(statutCell) statutCell.innerText = data.new_status;

            // 2. Mettre à jour les boutons dans la colonne "Actions"
            const actionContainer = document.getElementById(`status-container-${id}`);
            
            // On reconstruit proprement le HTML du bouton
            const colorClass = data.new_status === 'paye' ? 'bg-success' : 'bg-danger';
            const label = data.new_status === 'paye' ? 'Payé' : 'Impayé';

            actionContainer.innerHTML = `
                <button onclick="changeStatus(${id})" class="badge ${colorClass}" style="border:none; cursor:pointer;">
                    ${label}
                </button>
            `;
        }
    })
    .catch(error => console.error('Erreur:', error));
}

</script>   