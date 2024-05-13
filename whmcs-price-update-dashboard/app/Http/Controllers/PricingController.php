<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function updatePrice(Request $request, $id)
    {
        $pricing = Pricing::find($id);
        $pricing->monthly = $request->input('new_monthly_price');
        $pricing->annually = $request->input('new_annual_price');

        $pricing->update();

        return redirect('/')->with('success','Product Prices Updated Successfully');

    }
}
