<table class="table table-condensed">
  <thead>
    <tr>
      <th style="width: 10px">ID</th>
      <th>NOME</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $category }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
