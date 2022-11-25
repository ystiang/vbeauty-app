<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facade\Validator;
use Inertia\Inertia;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $commissions = Commission::all();
        return Inertia::render(
            'Commission',
            ['commissions' => $commissions]
        );
    }

    /**
     * Store a newly created resource.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        // $request->validate([
        //     'name' => 'required',
        //     'card' => 'required',
        //     'treatment' => 'required',
        //     'product/course' => 'required',
        //     'product' => 'required',
        //     'course' => 'required',
        //     'service' => 'required',
        //     'commission' => 'required',            
        // ]);
        try {  
        Commission::create([            
            'name' => $request->name,
            'card' => $request->card,
            'treatment' => $request->treatment,
            'productcourse' => $request->productcourse,
            'product' => $request->product,
            'course' => $request->course,
            'service' => $request->service,
            'commission' => $request->commission, 
        ]);
        sleep(1);

        //dd($request);
        return redirect()->route('commissions.index');
        } catch (Exception $e) {
            dd($e);
        }
    } 
}
