<!Doctype html>
<html>
     <head>
         <title>users</title>
     </head>
     <body>
          @foreach ($users as $user )
             username: <h1>{{$user->name}}</h1>
             email:   <h1>{{$user->email}}</h1>
          @endforeach
     </body>
</html>
