@extends('layout')

@section('content')

<div id="background-board" style="background-color:darkgrey; padding:2em;">
    <div id="page" class="container is-fluid" style="background-color:#ffffff; padding:2.5em;">

        <section class="company-details">
            <header>
                <div class="columns is-desktop">
                    <div class='column is-three-fifths '>
                        <img src="https://www.bookmarks.design/media/image/hatchful.jpg" width="150px" alt="">
                    </div>
                    <div class="column company_details">
                        <p>
                            <strong>
                                Company Name SA
                            </strong>
                        </p>
                        <strong>
                            001453477/1<br>
                            LU28498304293<br>
                            website.eu<br>
                            sales@website.eu
                        </strong>
                    </div>
                    <div class="column company_address">
                        <strong>
                            45, rue de strassen<br>
                            L-4499 strassen<br>
                            Luxembourg
                        </strong>
                    </div>
                </div>
            </header>

        </section>

        <hr>

        <section class="invoice-details">
            <div class="columns">

                <div class="column column is-four-fifths" style="text-align:left">
                    <div>
                        <strong>CLIENT:</strong>
                    </div>
                    <p>{{ $invoice->client->first_name }} {{ $invoice->client->last_name }}</p>
                    <p>{{ $invoice->client->address }}</p>
                    <p>{{ $invoice->client->city }}</p>
                    <p>{{ $invoice->client->zip_code }}</p>
                    <p>{{ $invoice->client->phone_nr }}</p>
                    <p>{{ $invoice->client->email }}</p>
                </div>

                <div class="column">
                    <p>
                        <strong>Invoice Nr:</strong>
                        {{ $invoice->number }}
                    </p>
                    <p>
                        <strong>DATE:</strong>
                        {{ $invoice->start_date }}
                    </p>
                    <p>
                        <strong>SATUS:</strong>
                        {{ $invoice->status->status_name }}
                    </p>
                </div>

            </div>
        </section>

        <hr>

        <section class="table">
            <table class="table invoice-items is-bordered is-striped is-hoverable is-fullwidth"
                style='margin-bottom:0;'>
                <thead>
                    <tr>
                        <th>ITEM</th>
                        <th>Description</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                        <th>LINE TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->items as $item)
                    <tr>
                        <td>{{ $item->sku }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}€</td>
                        <td>{{ $item->line_total }} €</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="table-empty" colspan="3" style="border:none;"></td>
                        <td class="table-label">
                            <strong>Total</strong>
                        </td>
                        <td class="table-amount">{{ $invoice->total }} €</td>
                    </tr>
                </tfoot>
            </table>
        </section>

    </div>
</div>

@endsection