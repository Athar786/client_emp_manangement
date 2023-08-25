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

                    <form method="post" action="{{route('client.store')}}" class="custom-validation" id="client">
                    @csrf

                    <div class="col-sm-6" style="float: left;">
                        <div class="form-group required">
                            <label for="name">Client Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" placeholder="Client Name">
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
                            <label for="address">Address</label>

                            <textarea type="address" id="address" class="form-control @error('address') is-invalid @enderror" value="" name="address" placeholder="address">{{old('address')}}</textarea>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group required">
                            <label for="city">City</label>
                            <input type="text" name="city" min="1" id="city" class="form-control @error('city') is-invalid @enderror" value="{{old('city')}}" placeholder="city">
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group required">
                            <label for="notes">Notes</label>

                            <textarea class="ckeditor form-control" name="notes"></textarea>
                            @error('notes')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1 submit-btn">
                                    Create
                                </button>
                                <a type="button" class="btn btn-light waves-effect submit-btn" href="{{ route('home') }}">
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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection
