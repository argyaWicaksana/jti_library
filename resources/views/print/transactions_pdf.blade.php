<!DOCTYPE html>
<html>
<head>
    <title>JTI LIBRARY TRANSACTION LIST</title>
</head>
<body>
    <style type="text/css">
            table tr td,
            table tr th{
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Transactions List</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
            <th>User ID</th>
            <th>Amount</th>
            <th>Date_Borrow</th>
            <th>Date_Return</th>
            <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $a)
                <tr>
                <td>{{$a->users_id}}</td>
                <td>{{$a->amount}}</td>
                <td>{{$a->date_borrow}}</td>
                <td>{{$a->date_returndata}}</td>
                <td>{{$a->status->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>