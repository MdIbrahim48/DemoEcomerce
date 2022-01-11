<?php

namespace App\Http\Controllers\Frontend;

use App\DealOfTheDay;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DealsOfTheDayController extends Controller
{
    public function index(){
        $date = Carbon::now();
        $dealsOfTheDays = DealOfTheDay::with('product')->where('date','>=',$date)->where('status','1')->take('4')->get();
        return view('frontend.shop.index',[
            'dealsOfTheDays' => $dealsOfTheDays,
        ]);
    }

    public function dealsOfTheDay(){
        $dealsOfTheDays = DealOfTheDay::with('product')->where('status','1')->paginate(10);
        return view('frontend.deals_ofthe_day.index',[
            'dealsOfTheDays' => $dealsOfTheDays,
        ]);
    }

}
