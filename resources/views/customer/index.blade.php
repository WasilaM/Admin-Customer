<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer</title>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Activated</th>
                <th>Payment plan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>{{Auth::guard('customer')->user()->name}}</td>
                <td>{{Auth::guard('customer')->user()->email}}</td>
                <td>{{Auth::guard('customer')->user()->activated}}</td>
                <td>{{Auth::guard('customer')->user()->payment}}</td>
                <td>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form action="{{ route('customer.logout') }}" method="POST" class="d-none" id="logout-form">@csrf</form>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
