@extends('admin');
@section('content')
    <h1>Add a Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" name="fname" placeholder="First Name">
        <input type="text" name="lname" placeholder="Last Name">
        <input type="email" name="email" placeholder="Email">
        <input type="submit" name="Add" value="Add">
    </form>
