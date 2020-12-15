<table class="table table-condensed">
  <thead>
    <tr>
      <th style="width: 10px">ID</th>
      <th>NOME</th>
      <th>OFERTA</th>
      <th>LINK</th>
    </tr>
  </thead>
  <tbody>
    {{-- {{ $categories }} --}}
    
    
      @foreach ($categories as $category )
      <tr>
      <td>{{ $category->id }}</td>
      <td>{{ $category->name }}</td>
      <td>{{ $category->hasOffer }}</td>
      <td>{{ $category->link }}</td>
    </tr>
      @endforeach 
    
    
  </tbody>
</table>
