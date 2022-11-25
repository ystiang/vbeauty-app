<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $packages = Package::all();
        return Inertia::render(
            'Calculation',
        [
            'packages' => $packages
        ]
        );
    }
    /**
     * Store a newly created resource.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)     {
    try {    
        Package::create([            
            'package_name' => $request->package_name,
            'treatment' => $request->treatment,
            'package_type' => $request->package_type,
            'commission' => $request->commission,            
        ]);
        sleep(1);

        //dd($request);
        return redirect()->route('calculation.index');
    } catch (Exception $e) {
        dd($e);
    }

    }
    
}
