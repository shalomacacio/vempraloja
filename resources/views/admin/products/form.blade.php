@include('admin.products.alerts')

<div class="row">

  <div class="col-sm-6">
    <!-- text input -->
    <div class="form-group">
      <label>Nome:</label>
      <input type="text" name="name" class="form-control" placeholder="Enter ..."
        @isset( $product->name) value="{{ $product->name }}" @endisset>
    </div>
  </div>

  <div class="col-sm-6">
    <!-- text input -->
    <div class="form-group">
      <label>Preço:</label>
      <input type="text" name="price" class="form-control" placeholder="Enter ..."
        @isset( $product->price) value="{{ $product->price }}" @endisset>
    </div>
  </div>

  <div class="col-sm-6">
    <!-- text input -->
    <div class="form-group">
      <label>Link:</label>
      <input type="text" name="link" class="form-control" placeholder="Enter ..."
        @isset( $product->link) value="{{ $product->link }}" @endisset>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
      <label>Imagens </label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input"  name="img[]" @isset( $product->img) value="{{ $product->img }}" @endisset multple >
          <label class="custom-file-label" for="exampleInputFile">Imagem</label>
        </div>
      </div>
    </div>
  </div>


  <div class="col-sm-12">
    <!-- textarea -->
    <div class="form-group">
      <label>Descrição</label>
      <textarea class="textarea" placeholder="Place some text here" name="description"
      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
      @isset($product->descricao) {{ $product->descricao  }}  @endisset
    </textarea>
    </div>
  </div>

</div>
