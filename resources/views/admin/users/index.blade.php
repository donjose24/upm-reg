@extends('layouts.admin')

@section('content')
    @if (session()->has('flash_message'))
        <div class="alert alert-success">
            {!! session()->get('flash_message')!!}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/admin/users') }}" accept-class="form-inline" charset="UTF-8" role="search">
                            <div class="form-group float-left mr-2">
                                <label for="filter[application_status]">Application Status</label>
                                <select class="form-control" name="filters[application_status]">
                                    <option value="none" {{ $filters['application_status'] === "none" ? 'selected' : ''}}>----</option>
                                    <option value="active" {{ $filters['application_status'] === "active" ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{ $filters['application_status'] === "inactive" ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group float-left mr-2">
                                <label for="filter[med_cert_status]">Med Cert Status</label>
                                <select class="form-control" name="filters[med_cert_status]">
                                    <option value="none" {{ $filters['med_cert_status'] === "none" ? 'selected' : ''}} >----</option>
                                    <option value="pending" {{ $filters['med_cert_status'] === "pending" ? 'selected' : ''}}>Pending</option>
                                    <option value="approved" {{ $filters['med_cert_status'] === "approved" ? 'selected' : ''}}>Approved</option>
                                    <option value="rejected" {{ $filters['med_cert_status'] === "rejected" ? 'selected' : ''}}  >Rejected</option>
                                </select>
                            </div>
                            <div class="input-group float-right">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>First Name</th><th>Last Name</th><th>Email</th><th>Contact Number</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{ $item->email }}</td><td>{{ $item->contact_number }}</td>
                                        <td>
                                            <a href="{{ url('/admin/users/' . $item->id) }}" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
