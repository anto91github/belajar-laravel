<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index(Request $request)
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
        // $studentList = Student::withTrashed()->get();
        $keyword = $request->pencarian;
        $studentList = Student::with('class')
                        ->where('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('gender', $keyword)
                        ->orWhere('nis', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('class', function($query) use($keyword){
                            $query->where('name', 'LIKE', '%'.$keyword.'%');
                        })
                        ->paginate(15);
        // $studentList = Student::simplePaginate(15);
        // $studentList = Student::get();

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
        // $student = Student::with(['class.homeRoomTeacher', 'ekskul'])->findOrFail($id);
        $student = Student::with(['class.homeRoomTeacher', 'ekskul'])->where('slug',$id)->first();
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

    public function store(StudentCreateRequest $request)
    {
        // dd($request->all());
        // dd($request->name);

        // $validated = $request->validate([
        //     'nis' => 'unique:students|max:10|required',
        //     'name' => 'max:50|required',
        //     'gender' => 'required',
        //     'class_id' => 'required'
        // ]);

        // single add
        // $student = new Student;

        // $student->name = $request->name;
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;

        // $student->save();

        //mass assignment
        // $student = Student::create($request->all());

        //upload image
        $fileName = '';

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $statement = DB::select("show table status like 'students'");
            $newID = $statement[0]->Auto_increment;
            $fileName = $request->name.'-'.$newID.'-'.now()->timestamp.'.'.$extension;
            $path = $request->file('photo')->storeAs('studentsPhoto', $fileName);
        }

        // $request['image'] = $fileName; // agar megisi ke kolom 'image' jika menggunakan mass assignment
        $student = Student::create([
            'name' => $request->name,
            //'slug' => Str::slug($request->name, '_'),
            'gender' => $request->gender,
            'nis' => $request->nis,
            'class_id' => $request->class_id,
            'image' => $fileName
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

        //upload image
        $student = Student::findOrFail($id);
        $fileName = '';

        if($request->file('photo')){
            //delete old image
            Storage::delete('studentsPhoto/'.$student->image);

            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileName = $request->name.'-'.$id.'-'.now()->timestamp.'.'.$extension;
            $path = $request->file('photo')->storeAs('studentsPhoto', $fileName);
        }

        $student = Student::findOrFail($id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'nis' => $request->nis,
            'class_id' => $request->class_id,
            'image' =>  $fileName
        ]);
        
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('student-delete',[
            'student' => $student,
            'pageTitle' => 'students'
        ]);
    }

    public function destroy($id)
    {
        $delete = Student::findOrFail($id)->delete();

        if($delete){
            Session::flash('status','success');
            Session::flash('message','Sukses Delete Data');
        } else {
            Session::flash('status','failed');
            Session::flash('message','Gagal Delete Data');
        }

        return redirect('/students');
    }

    public function deletedStudent()
    {
        $deleted = Student::onlyTrashed()->get();
        return view('student-deleted-list',[
            'deleted' => $deleted,
            'pageTitle' => 'students'
        ]);
    }

    public function restore($id)
    {
        $restore = Student::withTrashed()->where('id', $id)->restore();

        if($restore){
            Session::flash('status','success');
            Session::flash('message','Sukses Restore Data');
        } else {
            Session::flash('status','failed');
            Session::flash('message','Gagal Restore Data');
        }

        return redirect('/students');
    }

    public function massUpdate()
    {
        $students = Student::whereNull('slug')->get();
        collect($students)->map(function ($item, $key) {
            $item->slug = Str::slug($item->name, '_');
            $item->save();
        });
    }

    public function getAPI()
    {
        $data = Student::all();
        return response()->json($data);
    }
}
