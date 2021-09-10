<!Doctype html>
<head>

</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td> 
                @if ($user->role_id == 1)
                    <td>admin</td> 
                @elseif($user->role_id == 2) 
                   <td>Moderator</td>
                @else
                    <td>users</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</body>