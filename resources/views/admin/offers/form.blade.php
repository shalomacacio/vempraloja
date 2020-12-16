@include('admin.products.alerts')

<div class="row">

  <div class="col-sm-6">
    <!-- text input -->
    <div class="form-group">
      <label>Nome:</label>
      <input type="text" name="name" class="form-control" placeholder="Enter ..."
        @isset( $category->name) value="{{ $category->name }}" @endisset>
    </div>
  </div>

</div>
