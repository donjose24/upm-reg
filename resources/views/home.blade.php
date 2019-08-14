@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session()->get('success')!!}
            </div>
        @endif
        <div class="row justify-content-left">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Your Information</div>
                            <div class="card-body">
                                <div class="img-holder">
                                    <form action="/avatar" method="POST" class="avatar-form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="avatar" class="avatar-uploader">
                                        @if (Auth::user()->avatar)
                                            <img src="{{ Auth::user()->avatar }}" class="avatar rounded-circle">
                                        @else
                                            <img src="/default.png" class="avatar rounded-circle">
                                        @endif
                                    </form>
                                    <small><em>Click on your avatar to update</em></small>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-md-5">
                                        First Name:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->first_name }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        Last Name:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->last_name }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        Email Address:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->email }}</b>
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <div class="col-md-12">
                                        <h4>Requirements Status</h4>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        Photo
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            if (Auth::user()->avatar == '') {
                                                echo '<span style="color:red">Pending</span>';
                                            } else {
                                                echo '<span style="color:green">Submited</span>';
                                            }
                                        @endphp
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        Medical Certificate
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            switch (Auth::user()->med_cert_status) {
                                                case "approved":
                                                    echo '<span style="color:green">Approved</span>';
                                                    break;
                                                case "pending":
                                                    echo '<span style="color:yellow">Pending</span>';
                                                    break;
                                                case "rejected":
                                                    echo '<span style="color:red">Rejected</span>';
                                                    break;
                                                default:
                                                    echo '<span style="color:red">Not Yet Submited</span>';
                                                    break;
                                            }
                                        @endphp
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        Additional Information
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            if (Auth::user()->ice_name) {
                                                echo '<span style="color:green">Submitted</span>';
                                            } else {
                                                echo '<span style="color:red">Pending</span>';
                                            }
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-header">Announcements</div>
                            <div class="card-body">
                                <ul>
                                    @if (count($announcements) == 0)
                                        <h4>No announcements for now!</h4>
                                    @endif
                                    @foreach($announcements as $announcement)
                                        <li>{{ $announcement->description }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="card-header">Downloadable Documents</div>
                            <div class="card-body">
                                <ul>
                                    <li><a href="/medical-clearance-form.docx" download>Medical Clearance Form</a></li>
                                    <li><a href="/pithaya.pdf" download>Pithaya</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Medical Certificate</div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                 <h5>Medcert Status: {{Auth::user()->med_cert_status ? ucwords(Auth::user()->med_cert_status) : "Not yet submitted" }} </h5>

                                 <div class="text-center">
                                      @if (Auth::user()->med_cert_status != '')
                                          <img src="/user/medcert/{{Auth::user()->id}}" class="med-cert"/>
                                          <a href="/user/medcert/{{Auth::user()->id}}" target="_blank"> View full photo</a>
                                      @endif


                                        @if (Auth::user()->med_cert_upload_date)
                                            <p>Date Uploaded: {{ Auth::user()->med_cert_upload_date }}</p>
                                        @endif
                                    </div>

                                    @if (Auth::user()->med_cert_status != 'approved')
                                        <form method="POST" action="{{ route('upload') }}" enctype=multipart/form-data class="update-form">
                                            @csrf
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" name="med_cert">
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Upload / Update') }}
                                            </button>
                                        </form>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Additional Information </div>
                            <div class="card-body ice-form">
                                <form method="POST" action="/user">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="ice_name" class="col-md-4 col-form-label text-md-left">{{ __('In case of emergency') }}</label>
                                        <div class="col-md-6">
                                            <input id="ice_name" type="text" class="form-control" name="ice_name" required placeholder="ex.) Juan Dela Cruz" value="{{ Auth::user()->ice_name }}">
                                            <small><em>Who to contact in case of emergency </em></small>
                                            @error('ice_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ice_contact_number" class="col-md-4 col-form-label text-md-left">{{ __('Contact number') }}</label>

                                        <div class="col-md-6">
                                            <input id="ice_contact_number" type="text" class="form-control" name="ice_contact_number" required placeholder="ex.) +63905694201" value="{{ Auth::user()->ice_contact_number }}">
                                            <small><em>Your ICE's contact number </em></small>
                                            @error('ice_contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="full_address" class="col-md-4 col-form-label text-md-left">{{ __('Full Address') }}</label>
                                        <div class="col-md-6">
                                            <textarea name="full_address" class="form-control">{{ Auth::user()->full_address }}</textarea>
                                            <small><em>Your full address </em></small>
                                            @error('full_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="join_reason" class="col-md-4 col-form-label text-md-left">{{ __('Why do you want to join UPM?') }}</label>

                                        <div class="col-md-6">
                                            <textarea name="join_reason" class="form-control">{{ Auth::user()->join_reason }}</textarea>
                                            <small><em>Baket nga ba? </em></small>
                                            @error('full_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                     <input type="hidden" name="_method" value="put" />
                                    <button class="btn btn-success">Submit / Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
