@include('admin.products.alerts')

<div class="row">

  <div class="col-sm-4">
    <div class="form-group">
      <label>CATEGORIA:</label>
      <select class="form-control" name="category_id" style="width: 100%;">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name  }}</option>
      @endforeach
      </select>
    </div>
  </div>

  <div class="col-sm-4">
    <!-- text input -->
    <div class="form-group">
      <label>Nome:</label>
      <input type="text" name="name" class="form-control" placeholder="Enter ..."
        @isset( $link->name) value="{{ $link->name }}" @endisset>
    </div>
  </div>

  <div class="col-sm-4">
    <!-- text input -->
    <div class="form-group">
      <label>Preço:</label>
      <input type="text" name="price" class="form-control" placeholder="Enter ..."
        @isset( $link->price) value="{{ $link->price }}" @endisset>
    </div>
  </div>

  <div class="col-sm-12">
    <!-- text input -->
    <div class="form-group">
      <label>Link:</label>
      <input type="text" name="link" class="form-control" placeholder="Enter ..."
        @isset( $product->link) value="{{ $product->link }}" @endisset>
    </div>
  </div>
  
  <div class="col-sm-12">
    <!-- text input -->
    <div class="form-group">
      <label>Imagem 1:</label>
      <input type="text" name="img1" class="form-control" placeholder="Enter ..."
        @isset( $product->img1) value="{{ $product->img1 }}" @endisset>
    </div>
  </div>
  
  <div class="col-sm-12">
    <!-- text input -->
    <div class="form-group">
      <label>Imagem 2:</label>
      <input type="text" name="img2" class="form-control" placeholder="Enter ..."
        @isset( $product->img2) value="{{ $product->img2 }}" @endisset>
    </div>
  </div>
  
  <div class="col-sm-12">
    <!-- text input -->
    <div class="form-group">
      <label>Imagem 3:</label>
      <input type="text" name="img3" class="form-control" placeholder="Enter ..."
        @isset( $product->img3) value="{{ $product->img3 }}" @endisset>
    </div>
  </div>
  
  <div class="col-sm-12">
    <!-- text input -->
    <div class="form-group">
      <label>Imagem 4:</label>
      <input type="text" name="img4" class="form-control" placeholder="Enter ..."
        @isset( $product->img4) value="{{ $product->img4 }}" @endisset>
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
