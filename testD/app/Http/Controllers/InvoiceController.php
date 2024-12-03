<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function store(Request $request){
        
        $request->validate([
            'number' => 'required|unique:invoices',
            'customer_name' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $invoice = Invoice::create($request->all());

        return response()->json($invoice, 201);
    }

    public function index(){

        return response()->json(Invoice::all(), 200);

    }

    public function search (Request $request){

        $request->validate([
            'customer name' => 'nullable|string', 
            'date' => 'nullable|date',
        ]);

        $query = Invoice:: query();

        if ($request->filled('customer_name')) {
            $query->where('customer_name', 'like', '%' . $request->customer_name . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        return response()->json ($query->get(), 200);
    }

    public function markAsPaid($id){

        $invoice = Invoice::find($id);

        if(!$invoice){
            return response()->json(['error' => 'Invoice not found'], 404);
        }

        $invoice->is_paid = true;
        $invoice->payment_date = now();
        $invoice->save();

        return response()->json(['message' => 'Invoice marked as paid', 'invoice' => $invoice], 200);

    }

}