<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $warehouse_name }} - Invoice - {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            font-size: 12px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .header .invoice-info {
            text-align: right;
        }

        .section {
            margin: 10px 0;
        }

        .section h4 {
            font-size: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
            color: #555;
        }

        .details {
            line-height: 1.4;
            margin-bottom: 20px;
        }

        .details p {
            margin: 4px 0;
        }

        .supplier-client-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .divider {
            display: inline-block;
            width: 100%;
            border-bottom: 2px solid #333;
            margin: 10px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table tfoot td {
            font-weight: bold;
            text-align: right;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .invoice-details {
            margin-left: auto;
            margin-right: 0;
            width: 30%;
            border-collapse: collapse;
        }

        .invoice-details th, .invoice-details td {
            padding: 4px 0px;
            text-align: right;
        }

        .invoice-details th {
            font-weight: bold;
        }

        .invoice-details td {
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div>
                <div class="supplier-client-title">{{ __('Supplier') }}</div>
                <div class="details">
                    <p><strong>{{ __('Name') }}:</strong> {{ $supply->supplier->supplier_name }}</p>
                    <p><strong>{{ __('Address') }}:</strong> {{ $supply->supplier->supplier_address }}</p>
                    <p><strong>{{ __('Email') }}:</strong> {{ $supply->supplier->supplier_email }}</p>
                    <p><strong>{{ __('Phone') }}:</strong> {{ $supply->supplier->supplier_phone }}</p>
                </div>

                <div class="supplier-client-title">{{ __('Client') }}</div>
                <div class="details">
                    <p><strong>{{ __('Name') }}:</strong> {{ $supply->warehouse->warehouse_name }}</p>
                    <p><strong>{{ __('Address') }}:</strong> {{ $supply->warehouse->warehouse_address }}</p>
                    <p><strong>{{ __('Email') }}:</strong> {{ $supply->warehouse->warehouse_email }}</p>
                    <p><strong>{{ __('Phone') }}:</strong> {{ $supply->warehouse->warehouse_phone }}</p>
                    <p><strong>{{ __('Director') }}:</strong> {{ $supply->warehouse->manager->username }}</p>
                </div>
            </div>
            <div class="invoice-info">
                <div class="supplier-client-title">{{ __('Invoice') }}</div>
                <table class="invoice-details">
                    <tr>
                        <th>{{ __('Number') }}:</th>
                        <td>{{ $invoice->invoice_number }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Date') }}:</th>
                        <td>{{ $invoice->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Status') }}:</th>
                        <td>{{ $invoice->invoice_status === \App\Models\Invoice::INVOICE_STATUS_PAID ? __('Settled') : __('Unpaid') }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('Settled on') }}:</th>
                        <td>{{ $invoice->updated_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Invoice Items -->
        <div class="section">
            <h4>{{ __('Invoice Items') }}</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Product ID') }}</th>
                        <th>{{ __('Product Name') }}</th>
                        <th>{{ __('Quantity') }}</th>
                        <th>{{ __('Unit Price (€)') }}</th>
                        <th>{{ __('Total (€)') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supply->supplyLines as $line)
                        <tr>
                            <td>{{ $line->product->id }}</td>
                            <td>{{ $line->product->product_name }}</td>
                            <td>{{ $line->quantity_supplied }}</td>
                            <td>{{ number_format($line->unit_price, 2, ',', ' ') }}</td>
                            <td>{{ number_format($line->unit_price * $line->quantity_supplied, 2, ',', ' ') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align:right;">{{ __('Total Amount (€)') }}</td>
                        <td>{{ number_format($total_amount, 2, ',', ' ') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>{{ __('Thank you for your business!') }}</p>
            <p>{{ __('This invoice was generated electronically and is valid without a signature.') }}</p>
        </div>
    </div>
</body>
</html>
