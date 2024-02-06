<html>
    <head>
        <title>Relation Ship</title>
    </head>
    <body>
        <h2>One to Many RelationShip</h2>
        <table>
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Devices</th>
            </thead>
            @foreach(getdata() as $employee)
            <tbody>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->address}}</td>
                @foreach($employee->devicesData as $devicesName) 
                <td>{{$devicesName->device_name}}</td>
                @endforeach 
            </tbody>
            @endforeach 
        </table>
    </body>
</html>