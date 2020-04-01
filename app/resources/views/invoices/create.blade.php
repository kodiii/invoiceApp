@extends('layout')

@section('content')

<section class="section inv-page">
    <div id="page" class="container">

        <h1 class='heading has-text-weight-bold is-size-4' style="padding:10px 0;">New Invoice</h1>

        <form method="POST" action="/invoices">
            @csrf

            <div class="columns">
                <div class="column is-5">
                    <div class="columns is-mobile">
                        <div class="column is-3">
                            <div class="field">
                                <div class="control">
                                    <strong>CLIENT DETAILS:</strong>
                                </div>
                            </div>
                        </div>
                        <div class="column is-5">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('first_name') is_danger @enderror" type="text"
                                        placeholder="first name" id="first_name" name="first_name"
                                        value="{{ old('first_name') }}">

                                    @error('first_name')
                                    <p class="help is-danger">{{ $error->first('first_name') }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('last_name') is-danger @enderror" type="text"
                                        placeholder="last name" id="last_name" name="last_name"
                                        value="{{ old('last_name') }}">

                                    @error('last_name')
                                    <p class="help is-danger">{{ $error->first('last_name') }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('address') is-danger @enderror" type="text"
                                        placeholder="address" id="address" name="address" value="{{ old('address') }}">

                                    @error('address')
                                    <p class="help is-danger">{{ $error->first('address_name') }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('zip_code') is-danger @enderror" type="number"
                                        placeholder="zip code" id="zip_code" name="zip_code"
                                        value="{{ old('zip_code') }}">

                                    @error('zip_code')
                                    <p class="help is-danger">{{ $error->first('zip_code') }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('phone_nr') is-danger @enderror" type="number" placeholder="phone nr" id="phone_nr"
                                        name="phone_nr" value="{{ old('phone_nr') }}">

                                    @error('phone_nr')
                                    <p class="help is-danger">{{ $error->first('phone_nr') }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('email') is-danger @enderror" type="email"
                                        placeholder="email" id="email" name="email" value="{{ old('email') }}">

                                    @error('email')
                                    <p class="help is-danger">{{ $error->first('email') }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="columns is-mobile">
                        <div class="column is-4">
                            <div>
                                <div class="field">
                                    <div class="control">
                                        <strong>ISSUED DATE:</strong>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="field">
                                    <div class="control">
                                        <strong>DUE DATE:</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-8">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('start_date') is-danger @enderror" type="date" placeholder="" id="invoice_date"
                                        name="start_date" value="{{ old('start_date') }}">

                                    @error('start_date')
                                    <p class="help is-danger">{{ $error->first('start_date') }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('due_date') is-danger @enderror" type="date" placeholder=""
                                        id="due_date" name="due_date" value="{{ old('due_date') }}">

                                    @error('due_date')
                                    <p class="help is-danger">{{ $error->first('due_date') }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="columns is-mobile">
                        <div class="column is-4">
                            <div>
                                <div class="field">
                                    <div class="control">
                                        <strong>INVOICE NR:</strong>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="field">
                                    <div class="control">
                                        <strong>STATUS:</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-8">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('number') is-danger @enderror" type="number" placeholder=""
                                        id="invoice_nr" name="invoice_nr" value="{{ old('number') }}">

                                    @error('number')
                                    <p class="help is-danger">{{ $error->first('number') }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <div class="select">
                                        <select>
                                            <option>Select Status</option>
                                            @foreach ('statuses' as 'status_name')
                                            <option value="{{ 'status_name' }}">{{ 'status_name' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <table class="table invoice-items is-bordered is-striped is-hoverable is-fullwidth"
                style="margin-bottom:0;">
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
                    <tr>
                        <td>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('sku') is-danger @enderror" type="text" placeholder=""
                                        id="sku" name="sku" value="{{ old('sku') }}">

                                    @error('sku')
                                    <p class="help is-danger">{{ $error->first('sku') }}</p>
                                    @enderror
                                </div>
                            </div>                          
                        </td>
                        <td>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('description') is-danger @enderror" type="text" placeholder=""
                                        id="description" name="description" value="{{ old('description') }}">

                                    @error('description')
                                    <p class="help is-danger">{{ $error->first('description') }}</p>
                                    @enderror
                                </div>
                            </div>                           
                        </td>
                        <td>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('quantity') is-danger @enderror" type="number" placeholder=""
                                        id="quantity" name="quantity" value="{{ old('quantity') }}">

                                    @error('quantity')
                                    <p class="help is-danger">{{ $error->first('quantity') }}</p>
                                    @enderror
                                </div>
                            </div>                           
                        </td>
                        <td>
                            <div class="field">
                                <div class="control">
                                    <input class="input is-primary @error('price') is-danger @enderror" type="number" placeholder=""
                                        id="price" name="price" value="{{ old('price') }}">

                                    @error('price')
                                    <p class="help is-danger">{{ $error->first('price') }} €</p>
                                    @enderror
                                </div>
                            </div>                           
                        </td>
                        <td>
                            {{ $invoice->line_total }}                           
                        </td>
                    </tr>
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

            <div class="field is-grouped is-pulled-right" style="padding: 15px 0;">
                <div class="control">
                    <button class="button is-link" type="submit">CREATE</button>
                </div>
            </div>
        </form>

    </div>
</section>
@endsection