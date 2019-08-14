@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session()->get('success')!!}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Actions</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-left mt-2">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ ucwords($user->first_name) }}</div>
                            <div class="card-body">
                                <div class="img-holder">
                                    <form action="/avatar" method="POST"enctype="multipart/form-data">
                                        @csrf
                                          @if ($user->avatar)
                                              <img src="{{ $user->avatar }}" class="avatar rounded-circle">
                                          @else
                                              <img src="/default.png" class="avatar rounded-circle">
                                          @endif
                                    </form>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-md-6">
                                         First Name:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ $user->first_name }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                         Last Name:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ $user->last_name }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                         Email Address:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ $user->email }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                         Application Status:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ ucwords($user->application_status) }}</b>
                                    </div>
                                </div>
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
                                 <h5>Medcert Status: {{$user->med_cert_status ? ucwords($user->med_cert_status) : "Not yet submitted" }} </h5>

                                 <div class="text-center">
                                      @if ($user->med_cert_status != '')
                                          <img src="/user/medcert/{{$user->id}}" class="med-cert"/>
                                          <a href="/user/medcert/{{$user->id}}" target="_blank"> View full photo</a>
                                      @endif
                                                                                @if ($user->med_cert_upload_date)
                                                                                    <p>Date Uploaded: {{ $user->med_cert_upload_date }}</p>
                                                                                @endif
                                 </div>
                                 <a class="btn btn-success btn-block"href="/admin/user/approve/{{ $user->id }}">Approve</a>
                                 <a class="btn btn-danger btn-block" href="/admin/user/reject/{{$user->id}}">Reject</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Additional Information </div>
                            <div class="card-body ice-form">
                                 <div class="form-group row">
                                     <label for="ice_name" class="col-md-4 col-form-label text-md-left">{{ __('In case of emergency') }}</label>
                                     <div class="col-md-6">
                                         <input id="ice_name" type="text" class="form-control" name="ice_name" required placeholder="ex.) Juan Dela Cruz" value="{{ $user->ice_name }}" readonly>
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
                                        <input id="ice_contact_number" type="text" class="form-control" name="ice_contact_number" required placeholder="ex.) +63905694201" value="{{ $user->ice_contact_number }}" readonly>
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
                                         <textarea name="full_address" class="form-control" readonly>{{ $user->full_address }}</textarea>
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
                                         <textarea name="join_reason" class="form-control" readonly>{{ $user->join_reason }}</textarea>
                                         <small><em>Baket nga ba? </em></small>
                                                                      @error('full_address')
                                                                      <span class="invalid-feedback" role="alert">
                                                                          <strong>{{ $message }}</strong>
                                                                      </span>
                                                                  @enderror
                                     </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
