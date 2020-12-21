<table class="table table-condensed">
  <thead>
    <tr>
      <th style="width: 10px">ID</th>
      <th>IMG</th>
      <th>NOME</th>
      <th>OFERTA</th>
      <th>LINK</th>
    </tr>
  </thead>
  <tbody>
    {{-- {{ $categories }} --}}
    
    
      @foreach ($stores as $store )
      <tr>
      <td>{{ $store->id }}</td>
      <td><img src="{{ $store->thumbnail }}" alt="product" width="50px">  </td>
      <td>{{ $store->name }}</td>
      <td>{{ $store->hasOffer }}</td>
      <td>{{ $store->link }}</td>
    </tr>
      @endforeach 
    
    
  </tbody>
</table>
