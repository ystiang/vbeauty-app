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
            'Packages/Index',
        [
            'packages' => $packages
        ]
        );
    }
    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Packages/Create'
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

    public function destroy(Request $request, $id)
    {
        $package=Package::findOrFail($id);

        if(is_null($package)){
            return abort(404);
         }

        $package->delete();
        // sleep(1);

        return redirect()->route('calculation.index')->with('message', 'Record Deleted');
    }
    
    
}
