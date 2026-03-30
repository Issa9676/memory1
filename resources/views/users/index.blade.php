
	
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">ID</th>
												<th class="cell">Nom</th>
												<th class="cell">Email</th>
												<th class="cell">Statut</th>
												<th class="cell">Date Adhésion </th>
                                                <th class="cell">Actions</th>
												
											</tr>
										</thead>
										<tbody>
											
											 @foreach($membres as $membre)
            <tr>
                <td class="cell">{{$membre->id}}</td>
                <td class="cell">{{ $membre->name }}</td>
                <td class="cell">{{ $membre->email }}</td>
                <td class="cell">
                    <span class="badge {{ $membre->statut == 'actif' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($membre->statut) }}
                    </span>
                </td>
                <td class="cell">{{ $membre->created_at->format('d/m/Y') }}</td>
                <td>
        <button type="button" class="btn btn-sm btn-info text-white" 
            onclick="remplirModaleEdit({{ $membre->toJson() }})" 
            data-bs-toggle="modal" data-bs-target="#modalEditionMembre">
            <i class="fas fa-edit"></i> Modifier
        </button>

        <form action="{{ route('users.destroy', $membre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce membre définitivement ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger text-white">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </form>
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
						   