<!-- Filtre et actions -->
<div class="row mb-4">
    <div class="col-md-8">
        <form method="GET" action="{{ route('cotisations.index') }}" class="row g-2">
            <div class="col-auto">
                <select name="mois" class="form-select">
                    @foreach(['01'=>'Janvier','02'=>'Février','03'=>'Mars','04'=>'Avril','05'=>'Mai','06'=>'Juin','07'=>'Juillet','08'=>'Août','09'=>'Septembre','10'=>'Octobre','11'=>'Novembre','12'=>'Décembre'] as $num => $nom)
                        <option value="{{ $num }}" {{ request('mois', date('m')) == $num ? 'selected' : '' }}>{{ $nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <input type="number" name="annee" value="{{ request('annee', date('Y')) }}" class="form-control" style="width: 100px;">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </div>
        </form>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('cotisations.generer') }}?mois={{ request('mois', date('m')) }}&annee={{ request('annee', date('Y')) }}" 
           class="btn btn-success" 
           onclick="return confirm('Générer les cotisations pour ce mois ?')">
           🔄 Générer le mois
        </a>
        <a href="{{ route('cotisations.create') }}" class="btn btn-primary">
           ➕ Nouvelle cotisation
        </a>
    </div>
</div>

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">N° ordre</th>
                                <th class="cell">Membre</th>
                                <th class="cell">Salaire base (FCFA)</th>
                                <th class="cell">Taux (%)</th>
                                <th class="cell">Total (FCFA)</th>
                                <th class="cell">Statut</th>
                                <th class="cell">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cotisations as $cotisation)
                            <tr>
                                <td><strong>{{ $cotisation->numero_ordre ?? $loop->iteration }}</strong></td>
                                <td>{{ $cotisation->user->name }}</td>
                                <td>{{ number_format($cotisation->salaire_base ?? $cotisation->user->salaire_base, 0, ',', ' ') }} FCFA</td>
                                <td>{{ $cotisation->pourcentage_retenue ?? '—' }}%</td>
                                <td><strong>{{ number_format($cotisation->montant, 0, ',', ' ') }} FCFA</strong></td>
                                
                                <td class="text-center align-middle" id="status-badge-{{ $cotisation->id }}">
                                    @if($cotisation->statut === 'paye')
                                        <span class="badge rounded-pill bg-success px-3" style="font-weight: 500;">Payé</span>
                                    @else
                                        <span class="badge rounded-pill bg-warning text-dark px-3" style="font-weight: 500;">Impayé</span>
                                    @endif
                                </td>

                                <td class="text-center align-middle">
                                    <div class="form-check form-switch d-inline-block shadow-sm rounded p-1 px-2 border bg-white">
                                        <input class="form-check-input ms-0 cursor-pointer" 
                                               type="checkbox" 
                                               role="switch" 
                                               style="width: 2.5em; height: 1.2em;"
                                               {{ $cotisation->statut === 'paye' ? 'checked' : '' }}
                                               onchange="changeStatus({{ $cotisation->id }})">
                                    </div>
                                    <!-- Bouton Détails avec les données -->
                                    <button type="button" 
                                            class="btn btn-sm btn-info ms-2" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#detailModal"
                                            data-membre="{{ $cotisation->user->name }}"
                                            data-salaire="{{ number_format($cotisation->salaire_base ?? $cotisation->user->salaire_base, 0, ',', ' ') }}"
                                            data-taux="{{ $cotisation->pourcentage_retenue ?? '—' }}"
                                            data-part-assure="{{ number_format($cotisation->part_assure, 0, ',', ' ') }}"
                                            data-part-etat="{{ number_format($cotisation->part_etat, 0, ',', ' ') }}"
                                            data-total="{{ number_format($cotisation->montant, 0, ',', ' ') }}">
                                        📄 Détails
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
</div>

<!-- MODAL DÉTAILS -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel">📋 Détail de la cotisation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 40%;">Membre</th>
                        <td id="modal-membre">—</td>
                    </tr>
                    <tr>
                        <th>Salaire base</th>
                        <td id="modal-salaire">— FCFA</td>
                    </tr>
                    <tr>
                        <th>Taux appliqué</th>
                        <td id="modal-taux">—%</td>
                    </tr>
                    <tr class="table-light">
                        <th>Part assuré</th>
                        <td id="modal-part-assure">— FCFA</td>
                    </tr>
                    <tr class="table-light">
                        <th>Part État (×2)</th>
                        <td id="modal-part-etat" class="text-primary fw-bold">— FCFA</td>
                    </tr>
                    <tr class="table-success">
                        <th>Total cotisation</th>
                        <td id="modal-total" class="fw-bold">— FCFA</td>
                    </tr>
                </table>
                <div class="alert alert-info mt-2 mb-0">
                    <small>
                        <i class="fas fa-info-circle"></i> 
                        <strong>Règle de calcul :</strong> Part État = Part assuré × 2<br>
                        Total = Part assuré + Part État = Part assuré × 3
                    </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" onclick="window.print()">🖨️ Imprimer</button>
            </div>
        </div>
    </div>
</div>

<script>
// Remplir la modal avec les données du bouton
document.getElementById('detailModal').addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    
    document.getElementById('modal-membre').textContent = button.getAttribute('data-membre');
    document.getElementById('modal-salaire').textContent = button.getAttribute('data-salaire') + ' FCFA';
    document.getElementById('modal-taux').textContent = button.getAttribute('data-taux') + '%';
    document.getElementById('modal-part-assure').textContent = button.getAttribute('data-part-assure') + ' FCFA';
    document.getElementById('modal-part-etat').textContent = button.getAttribute('data-part-etat') + ' FCFA';
    document.getElementById('modal-total').textContent = button.getAttribute('data-total') + ' FCFA';
});

// Fonction pour changer le statut (Payé/Impayé)
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
            const badgeContainer = document.getElementById(`status-badge-${id}`);
            if(data.new_status === 'paye') {
                badgeContainer.innerHTML = '<span class="badge rounded-pill bg-success px-3" style="font-weight: 500;">Payé</span>';
            } else {
                badgeContainer.innerHTML = '<span class="badge rounded-pill bg-warning text-dark px-3" style="font-weight: 500;">Impayé</span>';
            }
        } else {
            alert("Erreur de mise à jour");
            location.reload();
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        location.reload();
    });
}
</script>