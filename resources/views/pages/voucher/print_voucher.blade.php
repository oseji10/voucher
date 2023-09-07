{{-- @use Rmunate\Utilities\SpellNumber; --}}
<html>
<head>
<title>Voucher</title>
<style type="text/css">

body { font-family: Arial; font-size: 20.3px }
.pos { position: absolute; z-index: 0; left: 0px; top: 0px }
table{ font-weight:normal; font-family:Arial; font-size:12.9px; text-align: left}
th{ text-align: left}
p{ font-weight:normal; font-family:Arial; font-size:12.9px}
address{ font-weight:normal; font-family:Arial; font-size:12.9px}
</style>
</head>
<body>
    <p style="font-weight:bold; font-family:Arial !important; font-size:28px; color:#000000; text-align: center; margin-bottom: 0;">FEDERAL CAPITAL TERRITORY ADMINISTRATION</p>  
    <p style="font-family:Arial !important; font-size:24.2px; color:#000000; text-align: center; margin-top: 0; margin-bottom: 0;">HEALTH AND HUMAN SERVICES SECRETARIAT</p>  
    {{-- <p style="font-weight:bold; font-family:Arial; font-size:19.7px; color:#000000; text-align: center; margin-top: 0;">PAYMENT VOUCHER</p> --}}
    {{-- <p style="font-family:Arial Narrow; font-size:18.8px; color:#000000; margin-top: 0;" >{{ $voucher->voucher_owner }}</p> --}}

    <table  style="width: 100%; border-collapse: collapse; margin-top: 0;">
        <tr>
            <td >{{ $voucher->voucher_owner }}</td>
            <td style="font-weight:bold; font-family:Arial; font-size:19.7px; color:#000000; text-align: center; ">PAYMENT VOUCHER</td>
            <td >NO: {{$voucher->id}}</td>
        </tr>
    </table>
<br/>
    <table border="1" style="width: 100%; border-collapse: collapse">
    <tr>
        <td >1. Posted Cash Book</td> color:#000000; margin-top: 0;" ></p>
        <td style="font-weight: bolder">Station</td>
        <td style="font-weight: bolder">Month</td>
        <td style="font-weight: bolder">Year</td>
        <td style="font-weight: bolder">Amount</td>
    </tr>

    <tr>
        <td>Page................. No................</td>
        <td>{{ $voucher->station }}</td>
        <td>{{ \Carbon\Carbon::parse($voucher->payment_date)->format('F') }}</td>
        <td>{{ \Carbon\Carbon::parse($voucher->payment_date)->format('Y') }}</td>

        <td></td>
    </tr>

    <tr>
        <td>By.................</td>
        <td><b>Head</b><br/>{{$voucher->head}}</td>
        <td colspan="3"><b>Description:</b> {{$voucher->head_description}}</td>
        {{-- <td>Year</td>
        <td>Amount</td> --}}
    </tr>

    <tr>
        <td>2. Posted in the ledger</td>
        <td><b>S/Head</b><br/>{{$voucher->subhead}}</td>
        <td colspan="3"><b>Description:</b> {{$voucher->subhead_description}}</td>
        {{-- <td>Year</td>
        <td>Amount</td> --}}
    </tr>

    <tr>
        <td>By................</td>
        <td><b>Item</b><br/>{{$voucher->item}}</td>
        <td colspan="3"><b>Description:</b> {{$voucher->item_description ?? ''}}</td>
        {{-- <td>Year</td>
        <td>Amount</td> --}}
    </tr>

</table>

<p style="margin-bottom: 0;">Payee: {{$voucher->payee}}</p>
<p style="margin-top: 0;">Address: {{$voucher->payee_address}}</p>

<table border="1" style="border-collapse: collapse; width: 100%; content-align:left">
    <thead>
        <th>Date</th>
        <th>Description</th>
        <th>Rate</th>
        <th>N K</th>
        {{-- <th>K</th> --}}
        <th>Sub Total</th>
    </thead>
    @php
    $grandTotal = 0; // Initialize the grand total variable
@endphp

@foreach ($voucher->payment_description as $index => $description)
    <tr>
        <td>{{ $voucher->payment_date }}</td>
        <td>{{ $description }}</td>
        <td>{{ $voucher->payment_rate[$index] }}</td>
        <td>{{ number_format(floatval($voucher->payment_amount[$index]), 2) }}</td>
        {{-- <td>{{ is_int(floatval($voucher->payment_amount[$index])) ? '' : number_format(floatval($voucher->payment_amount[$index]) - intval($voucher->payment_amount[$index]), 2) }}</td> --}}
        <td>
            @php
                $subtotal = floatval($voucher->payment_rate[$index]) * floatval($voucher->payment_amount[$index]);
                $grandTotal += $subtotal;
            @endphp
            {{ number_format($subtotal, 2) }}
        </td>
    </tr>
@endforeach

@if ($voucher->voucher_type === 'Company')
@php
    $tax = $grandTotal * 0.05;
    $vat = $grandTotal * 0.075;
    $stampDuty = $grandTotal * 0.01;
    $grandTotal -= ($tax + $vat + $stampDuty);
@endphp
    <tr>
        <td></td>
        <td style="text-align: left; font-weight: bold;">
            Less 5% tax: N{{number_format($tax ,2)}}<br/>
            Less 7.5% VAT: N{{number_format($vat ,2)}}<br/>
            Lass 1% Stamp Duty: N{{number_format($stampDuty ,2)}}
        </td>
        <td></td>
        <td></td>
        <td></td>
        {{-- {{\Rmunate\Utilities\SpellNumber::value($grandTotal)->toLetters();}} --}}
    </tr>
@endif

<tr>
    <td colspan="3" style="text-align: left; font-weight: bold;">Checked and passed for payment (Insert amount in words): </td>
    <td style="text-align: right; font-weight: bold;">Total:</td>
    <td>{{ number_format($grandTotal, 2) }}</td>
    {{-- {{\Rmunate\Utilities\SpellNumber::value($grandTotal)->toLetters();}} --}}
</tr>
</table>
<p style="text-align: center; font-weight: bolder;">CERTIFICATE</p>
</body>
</html>
