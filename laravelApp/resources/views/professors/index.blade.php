@extends('admin')
@section('content')
<style>
   .professor {
      margin-bottom: 1.5em;
   }

   .professor a {
      text-decoration: none;
      color: white;
      display: inline-block;
      margin-right: 0.5em;
      padding: 0.3em 0.8em;
      border-radius: 4px;
   }

   .professor a.edit {
      background-color: lightblue;
   }

   .professor a.delete {
      background-color: lightcoral;
   }

   .professor a:hover {
      opacity: 0.8;
   }
</style>

<h1>All professors</h1>

@foreach ($professors as $professor)
   <div class="professor">
      <div>
         {{ $professor->name }}
      </div>
      <div>
         <a href="{{ route('professors.edit', $professor->id) }}" class="edit">Edit</a>
         <a href="{{ route('professors.trash', $professor->id) }}" class="delete">Delete</a>
      </div>
   </div>
@endforeach
@endsection
