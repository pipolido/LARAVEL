<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::all();
        return view('invoices.index',compact('invoices'));
    }

    public function create(){
        return view('invoices.create');
    }

    public function store( Request $request){
        // dd($request->name);
        $validate = $request->validate([
            'client_name' =>'required|max:255',
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,canceled',
        ]);

        invoice::create($validate);
        return redirect()->route('invoice.index')->with('succes','Facture cree avec succes.');
        
    }

    public function edit($id){
        $invoices = Invoice::findOrFail($id);
        return view('invoices.edit' , compact('invoices'));
    }

    public function update( Request $request,$id){
        
        $invoice = Invoice::findOrFail($id);
        $validate = $request->validate([
            'client_name' =>'required|max:255',
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,canceled',
        ]);

       $invoice->update($validate);
        return redirect()->route('invoice.index')->with('succes','Facture mise a jour avec succes.');
        
    }

    public function destroy($id){
        $invoice = Invoice::findOrFail($id);
        $invoice -> delete();
        return redirect()->route('invoice.index')->with('succes','Facture supprimer avec succes.');
    }

    public function show($id)
{
    $invoice = Invoice::findOrFail($id);
    return view('invoices.show', compact('invoice'));
}

}
