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
 
    // Load the view with options
    $pdf = PDF::loadView('pages.voucher.print_voucher', ['voucher' => $voucher])->setPaper('Letter', 'portrait');

    return $pdf->stream('invoice.pdf');
}








    public function upload_voucher(Request $request){
        $payment_descriptions = $request->input('payment_description');
        $payment_rates = $request->input('payment_rate');

        // Convert arrays to JSON
    $payment_descriptions_json = json_encode($payment_descriptions);
    $payment_rates_json = json_encode($payment_rates);

        
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
        $voucher->payment_item = $request->payment_item;
        $voucher->payment_rate = $request->payment_rate;
        $voucher->payment_amount = $request->payment_amount;
        $voucher->payable_at = $request->payable_at;
      
        $voucher->payment_description = $payment_descriptions_json;
        $voucher->payment_rate = $payment_rates_json;
   
        
        $voucher->save();
    }
}
