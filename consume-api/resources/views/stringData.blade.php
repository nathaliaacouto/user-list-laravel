<table>
  <thead>
    <th>#id</th>
    <th>#name</th>
    <th>#age</th>
    <th>#email</th>
  </thead>
  <tbody>
    @foreach($stringData as $d2)
      <tr>
        <td>{{ $d2['id'] }}</td>
        <td>{{ $d2->name }}</td>
        <td>{{ $d2->age }}</td>
        <td>{{ $d2->email }}</td>
      </tr>
    @endforeach
  </tbody>
</table>