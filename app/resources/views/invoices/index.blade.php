@extends('layout')

@section('content')

<section class="section">
    <div class="table-container" style="text-align:center">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th></th>
                    <th>INVOICE NR</th>
                    <th>CLIENT</th>
                    <th>DATE</th>
                    <th>AMOUNT</th>
                    <th>SATUS</th>
                </tr>
            <tbody>
                @foreach ($invoices as $invoice)
                <tr>
                    <th>
                        <a href='/invoices/{{ $invoice->id }}/edit'>EDIT</a> |
                        <a href='/invoices/{{ $invoice->id }}'>VIEW</a>
                    </th>
                    <td>{{ $invoice->number }}</td>
                    <td>{{ $invoice->first_name }} {{ $invoice->last_name }}</td>
                    <td>{{ $invoice->start_date }}</td>
                    <td>{{ $invoice->total }}€</td>
                    <td>{{ $invoice->status_name }}</td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>
</section>

@endsection