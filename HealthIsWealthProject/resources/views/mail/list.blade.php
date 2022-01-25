
@component('mail::message')
# Customer List
<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
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
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Date</th>
      <th>Address</th>
    </tr>
    @component('mail::table')
    @foreach ($customers as $customer)
    <tr>
      <td>{{$customer->name}} </td>
      <td>{{$customer->email}} </td>
      <td>{{$customer->dob}} </td>
      <td>{{$customer->address}} </td>
    </tr>
    @endforeach
    @endcomponent
   </table>
</body>
</html>
@component('mail::button', ['url' => 'http://localhost:8000/customers'])
See More Customers
@endcomponent
Thanks,<br>
Assginment customer list
@endcomponent