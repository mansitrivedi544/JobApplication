@extends('layouts.mainLayout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 topHead">
            <div class="card">
                <div class="card-header">Admin - Dashboard</div>
  
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
  
                    <h3>Welcome</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection