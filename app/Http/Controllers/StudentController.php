<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    public function index(){
        return Student::all();
    }

    public function show(Student $student){
        return response()->json([
            'student'=>$student,
        ]);
    }

    public function store(Request $request){
        $rules= array(
            'name'=>'required | min:2 | max:10',
        );
        $validation = Validator::make($request->all(),$rules);
        if($validation->fails()){
            return $validation->errors();
        }
        else{
            $student =Student::create($request->all());
            if($student->save()){
                return ['result'=>'student added'];
            }
            else{
                return ['result'=>'student add failed'];
            }
        }
       
    }

    public function update(Request $request,Student $student){
       $student = $student->update($request->all());
        if($student){
            return['result'=>'student updated'];
        }
        else{
            return ['result'=>'student update failed'];
        }
    }

    public function delete(Student $student){
       $student = $student->delete();
        if($student){
            return['result'=>'student deleted'];
        }
        else{
            return ['result'=>'student delete failed'];
        }
    }
}
