@extends('layout.mainlayout')
@section('title', 'Student Add')

@section('content')
    <h1>Add Student</h1>
    

    <div class="mt-5 col-8 m-auto">
        <form action='student' method='post'>
            @csrf
            <div class="mb-3">
                <label for='name'>Name</label>
                <input type="text" class='form-control' name="name" id='name' required>
            </div>

            <div class="mb-3">
                <label for='gender'>Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Select One</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for='nis'>NIS</label>
                <input type="text" class='form-control' name="nis" id='nis' required>
            </div>

            <div class="mb-3">
                <label for='class'>Class</label>
                <select name="class_id" id="class" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach($classList as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success" type="submit">Save</button>

        </form>
    </div>
    
@endsection