<!DOCTYPE html>
<html>
<head>
  <title> @yield('title')</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  
</head>

<body>
  <nav>
    <ul>
      <li><img src="{{url('images/griffithuni.jpg')}}" height='40' width='150'></li>
      <li><a href="{{url('advertise_project')}}" >Advertise Project</a></li>
      <li><a href="{{url('project_assignment_page')}}" >Project Assignment</a></li>
      <li><a href="{{url('list_students')}}">List of Students</a></li>
      <li><a href="{{url('top_partners')}}">Top 3 Industry Partners</a></li>
      <li><a href="{{url('documentation')}}">Documentation</a></li>
      <li><a href="{{url("/")}}" id='link'>Home</a></li>
    </ul>
  </nav>
    @yield('content')
    <div class=footer>© 2022 Work Integrated Learning</div>

</body>
</html>