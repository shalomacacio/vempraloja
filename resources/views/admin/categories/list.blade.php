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
      <td>{{ $category->id }}</td>
      <td>{{ $category->name }}</td>
      <td class="text-right py-0 align-middle">
        <div class="btn-group btn-group-sm">
          <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
              @csrf
              @method('DELETE')
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
            <button  class="btn btn-danger" onclick="return confirm('Confirma exclusão ?')" ><i class="fas fa-trash"></i></button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
