<table class="table table-condensed">
  <thead>
    <tr>
      <th style="width: 10px">ID</th>
      <th>IMG</th>
      <th>NOME</th>
      <th>PREÇO</th>
    </tr>
  </thead>
  <tbody>
    {{-- {{ $categories }} --}}
    
    
      @foreach ($offers as $offer )
      <tr>
      <td>{{ $offer->id }}</td>
      <td><img src="{{ $offer->thumbnail }}" alt="product" width="50px">  </td>
      <td>{{ $offer->name }}</td>
      <td>{{ $offer->price }}</td>
    </tr>
      @endforeach 
    
    
  </tbody>
</table>
