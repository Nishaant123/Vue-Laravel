<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class CompanyEmployeeController extends Controller
{
    public function index(){
        $designation=Employee::get();
        $array= [];
        foreach ($designation as $grade){
        $array[] = $grade->id;
        }
        return view('hasone',compact('designation','array'));
    }


    public function show(){
        $device=getdata();
        return view('hasmany',compact('device'));
    }
        // public function show(){
        //     $device=Employee::with('devicesData')->get();
        //     return view('hasmany',compact('device'));
        // }
}
