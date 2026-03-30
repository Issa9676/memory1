
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                @if(auth()->user()->role === 'admin') <th>Membre</th> @endif
                <th>Établissement</th>
                <th>Membre</th>
                <th>Montant</th>
                <th>Date Demande</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($remboursements as $remb)
            <tr>
                @if(auth()->user()->role === 'admin') 
                    <td>{{ $remb->user->name }}</td> 
                @endif
                <td>{{ $remb->etablissement->nom }}</td>
                <td>{{ $remb->user->name }}</td> 
                <td><strong>{{ number_format($remb->montant_rembourse, 0, ',', ' ') }} FCFA</strong></td>
                <td>{{ $remb->date_demande }}</td>
                <td>
                    @if($remb->statut === 'en_attente')
                        <span class="badge bg-warning text-dark">En attente</span>
                    @elseif($remb->statut === 'approuve')
                        <span class="badge bg-success">Approuvé</span>
                    @else
                        <span class="badge bg-danger">Rejeté</span>
                    @endif
                </td>
                <td>
                    <a href="{{ asset('storage/' . $remb->facture_path) }}" target="_blank" class="btn btn-sm btn-outline-info">
                        Facture
                    </a>
                    
                    @if(auth()->user()->role === 'admin' && $remb->statut === 'en_attente')
                        <a href="{{ route('remboursements.edit', $remb->id) }}" class="btn btn-sm btn-primary">
                            Traiter
                        </a>
                    @endif
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
			       
			        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
					    <div class="app-card app-card-orders-table mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
								
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->
			        </div><!--//tab-pane-->
			        
						        </div><!--//table-responsive-->
						    