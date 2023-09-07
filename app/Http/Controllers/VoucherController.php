<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use PDF;

class VoucherController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     return view('pages.voucher.vouchers');
    // }


    public function index()
    {
        $vouchers = Voucher::all();
        return view('pages.voucher.vouchers', ['vouchers' => $vouchers]);
    }


    public function new_voucher()
    {
        return view('pages.voucher.new_voucher');
    }

    // public function print_voucher()
    // {
    //     return view('pages.voucher.print_voucher');
    // }

//     public function print_voucher($id)
// {
//     $voucher = Voucher::find($id);
//     return view('pages.voucher.print_voucher', ['voucher' => $voucher]);
// }
  

// Inside a controller method or a route closure



public function print_voucher($id)
{
    $voucher = Voucher::find($id);
     // Manually decode the JSON
     $voucher->payment_description = json_decode($voucher->payment_description, true);
     $voucher->payment_rate = json_decode($voucher->payment_rate, true);
     $voucher->payment_amount = json_decode($voucher->payment_amount, true);
 
    // Load the view with options
    $pdf = PDF::loadView('pages.voucher.print_voucher', ['voucher' => $voucher])->setPaper('Letter', 'portrait');

    return $pdf->stream('invoice.pdf');
}








    public function upload_voucher(Request $request){
        $payment_descriptions = $request->input('payment_description');
        $payment_rates = $request->input('payment_rate');
        $payment_amount = $request->input('payment_amount');

        // Convert arrays to JSON
    $payment_descriptions_json = json_encode($payment_descriptions);
    $payment_rates_json = json_encode($payment_rates);
    $payment_amount_json = json_encode($payment_amount);

        
        $voucher = new Voucher();
        $voucher->payee = $request->payee;
        $voucher->station = $request->station;
        $voucher->head = $request->head;
        $voucher->subhead = $request->subhead;
        $voucher->item = $request->item;
        $voucher->head_description = $request->head_description;
        $voucher->subhead_description = $request->subhead_description;
        $voucher->payee_address = $request->payee_address;
        $voucher->payment_date = $request->payment_date;
        // $voucher->payment_item = $request->payment_item;
        $voucher->payment_amount_total = $request->payment_amount_total;
        $voucher->payable_at = $request->payable_at;
        
        $voucher->voucher_type = $request->voucher_type;
        $voucher->voucher_owner = $request->voucher_owner;
        $voucher->item_description = $request->item_description;
      
        $voucher->payment_description = $payment_descriptions_json;
        $voucher->payment_rate = $payment_rates_json;
        $voucher->payment_amount = $payment_amount_json;
   
        
        $voucher->save();
    }
}
