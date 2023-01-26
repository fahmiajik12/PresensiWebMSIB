@extends('layouts.login')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
