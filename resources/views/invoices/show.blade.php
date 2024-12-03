@extends('layouts.app')



@section('content')
    <h1>Détails de la Facture #{{ $invoice->id }}</h1>
    
    <div class="mb-3">
        <p><strong>Date de création:</strong> {{ $invoice->created_at }}</p>
        <p><strong>Client:</strong> {{ $invoice->client_name ?? 'Non spécifié' }}</p>
        <p><strong>Total:</strong> {{ $invoice->amount }}</p>
    </div>

    <a href="{{ route('invoice.index') }}" class="btn btn-primary">Retour à la liste</a>
@endsection