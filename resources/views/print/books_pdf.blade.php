<!DOCTYPE html>
<html>
<head>
    <title>JTI LIBRARY BOOK LIST</title>
</head>
<body>
    <style type="text/css">
            table tr td,
            table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Book List</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Stock</th>
            <th>Auhtor</th>
            <th>Isbn_Issn</th>
            <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $a)
                <tr>
                <td>{{$a->title}}</td>
                <td>{{$a->year}}</td>
                <td>{{$a->stock}}</td>
                <td>{{$a->author}}</td>
                <td>{{$a->isbn_issn}}</td>
                <td>{{$a->description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>