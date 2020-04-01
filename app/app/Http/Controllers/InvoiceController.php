<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Item;
use App\Client;
use App\Status;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::join('clients', 'invoices.id', '=', 'clients.id')
            ->join('statuses', 'invoices.invoice_status_id', '=', 'statuses.id')
            ->select('invoices.*', 'clients.first_name', 'clients.last_name', 'statuses.status_name')
            ->orderBy('number', 'desc')
            ->get();

        return view('invoices.index', [
            'invoices' => $invoices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('hello');
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Invoice::create($this->validateInvoice);

        return redirect('/invoices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show', [
            'invoice' => $invoice,
            'client' => $invoice->client,
            'items' => $invoice->items,
            'status' => $invoice->status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update($this->validateInvoice);

        return redirect($invoice->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    protected function validateInvoice() {

        return request()->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'address' => 'required|max:255',
            'zip_code' => 'required|numeric|max:4',
            'phone_nr' => 'required|numeric|max:15',
            'email' => 'required|email',
            'start_date' => 'required|date_format:Y-m-d',
            'due_date' => 'required|date_format:Y-m-d',
            'number' => 'required',
            'status_name' => 'required',
            'sku' => 'required|max:10',
            'description' => 'required|max:255',
            'quantity' => 'required|numeric|min:1'
        ]);
    }
}
