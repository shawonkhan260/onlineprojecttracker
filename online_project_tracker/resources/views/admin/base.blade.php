@extends('header')

@section('base')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Admin dashboard</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            @yield('content')
            </div>
          </div>
        </div>
      </div>
</main>
@endsection
