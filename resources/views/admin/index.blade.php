<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <form action="{{ route('admin.logout') }}" method="POST" class="d-none" id="logout-form">
        @csrf
        <div class="form-actions" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-circle green" style="float: right">Logout</button>
                </div>
            </div>
        </div>
    </form>
    <table style="margin-top: 10px;">
    <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Activated</th>
        <th>Payment plan</th>
        <th></th>
    </tr>
    @php
        $counter = 1;
    @endphp
    @foreach ($customers as $customer)
        <tr>
            <th>{{$counter++}}</th>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->activated}}</td>
            <td>{{$customer->payment}}</td>
            <td>
                <form method="POST" action="{{ route('admin.destroy', $customer->id) }}">
                    <a href="{{ route('admin.edit', $customer->id) }}" class="btn btn-primary"><i
                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"
                            aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>
