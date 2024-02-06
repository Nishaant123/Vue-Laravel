<html>
    <head>
        <title>Relation Ship</title>
    </head>
    <body>
        <h2>One to One RelationShip</h2>
        <table>
            <thead>
                @foreach($array as $id)
                 {{ $id }}
                @endforeach
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Designation</th>
            </thead>
            @foreach($designation as $employee)
            <tbody>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->address}}</td>
                <td>{{$employee->designationData->designation}}</td>
            </tbody>
            @endforeach 
        </table>
    </body>
</html> 