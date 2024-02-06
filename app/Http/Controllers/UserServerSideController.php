<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserServerSideController extends Controller
{
   public function get(){
   
    $pageLength=request('pageLength')??10;
    $users=User::filtered();
    return response()->json($users->paginate($pageLength),200);
   }
}
