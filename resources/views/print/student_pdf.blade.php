<!DOCTYPE html>
<html>
<head>
    <title>JTI LIBRARY Student List</title>
</head>
<body>
    <style type="text/css">
            table tr td,
            table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Student List</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
            <th>Name</th>
            <th>NIM</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student as $a)
                <tr>
             
                <td>{{$a->name}}</td>
                <td>{{$a->nim}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>