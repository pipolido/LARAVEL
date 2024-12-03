@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="my-4">Modifier une Facture</h1>
    <form action="{{ route('invoice.update', $invoices) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="client_name" class="form-label">Nom du client :</label>
            <input type="text" id="client_name" name="client_name" class="form-control" value="{{ $invoices->client_name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="invoice_date" class="form-label">Date :</label>
            <input type="date" id="invoice_date" name="invoice_date" class="form-control" value="{{ $invoices->invoice_date }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="amount" class="form-label">Montant :</label>
            <input type="number" id="amount" name="amount" class="form-control" value="{{ $invoices->amount }}" step="0.01" required>
        </div>

        <div class="form-group mb-3">
            <label for="status" class="form-label">Statut :</label>
            <select id="status" name="status" class="form-select">
                <option value="unpaid" {{ $invoices->status == 'unpaid' ? 'selected' : '' }}>Non Payé</option>
                <option value="paid" {{ $invoices->status == 'paid' ? 'selected' : '' }}>Payé</option>
                <option value="canceled" {{ $invoices->status == 'canceled' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

@endsection
