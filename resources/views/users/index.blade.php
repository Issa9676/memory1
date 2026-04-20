<!-- Filtre pour les adhérents -->
<div class="row mb-4">
    <div class="col-md-8">
        <form method="GET" action="{{ route('users.index') }}" class="row g-2">
            <div class="col-auto">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="🔍 Nom, matricule, email...">
            </div>
            <div class="col-auto">
                <select name="statut" class="form-select">
                    <option value="">Tous les statuts</option>
                    <option value="actif" {{ request('statut') == 'actif' ? 'selected' : '' }}>Actif</option>
                    <option value="inactif" {{ request('statut') == 'inactif' ? 'selected' : '' }}>Inactif</option>
                    <option value="suspendu" {{ request('statut') == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                </select>
            </div>
            
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filtrer</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Réinitialiser</a>
            </div>
        </form>
    </div>
</div>

<!-- Tableau des adhérents -->
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr class="black">
                                <th class="cell">N°</th>
                                <th class="cell">Matricule</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Fonction</th>
                                <th class="cell">Localité</th>
                                <th class="cell">Contact</th>
                                <th class="cell">Salaire base</th>
                                <th class="cell">Taux (%)</th>
                                <th class="cell">Statut</th>
                                <th class="cell">Date adhésion</th>
                                <th class="cell">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($membres as $membre)
                            <tr>
                                <td class="cell">{{ $loop->iteration }}</td>
                                <td class="cell">{{ $membre->matricule ?? '—' }}</td>
                                <td class="cell">{{ $membre->name }}</td>
                                <td class="cell">{{ $membre->fonction ?? '—' }}</td>
                                <td class="cell">{{ $membre->localite ?? '—' }}</td>
                                <td class="cell">{{ $membre->contact ?? '—' }}</td>
                                <td class="cell">{{ number_format($membre->salaire_base, 0, ',', ' ') }} FCFA</td>
                                <td class="cell" id="taux-{{ $membre->id }}">
    <span class="badge bg-primary">
        {{ $membre->taux_cotisation ?? $membre->calculerTauxCotisation() }}%
    </span>
</td>
                                <td class="cell">
                                    <span class="badge {{ $membre->statut == 'actif' ? 'bg-success' : ($membre->statut == 'inactif' ? 'bg-secondary' : 'bg-warning') }}">
                                        {{ ucfirst($membre->statut) }}
                                    </span>
                                </td>
                                <td class="cell">{{ $membre->created_at->format('d/m/Y') }}</td>
                                <td class="cell">
                                    <button type="button" class="btn btn-sm btn-info text-white" 
                                        onclick="remplirModaleEdit({{ json_encode($membre) }})" 
                                        data-bs-toggle="modal" data-bs-target="#modalEditionMembre">
                                        <i class="fas fa-edit"></i> Modifier
                                    </button>

                                    <button type="button" 
        class="btn btn-sm btn-warning text-white" 
        data-bs-toggle="modal" 
        data-bs-target="#modalBeneficiaires"
        data-user-id="{{ $membre->id }}"
        data-user-name="{{ $membre->name }}">
    <i class="fas fa-users"></i> Bénéficiaires
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
                            @empty
                            <tr>
                                <td colspan="11" class="text-center py-4">Aucun adhérent trouvé</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!--//table-responsive-->
            </div><!--//app-card-body-->		
        </div><!--//app-card-->
    </div><!--//tab-pane-->
</div>


<script>
// Fonction pour mettre à jour le taux dans le tableau principal
function mettreAJourTaux(userId, nouveauTaux) {
    const tauxElement = document.getElementById(`taux-${userId}`);
    if (tauxElement) {
        tauxElement.innerHTML = `<span class="badge bg-primary">${nouveauTaux}%</span>`;
    }
}

// Fonction pour mettre à jour le taux dans la modal après ajout/modification/suppression
function mettreAJourTauxDansModal(nouveauTaux) {
    const tauxModal = document.querySelector('#modalBeneficiaires .alert-info .badge');
    if (tauxModal) {
        tauxModal.textContent = nouveauTaux + '%';
    }
}

// Surchargez la fonction chargerBeneficiaires existante pour qu'elle mette à jour le taux du tableau
const originalChargerBeneficiaires = window.chargerBeneficiaires;
if (originalChargerBeneficiaires) {
    window.chargerBeneficiaires = function(userId) {
        fetch(`/users/${userId}/beneficiaires-data`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (typeof afficherBeneficiaires === 'function') {
                        afficherBeneficiaires(data.beneficiaires, data.taux);
                    }
                    // Met à jour le taux dans le tableau principal
                    mettreAJourTaux(userId, data.taux);
                }
            });
    };
}

// Si vous avez une fonction qui gère l'ajout, la modification ou la suppression,
// assurez-vous qu'elle appelle mettreAJourTaux après chaque opération

// Exemple pour le formulaire d'ajout (si ce n'est pas déjà fait)
document.addEventListener('DOMContentLoaded', function() {
    // Vérifier si le formulaire d'ajout existe
    const formAdd = document.getElementById('formAddBeneficiaire');
    if (formAdd) {
        formAdd.addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let userId = document.getElementById('beneficiaire_user_id').value;
            
            fetch(`/users/${userId}/beneficiaires`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Fermer la modal d'ajout
                    const modalAdd = bootstrap.Modal.getInstance(document.getElementById('modalAddBeneficiaire'));
                    if (modalAdd) modalAdd.hide();
                    
                    // Recharger les bénéficiaires
                    if (typeof chargerBeneficiaires === 'function') {
                        chargerBeneficiaires(userId);
                    }
                    
                    // Mettre à jour le taux dans le tableau principal
                    mettreAJourTaux(userId, data.nouveau_taux);
                } else {
                    alert('Erreur: ' + data.message);
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    }
});
</script>


<!-- MODAL BÉNÉFICIAIRES -->
<div class="modal fade" id="modalBeneficiaires" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">
                    <i class="fas fa-users"></i> Gestion des bénéficiaires
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="beneficiairesContent">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary"></div>
                        <p>Chargement...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AJOUT BÉNÉFICIAIRE -->
<div class="modal fade" id="modalAddBeneficiaire" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Ajouter un bénéficiaire</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="formAddBeneficiaire">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="beneficiaire_user_id">
                    <div class="mb-3">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Prénom</label>
                        <input type="text" name="prenom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Date naissance</label>
                        <input type="date" name="date_naissance" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Lien parenté</label>
                        <select name="lien_parente" class="form-select" required>
                            <option value="conjoint">Conjoint(e)</option>
                            <option value="enfant">Enfant</option>
                            <option value="parent">Parent</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL MODIFICATION BÉNÉFICIAIRE -->
<div class="modal fade" id="modalEditBeneficiaire" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Modifier un bénéficiaire</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="formEditBeneficiaire">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="edit_beneficiaire_id">
                    <div class="mb-3">
                        <label>Nom</label>
                        <input type="text" id="edit_nom" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Prénom</label>
                        <input type="text" id="edit_prenom" name="prenom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Date naissance</label>
                        <input type="date" id="edit_date_naissance" name="date_naissance" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Lien parenté</label>
                        <select id="edit_lien_parente" name="lien_parente" class="form-select" required>
                            <option value="conjoint">Conjoint(e)</option>
                            <option value="enfant">Enfant</option>
                            <option value="parent">Parent</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
let currentUserId = null;

// Ouvrir la modal et charger les bénéficiaires
document.getElementById('modalBeneficiaires').addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    currentUserId = button.getAttribute('data-user-id');
    const userName = button.getAttribute('data-user-name');
    
    document.querySelector('#modalBeneficiaires .modal-title').innerHTML = 
        '<i class="fas fa-users"></i> Bénéficiaires de : ' + userName;
    
    chargerBeneficiaires(currentUserId);
});

function chargerBeneficiaires(userId) {
    fetch(`/users/${userId}/beneficiaires-data`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let html = `
                    <div class="alert alert-info">
                        <strong>Taux de cotisation :</strong> 
                        <span class="badge bg-primary fs-6">${data.taux}%</span>
                        <br><small>1,5% assuré + 1% (conjoint) + 0,5% par enfant</small>
                    </div>
                    <div class="text-end mb-2">
                        <button class="btn btn-sm btn-success" onclick="ouvrirAjout()">
                            + Ajouter
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr><th>Nom</th><th>Prénom</th><th>Naissance</th><th>Lien</th><th>Actions</th></tr>
                            </thead>
                            <tbody>
                `;
                
                if (data.beneficiaires.length === 0) {
                    html += `<tr><td colspan="6" class="text-center">Aucun bénéficiaire</td></tr>`;
                } else {
                    data.beneficiaires.forEach(b => {
                        let badge = b.lien_parente === 'conjoint' ? '👫 Conjoint' : 
                                   (b.lien_parente === 'enfant' ? '👶 Enfant' : '👤 Autre');
                        html += `
                            <tr>
                                <td>${b.nom}</td><td>${b.prenom}</td>
                                <td>${b.date_naissance}</td><td>${badge}</td>
                                
                                <td>
                                    <button class="btn btn-sm btn-warning" onclick="ouvrirEdit(${b.id})">✏️</button>
                                    <button class="btn btn-sm btn-danger" onclick="supprimer(${b.id})">🗑️</button>
                                 </td>
                            </tr>
                        `;
                    });
                }
                
                html += `</tbody></table>`;
                document.getElementById('beneficiairesContent').innerHTML = html;
            }
        });
}

function ouvrirAjout() {
    document.getElementById('beneficiaire_user_id').value = currentUserId;
    document.getElementById('formAddBeneficiaire').reset();
    new bootstrap.Modal(document.getElementById('modalAddBeneficiaire')).show();
}

document.getElementById('formAddBeneficiaire').addEventListener('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    
    fetch(`/users/${currentUserId}/beneficiaires`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('modalAddBeneficiaire')).hide();
            chargerBeneficiaires(currentUserId);
            mettreAJourTaux(data.nouveau_taux);
        } else alert('Erreur');
    });
});

function ouvrirEdit(id) {
    fetch(`/beneficiaires/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('edit_beneficiaire_id').value = data.beneficiaire.id;
            document.getElementById('edit_nom').value = data.beneficiaire.nom;
            document.getElementById('edit_prenom').value = data.beneficiaire.prenom;
            document.getElementById('edit_date_naissance').value = data.beneficiaire.date_naissance;
            document.getElementById('edit_lien_parente').value = data.beneficiaire.lien_parente;
            new bootstrap.Modal(document.getElementById('modalEditBeneficiaire')).show();
        });
}

document.getElementById('formEditBeneficiaire').addEventListener('submit', function(e) {
    e.preventDefault();
    let id = document.getElementById('edit_beneficiaire_id').value;
    let formData = new FormData(this);
    
    fetch(`/beneficiaires/${id}`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json', 'X-HTTP-Method-Override': 'PUT' },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('modalEditBeneficiaire')).hide();
            chargerBeneficiaires(currentUserId);
            mettreAJourTaux(data.nouveau_taux);
        }
    });
});

function supprimer(id) {
    if (confirm('Supprimer ce bénéficiaire ?')) {
        fetch(`/beneficiaires/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) chargerBeneficiaires(currentUserId);
        });
    }
}

function mettreAJourTaux(taux) {
    let tauxSpan = document.querySelector(`#taux-${currentUserId}`);
    if (tauxSpan) tauxSpan.innerHTML = `<span class="badge bg-primary">${taux}%</span>`;
}
</script>
