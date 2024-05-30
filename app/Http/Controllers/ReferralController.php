<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;

class ReferralController extends Controller
{
    //

    function index()
    {
        $users_data_asc = Referral::all();
        $users_data_desc = Referral::orderBy('user_id', 'DESC')->get();

        // dd($ReferralDesc);
        // return view('/contact', ['contact' => $contact]);
        return view('pages.referral', ['users_data' => $users_data_asc]);
        // return view('pages.referral');
    }

    public function store(Request $request)
    {
        // check if refer is null than add amount + 0 in wallet
        // check if refer is not null 
        // than find refer user wallet amount 
        // refer bonus 10% of refer wallet

        $username = $request->name;
        $refer_id = $request->refer_id;
        $amount = $request->amount;
        $referral_bonus = 0;
        $wallet = $amount + $referral_bonus;
        // echo $refer_id;


        if ($refer_id) {
            $referred_user = Referral::find($refer_id);
            $referred_user_wallet = $referred_user->wallet;
            $referral_bonus = $referred_user_wallet * 0.1;
            $wallet = $amount + $referral_bonus;

            // echo ' referred user id :' . $refer_id . '<br>';
            // echo ' referred user wallet :' . $referred_user_wallet;
            // dd($referred_user);
        }
        // echo ' referred user bonus :' . $referral_bonus;
        // echo ' referred final wallet :' . $wallet;

        Referral::create([
            'name' => $username,
            'refer_id' => $refer_id,
            'amount' => $amount,
            'wallet' => $wallet,
        ]);

        return redirect()->back();
    }
}
