<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
       // $student = DB::table('students')->get();
        
        // insert using query builder
        // DB::table('students')->insert([
        //     'name' => 'qiqi',
        //     'gender' => 'P',
        //     'nis' => '0102458',
        //     'class_id' => 2
        // ]);

        // insert using eloquent
        // Student::create([
        //     'name' => 'Ei',
        //     'gender' => 'P',
        //     'nis' => '0102459',
        //     'class_id' => 1
        // ]);

        // update using query builder
        // DB::table('students')->where('id', 43)->update([
        //     'name' => 'qiqi_updated',
        //     'class_id' => 3
        // ]);

        // update using eloquent
        // Student::find(44)->update([
        //     'name' => 'Ei_updated',
        //     'class_id' => 2
        // ]);

        // delete using query builder
        // DB::table('students')->where('id', 43)->delete();

        // delete using eloquent
        // Student::find(44)->delete();

        // dd($student);

        // $studentList = Student::all(); // Lazy Loading
        // $studentList = Student::with(['class.homeRoomTeacher', 'ekskul'])->get(); // Eager loading (recomended)
        $studentList = Student::get();

        $nilai = [1,2,3,4,5,6,7,8,9];
        $nilai2 = [1,1,2,3,4,5,6,7,8];
        $doubleArray = [
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ];

        $nilairata2 = collect($nilai)->avg();

        $mengandung = collect($nilai)->contains(9);
        $mengandung2 = collect($nilai)->contains(function($val){
            return $val>11;
        });

        $perbedaan = collect($nilai)->diff($nilai2);

        $filter = collect($nilai)->filter(function($val) {
            return $val > 5;
        });

        $memetik = collect($doubleArray)->pluck('name')->all();

        $multiplied = collect($nilai)->map(function ($val) {
            return $val*2;
        });

        // dd($multiplied);

        return view('student',[
            'pageTitle' => 'students',
            'studentList' => $studentList
        ]);

    }

    public function show($id){
        $student = Student::with(['class.homeRoomTeacher', 'ekskul'])->findOrFail($id);
        return view('student-detail',[
            'pageTitle' => 'students',
            'student' => $student
        ]);
    }

    public function create() 
    {
        $classList = ClassRoom::select('id', 'name')->get();
        return view('student-add',[
            'classList'=> $classList,
            'pageTitle' => 'students'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->name);

        // single add
        // $student = new Student;

        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;

        // $student->save();

        //mass asignment
        // $student = Student::create($request->all());

        $student = Student::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'nis' => $request->nis,
            'class_id' => $request->class_id
        ]);

        if($student){
            Session::flash('status','success');
            Session::flash('message','Sukses Insert Data');
        } else {
            Session::flash('status','failed');
            Session::flash('message','Gagal Insert Data');
        }

       return redirect('/students');

    }

    public function edit($id)
    {
        $student = Student::with(['class.homeRoomTeacher', 'ekskul'])->findOrFail($id);
        $classList = ClassRoom::select('id', 'name')->get();
        return view('student-edit',[
            'pageTitle' => 'students',
            'student' => $student,
            'classList'=> $classList,
        ]);
    }

    public function update(Request $request, $id)
    {

        //mass asignment
        // $student = Student::findOrFail($id);
        // $student->update($request->all());

        $student = Student::findOrFail($id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'nis' => $request->nis,
            'class_id' => $request->class_id
        ]);
        
        return redirect('/students');
    }
}
