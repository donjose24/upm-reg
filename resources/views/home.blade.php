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
                                <div class="form-group row mt-5">
                                    <div class="col-md-6">
                                        First Name:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->first_name }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        Last Name:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->last_name }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        Email Address:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ Auth::user()->email }}</b>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        Application Status:
                                    </div>
                                    <div class="col-md-6">
                                        <b>{{ ucwords(Auth::user()->application_status) }}</b>
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
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Medical Certificate</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ( in_array(Auth::user()->med_cert_status, ['pending', '', 'rejected']) )
                            <h4>Medcert Status: <small>{{Auth::user()->med_cert_status ? Auth::user()->med_cert_status : "Not yet submitted" }} </small></h4>

                            @if (Auth::user()->med_cert_status != '')
                                <img src="/user/medcert/{{Auth::user()->id}}" class="med-cert"/>
                                <a href="/user/medcert/{{Auth::user()->id}}" target="_blank"> View full photo</a>
                            @endif
                            <br/>
                            <br/>
                            <form method="POST" action="{{ route('upload') }}" enctype=multipart/form-data class="update-form">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control-file" name="med_cert">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload / Update Medical Certificate') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
