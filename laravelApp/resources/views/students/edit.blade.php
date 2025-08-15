@extends('admin')
@section('content')
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
        }

        form {
            border: 1px solid black;
            padding: 1.5em;
            width: 50%;
            max-width: 500px;
            background: #f9f9f9;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 0.3em;
            font-weight: bold;
        }

        input {
            display: block;
            width: 100%;
            padding: 0.6em;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: lightblue;
            color: white;
            padding: 0.6em 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background: deepskyblue;
        }
    </style>

    <div class="form-container">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
             @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <h1>Edit Student</h1>

            @csrf
            @method('PUT')

            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" value="{{ $student->fname }}">
            @error('fname')
            <span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" value="{{ $student->lname }}">
            @error('lname')
            <span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $student->email }}">
            @error('email')
            <span>
                <strong>{{ $message }}</strong>
            </span>
           @enderror

            <h3>Registered Courses</h3>
            <ul>
                @foreach($student->courses as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>

            <button type="submit">Update Student</button>
        </form>
    </div>
@endsection