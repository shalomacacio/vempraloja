@include('admin.products.alerts')

<div class="row">

  <div class="col-sm-4">
    <div class="form-group">
      <label>CATEGORIA:</label>
      <select class="form-control" name="category_id" style="width: 100%;">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
      <label>Imagem:</label>
      <input type="text" name="img" class="form-control" placeholder="Enter ..."
        @isset( $link->img) value="{{ $link->img }}" @endisset>
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

  <div class="col-sm-4">
    <!-- text input -->
    <div class="form-group">
      <label>Preço Antigo:</label>
      <input type="text" name="price_old" class="form-control" placeholder="Enter ..."
        @isset( $link->price_old) value="{{ $link->price_old }}" @endisset>
    </div>
  </div>

  <div class="col-sm-4">
    <!-- text input -->
    <div class="form-group">
      <label>Desconto:</label>
      <input type="text" name="disc" class="form-control" placeholder="Enter ..."
        @isset( $link->disc) value="{{ $link->disc }}" @endisset>
    </div>
  </div>

  <div class="col-sm-4">
    <!-- text input -->
    <div class="form-group">
      <label>Span:</label>
      <input type="text" name="span" class="form-control" placeholder="Enter ..."
        @isset( $link->span) value="{{ $link->span }}" @endisset>
    </div>
  </div>

  <div class="col-sm-4">
    <!-- text input -->
    <div class="form-group">
      <label>Estrelas:</label>
      <input type="text" name="stars" class="form-control" placeholder="Enter ..."
        @isset( $link->stars) value="{{ $link->stars }}" @endisset>
    </div>
  </div>

  <div class="col-sm-4">
    <!-- text input -->
    <div class="form-group">
      <label>Link:</label>
      <input type="text" name="link" class="form-control" placeholder="Enter ..."
        @isset( $link->link) value="{{ $link->link }}" @endisset>
    </div>
  </div>

</div>
