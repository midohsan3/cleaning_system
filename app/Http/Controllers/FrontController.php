<?php

namespace App\Http\Controllers;

use App\Models\ServiceMdl;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $services = ServiceMdl::where('status', 1)->get();
        return view('front.main', compact('services'));
        //return view('auth.login');
    }

    /*
    ==============
    ==============
    */
    public function houseCare()
    {
        return view('front.houseCare');
    }
    /*
    ==============
    ==============
    */
    public function maidTraining()
    {
        return view('front.maidTraining');
    }
    /*
    ==============
    ==============
    */
    public function eventHealth()
    {
        return view('front.houseCare');
    }
    /*
    ==============
    ==============
    */
    public function deepCleaning()
    {
        return view('front.deepCleaning');
    }
    /*
    ==============
    ==============
    */
    public function dogServant()
    {
        return view('front.houseCare');
    }
    /*
    ==============
    ==============
    */
    public function hotelChildCare()
    {
        return view('front.hotelchildren');
    }
    /*
    ==============
    ==============
    */
    public function officeBoy()
    {
        return view('front.officeBoy');
    }
    /*
    ==============
    ==============
    */
    public function officeCare()
    {
        return view('front.officecare');
    }
    /*
    ==============
    ==============
    */
    public function about()
    {
        return view('front.about');
    }
    /*
    ==============
    ==============
    */
    public function contact()
    {
        return view('front.contact');
    }
    /*
    ==============
    ==============
    */
}