@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Demande de remboursement</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('remboursements.store') }}">
        @csrf

        <div class="mb-3">
            <label>Motif</label>
            <input type="text" name="motif" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Montant</label>
            <input type="number" name="montant_rembourse" class="form-control" required>
        </div>

        <button class="btn btn-primary">Envoyer la demande</button>
    </form>
</div>
@endsection
