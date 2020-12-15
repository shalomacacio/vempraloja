@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('/vendor/admin/plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
@include('admin.categories.page-header')
{{-- @include('admin.layouts.admin-partials.alerts') --}}
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <!-- right column -->
       <div class="col-md-12">
         <!-- general form elements disabled -->
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title">Categorias</h3>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
            @include('admin.categories.list')
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
         
       </div>
       <!--/.col (right) -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<!-- File Input -->
<script src="{{ asset('/vendor/admin/plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
<script src="{{ asset('/vendor/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
@endsection

