<html>
<head>
<title>Voucher</title>
<style type="text/css">

body { font-family: Arial; font-size: 20.3px }
.pos { position: absolute; z-index: 0; left: 0px; top: 0px }
table{ font-weight:normal; font-family:Arial; font-size:12.9px}
p{ font-weight:normal; font-family:Arial; font-size:12.9px}
address{ font-weight:normal; font-family:Arial; font-size:12.9px}
</style>
</head>
<body>
    <p style="font-weight:bold; font-family:Arial !important; font-size:28px; color:#000000; text-align: center; margin-bottom: 0;">FEDERAL CAPITAL TERRITORY ADMINISTRATION</p>  
    <p style="font-family:Arial !important; font-size:24.2px; color:#000000; text-align: center; margin-top: 0;">HEALTH AND HUMAN SERVICES SECRETARIAT</p>  
    <p style="font-weight:bold; font-family:Arial; font-size:19.7px; color:#000000; text-align: center; margin-top: 0;">PAYMENT VOUCHER</p>
    <p style="font-family:Arial Narrow; font-size:18.8px; color:#000000; margin-top: 0;" >SOML</p>
<table border="1" style="width: 100%; border-collapse: collapse">
    <tr>
        <td >1. Posted Cash Book</td>
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

<table border="1" style="border-collapse: collapse; width: 100%">
    <thead>
        <th>Date</th>
        <th>Description</th>
        <th>Rate</th>
        <th>N</th>
        <th>K</th>
    </thead>
    @for ($i = 0; $i < (is_array($voucher->payment_description) ? count($voucher->payment_description) : 0); $i++)
    @for ($i = 0; $i < (is_array($voucher->payment_rate) ? count($voucher->payment_rate) : 0); $i++)
    <tr>
        <td></td>
        <td>{{$voucher->payment_description[$i] }}</td>
        <td>{{$voucher->payment_rate[$i] }}</td>
        <td></td>
        <td></td>
    </tr>
    @endfor
    @endfor
</table>
</body>
</html>
