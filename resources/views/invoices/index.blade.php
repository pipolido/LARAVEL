@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="my-4">Liste des Factures</h1>
    <a href="{{ route('invoice.create') }}" class="btn btn-primary mb-3">Créer une Nouvelle Facture</a>
    
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Date</th>
                <th>Montant</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->client_name }}</td>
                <td>{{ $invoice->invoice_date }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->status }}</td>
                <td>
                
                    <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-info btn-sm">view</a>    
                    <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
