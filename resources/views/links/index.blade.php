@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title">Your Accounts</h2>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Visits</th>
                            <th>Last Visit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                        <tr>
                            <td>{{ $account->institution_name }}</td>
                            <td><a href="{{ $account->link }}">{{ $account->link }}</a></td>
                            <td>{{ $account->visits_count }}</td>
                            <td>{{ $account->latestVisit ? $account->latestVisit->created_at->format('M j Y - H:ia') : 'N/A' }}
                            </td>
                            <td><a href="/dashboard/links/{{ $account->id }}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/dashboard/links/new" class="btn btn-primary">Add Account</a>
            </div>
        </div>
    </div>
</div>
@endsection