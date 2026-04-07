
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        @if(auth()->user()->role === 'admin') <th>Membre</th> @endif
                                        <th>Établissement</th>
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
                                            <td><span class="truncate">{{ $remb->user->name }}</span></td> 
                                        @endif
                                        <td>{{ $remb->etablissement->nom }}</td>
                                        <td><span class="fw-bold">{{ number_format($remb->montant_rembourse, 0, ',', ' ') }} FCFA</span></td>
                                        <td>{{ \Carbon\Carbon::parse($remb->date_demande)->format('d/m/Y') }}</td>
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
                                            <div class="d-flex gap-2">
                                                <a href="{{ asset('storage/' . $remb->facture_path) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i> Facture
                                                </a>
                                                
                                                @if(auth()->user()->role === 'admin' && $remb->statut === 'en_attente')
                                                    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#modalTraiter{{ $remb->id }}">
                                                        <i class="fas fa-edit"></i> Traiter
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>

                                    @if(auth()->user()->role === 'admin' && $remb->statut === 'en_attente')
                                    <div class="modal fade" id="modalTraiter{{ $remb->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title text-white">Traiter la demande #{{ $remb->id }}</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('remboursements.update', $remb->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-5 border-end">
                                                                <h6 class="text-muted small text-uppercase fw-bold">Détails</h6>
                                                                <p class="mb-1"><strong>Membre:</strong> {{ $remb->user->name }}</p>
                                                                <p class="mb-1"><strong>Montant:</strong> <span class="text-primary fw-bold">{{ number_format($remb->montant_rembourse, 0, ',', ' ') }} FCFA</span></p>
                                                                <p class="mb-1"><strong>Hôpital:</strong> {{ $remb->etablissement->nom }}</p>
                                                                <hr>
                                                                <div class="text-center">
                                                                    <a href="{{ asset('storage/' . $remb->facture_path) }}" target="_blank" class="btn btn-sm btn-light border w-100">
                                                                        <i class="fas fa-external-link-alt"></i> Vérifier la facture
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-7 ps-md-4">
                                                                <h6 class="text-muted small text-uppercase fw-bold">Décision</h6>
                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold">Action</label>
                                                                    <select name="statut" class="form-select border-primary" required>
                                                                        <option value="approuve">✅ Approuver le paiement</option>
                                                                        <option value="rejete">❌ Rejeter la demande</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label fw-bold" required>Commentaire (Motif)</label>
                                                                    <textarea name="notes" class="form-control" rows="4" placeholder="Ex: Facture conforme..."></textarea>
                                                                    <small class="text-muted">Optionnel pour une approbation, obligatoire pour un rejet.</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary shadow-sm px-4">Confirmer la décision</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div></div></div></div></div></div></div>```

