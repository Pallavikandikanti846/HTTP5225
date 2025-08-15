@extends('admin')
@section('content')
<style>
   .student-info {
      margin-bottom: 1.5em;
   }

   a {
      text-decoration: none;
      color: white;
      background-color: lightblue;
      display: inline-block;
      margin-right: 0.5em;
      padding: 0.3em 0.8em;
      border-radius: 4px;
   }

   a.delete {
      background-color: lightcoral;
   }

   a:hover {
      opacity: 0.8;
   }

   form {
      margin-top: 0.5em;
   }
   button{
    background-color: lightblue;
    color:white;
    border:none;
    padding:0.3em;
    border-radius: 0.2em;
   }
   button:hover{
    background-color: deepskyblue;
   }
</style>

<h1>Name: {{ $student->fname }} {{ $student->lname }}</h1>
<p>Email: {{ $student->email }}</p>

<h3>Courses</h3>
<ul>
    @foreach($student->courses as $course)
        <li>
            {{ $course->name }}
            {{ $course->description }}
             - Professor: {{ $course->professor ? $course->professor->name : 'No professor assigned' }}
            <form action="{{ route('students.removeCourse', [$student->id, $course->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Remove</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
