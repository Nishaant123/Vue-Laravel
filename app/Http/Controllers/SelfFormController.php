<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SelfForm;
use Illuminate\Support\Facades\Validator;

class SelfFormController extends Controller
{


    public function index(){ 
        $selfForm= SelfForm::all();
        foreach($selfForm as $self){
            $self->how = json_decode($self->how);
        }
        return $selfForm;
    }


    public function store(Request $request){ 
       
        $request->validate([
            'userName' => 'required|string|max:255',
            // 'image' => 'mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
        }
        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $documentName = time() . '_' . $document->getClientOriginalName();
            $document->storeAs('public/document', $documentName);
        }

        $posts = SelfForm::create([
            'userName' => $request->userName,
            'userAge' => $request->userAge,
            'referrer' => $request->referrer,
            'interest' =>$request->interest,
            'how' =>json_encode($request->how),
            'image' => $imageName ?? null,
            'document' => $documentName ?? null,
          
        ]);
       
        return response()->json([
            'success' => true,
            'message' => 'Employee created Successfully',
            'data' => $posts
        ], 201);
    }


    
    public function destroy($id){ 
       
        $employee=SelfForm::find($id);
        if($employee){
            
            $employee->delete();
            return response()->json([
                'success' => true,
                'message' => 'Employee successfully deleted',
                'data' => $employee
            ], 200);

        }
    }

    public function edit($id){ 
    return SelfForm::find($id);
      
    }

    public function update(Request $request,$id){
        // dd($request->all());
        $validator=Validator::make($request->all(),[
            'userName'=>'required|max:191'
        ]);

        if($validator->fails()){
     
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages(),
            ],422);
        }else{  
                $employee=SelfForm::find($id);
                $employee->userName=$request->input('userName');
                $employee->userAge=$request->input('userAge');
                $employee->referrer=$request->input('referrer');
                $employee->interest=$request->input('interest');
                $employee->how=$request->input('how');
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/images', $imageName);
                    $employee->image = $imageName;
                }
                if ($request->hasFile('document')) {
                    $document = $request->file('document');
                    $documentName = time() . '_' . $document->getClientOriginalName();
                    $document->storeAs('public/document', $documentName);
                    $employee->document = $documentName;
                }
              
                $employee->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Employee Update Successfully',
                ],200);
            }
        }
        }
    



