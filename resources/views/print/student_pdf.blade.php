<!DOCTYPE html>
<html>
<head>
    <title>JTI LIBRARY MEMBER CARD</title>
</head>
<body>
    <style type="text/css">
            table tr td,
            table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Articles Report</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
            <th></th>
            <th>Name</th>
            <th>NIM</th>
            </tr>
        </thead>
        <tbody>
            @foreach($student as $a)
                <tr>
                <td>{{$a->profile_picture}}</td>
                <td>{{$a->name}}</td>
                <td>{{$a->nim}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>