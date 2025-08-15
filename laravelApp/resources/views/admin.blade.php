<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: lavenderblush;
         padding: 0.5em;
        }
       #navList{
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap:2em;
       }
       #navList li{
        list-style: none;
       }
       #navList li a{
        text-decoration: none;
        color:black;
       }
       #mainContent{
        font-size: 2.5em;
        text-align: center;
       }
    </style>
</head>
<body>
   <header>
    <h2>Humber</h2>
    <nav>
        <ul id="navList">
            <li><a href="">Home</a></li>
            <li><a href="{{ route('students.index') }}">Students</a></li>
            <li><a href="{{ route('courses.index') }}">Courses</a></li>
            <li><a href="{{ route('professors.index') }}">Professors</a></li>
        </ul>    
    </nav>
    </header> 
   <div>
    <p id="mainContent">Welcome to Humber College</p>
    @yield('content')
   </div>
</body>
</html>