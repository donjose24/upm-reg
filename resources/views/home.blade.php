@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Announcements</div>
                <div class="card-body">
                    <ul>
                        <li>Subit your medical certificate until August 25, 2019</li>
                        <li>BMC 1A this coming saturday</li>
                        <li>Rakstar Training on Monday. Kitak!</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your information</div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {!! session()->get('success')!!}
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (! Auth::user()->med_cert)
                    <h6>Medical certificate status: not yet</h6>
                    <h3>Please Upload your Medical Certificate</h3>
                    <form method="POST" action="{{ route('upload') }}" enctype=multipart/form-data class="update-form">
                        @csrf
                          <div class="form-group">
                            <input type="file" class="form-control-file" name="med_cert">
                          </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Upload Medical Certificate') }}
                        </button>
                    </form>
                    @else
                        <h6>Medical Certficate Status: Uploaded</h6>
                        <sub><a href={{ Auth::user()->med_cert }} target="_blank"> View here</a></sub>
                        <form method="PUT" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ Auth::user()->first_name }}" required autocomplete="first_name" autofocus readonly>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ Auth::user()->last_name }}" required autocomplete="last_name" autofocus readonly>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Year Level') }}</label>

                                <div class="col-md-6">
                                    <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ Auth::user()->birthdate }}" required autocomplete="birthdate" readonly>
                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>
                                <div class="col-md-6">
                                    <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ Auth::user()->contact_number }}" required autocomplete="contact_number" autofocus readonly>

                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facebook_profile" class="col-md-4 col-form-label text-md-right">{{ __('Facebook Profile Link') }}</label>
                                <div class="col-md-6">
                                    <input id="facebook_profile" type="text" class="form-control @error('facebook_profile') is-invalid @enderror" name="facebook_profile" value="{{ Auth::user()->facebook_profile }}" autocomplete="facebook_profile" autofocus readonly>

                                    @error('facebook_profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" readonly>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
