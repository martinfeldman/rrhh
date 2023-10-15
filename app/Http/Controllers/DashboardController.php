<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    

    function index() 
    {

        $currentHour = date('H');

        if ($currentHour >= 5 && $currentHour < 12) {
            $greeting = "Buenos días";
        } elseif ($currentHour >= 12 && $currentHour < 19) {
            $greeting = "Buenas tardes";
        } else {
            $greeting = "Buenas noches";
        }
    
        return view('dashboard.index')->with(compact(
            'greeting'
        ));

    }
}
