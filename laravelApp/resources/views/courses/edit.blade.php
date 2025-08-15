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

    h1 {
        text-align: center;
        margin-bottom: 1em;
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
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        <h1>Edit Course</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        @method('PUT')

        <label for="name">Course Name</label>
        <input type="text" id="name" name="name" value="{{ $course->name }}">
        @error('name')
            <span>
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="{{ $course->description }}">
        @error('description')
            <span>
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <select name="professor_id">
            @error('professor_id')
            <span>
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <option value="">-- Select Professor --</option>
        @foreach($professors as $prof)
            <option value="{{ $prof->id }}" {{ $course->professor_id == $prof->id ? 'selected' : '' }}>
                {{ $prof->name }}
            </option>
        @endforeach
    </select>

        <button type="submit">Submit</button>
    </form>
</div>
@endsection
