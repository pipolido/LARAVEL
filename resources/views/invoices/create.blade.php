@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="my-4">Créer une Facture</h1>
    <form action="{{ route('invoice.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="form-group mb-3">
            <label for="client_name" class="form-label">Nom du Client :</label>
            <input type="text" id="client_name" name="client_name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="invoice_date" class="form-label">Date de Facture :</label>
            <input type="date" id="invoice_date" name="invoice_date" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="amount" class="form-label">Montant :</label>
            <input type="number" id="amount" name="amount" class="form-control" step="0.01" required>
        </div>

        <div class="form-group mb-4">
            <label for="status" class="form-label">Statut :</label>
            <select id="status" name="status" class="form-select">
                <option value="unpaid">Non Payé</option>
                <option value="paid">Payé</option>
                <option value="canceled">Annulé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('invoice.index')}}" class="btn btn-primary">Retour</a>

    </form>
</div>

@endsection
