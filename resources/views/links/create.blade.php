@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title text-center">Create a new Link</h2>

                <form action="/dashboard/links/new" method="POST">
                    @csrf
                    <div class="row d-flex justify-content-center align-items-center">


                        {{-- payment methods --}}
                        <div class="col-lg-8 col-md-6">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                            <select id="institution_name" option="true" class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="institution_name">
                                <option value="nothing" selected>Choose Payment Type...</option>
                                @foreach($payment_methods as $payment_method)
                                <option value="{{ $payment_method->name }}"> {{ $payment_method->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        {{-- payment account number --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="account_no">Account Number / Username</label>
                                <input id="account_no" class="form-control {{ $errors->first('account_no') ? 'is-invalid' : '' }}" type="text" name="account_no" placeholder="My LinkedIn Profile" value="{{ old('account_no') }}">

                                @if ($errors->first('account_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('account_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- account name --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="account_name">Account Name</label>
                                <input id="account_name" class="form-control {{ $errors->first('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" placeholder="My LinkedIn Profile" value="{{ old('account_name') }}">

                                @if ($errors->first('account_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('account_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        {{-- Link Url --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <label for="link">Account Url</label>
                                <input id="link" class="form-control {{ $errors->first('link') ? 'is-invalid' : '' }}" type="text" name="link" placeholder="https://www.linkedin.com/in/username/" value="{{ old('link') }}">

                                @if ($errors->first('link'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- submit button --}}
                        <div class="col-lg-8 col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Link</button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection