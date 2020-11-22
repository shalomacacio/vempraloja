@extends('layouts.site')

@section('content')
    @include('layouts.site-partials.shop')
    @include('layouts.site-partials.products-amazon')
    @include('layouts.site-partials.products-magalu')
    @include('layouts.site-partials.hot-deal')
    @include('layouts.site-partials.top-seling')    
    @include('layouts.site-partials.newsletter')
@endsection