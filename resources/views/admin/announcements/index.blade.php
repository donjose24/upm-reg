@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Create an Announcement</div>
                    <div class="card-body">
                        <form method="POST" action="/admin/announcements">
                            @csrf
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label> <br/>
                                <div class="col-md-12">
                                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"></textarea>                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Announcements</div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {!! session()->get('success')!!}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <th>Description</th>
                                <th>Date Posted</th>
                            </thead>
                            <tbody>
                                @foreach($announcements as $announcement)
                                    <tr>
                                        <td> {{ $announcement->description }} </td>
                                        <td> {{ $announcement->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $announcements->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
