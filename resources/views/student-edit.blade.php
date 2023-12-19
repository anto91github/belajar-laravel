@extends('layout.mainlayout')
@section('title', 'Student Edit')

@section('content')
    <h1>Edit Student</h1>
    

    <div class="mt-5 col-8 m-auto">
        <form action='/student/{{$student->id}}' method='post'>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for='name'>Name</label>
                <input type="text" class='form-control' name="name" id='name' value="{{$student->name}}" required>
            </div>

            <div class="mb-3">
                <label for='gender'>Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    
                    <option value="L" 
                        @if ($student->gender == 'L')
                            selected
                        @endif
                    >Laki-Laki</option>
                    <option value="P" 
                        @if ($student->gender == 'P')
                            selected
                        @endif
                    >Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for='nis'>NIS</label>
                <input type="text" class='form-control' name="nis" id='nis' value="{{$student->nis}}" required>
            </div>

            <div class="mb-3">
                <label for='class'>Class</label>
                <select name="class_id" id="class" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach($classList as $class)
                        <option value="{{$class->id}}"
                            @if ($class->id == $student->class->id)
                                selected
                            @endif
                        >{{$class->name}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success" type="submit">Update</button>

        </form>
    </div>
    
@endsection