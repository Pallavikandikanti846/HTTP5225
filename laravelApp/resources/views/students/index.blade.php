@extends('admin')
@section('content')
<style>
   .student {
      margin-bottom: 1.5em;
   }

   .student a {
      text-decoration: none;
      color: white;
      background-color: lightblue;
      display: inline-block;
      margin-right: 0.5em;
      padding: 0.3em 0.8em;
      border-radius: 4px;
   }

  .student a.view {
      background-color: lightgreen;
   }

   .student a.edit {
      background-color: lightblue;
   }

   .student a.delete {
      background-color: lightcoral;
   }

   .student a:hover {
      opacity: 0.8;
   }
</style>

<h1>All Students</h1>

@foreach ($students as $student)
   <div class="student">
      <div>
         {{ $student->fname }} {{ $student->lname }} | {{ $student->email }}
      </div>
      <div>
         <a href="{{ route('students.show', $student->id) }}" class="view">View</a>
         <a href="{{ route('students.edit', $student->id) }}">Edit</a>
         <a href="{{ route('students.trash', $student->id) }}" class="delete">Delete</a>
      </div>
   </div>
@endforeach
@endsection
