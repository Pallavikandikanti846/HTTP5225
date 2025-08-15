@extends('admin')
@section('content')
<style>
   .course {
      margin-bottom: 1.5em;
   }

   .course a {
      text-decoration: none;
      color: white;
      display: inline-block;
      margin-right: 0.5em;
      padding: 0.3em 0.8em;
      border-radius: 4px;
   }

   .course a.edit {
      background-color: lightblue;
   }

   .course a.delete {
      background-color: lightcoral;
   }

   .course a:hover {
      opacity: 0.8;
   }
</style>

<h1>All Courses</h1>

@foreach ($courses as $course)
   <div class="course">
      <div>
         {{ $course->name }} | {{ $course->description }}
         <p>Professor: {{ $course->professor ? $course->professor->name : 'No professor assigned' }}</p>
      </div>
      <div>
         <a href="{{ route('courses.edit', $course->id) }}" class="edit">Edit</a>
         <a href="{{ route('courses.trash', $course->id) }}" class="delete">Delete</a>
      </div>
   </div>
@endforeach
@endsection
