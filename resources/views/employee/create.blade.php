@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('emp.store')}}" class="custom-validation" id="employee">
                    @csrf

                    <div class="col-sm-6" style="float: left;">
                        <div class="form-group required">
                            <label for="name">Employee Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="Employee Name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group required">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" placeholder="Email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group required">
                            <label for="phone">Phone Number</label>
                            <input type="number" name="phone" min="1" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" placeholder="Phone Number">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1 submit-btn">
                                    Create
                                </button>
                                <a type="button" class="btn btn-light waves-effect submit-btn" href="{{ route('admin.home') }}">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
