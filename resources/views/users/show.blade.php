@extends('layouts.links')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            @foreach ($user->accounts as $account)
            <div class="link">
                <a href="{{ $account->link }}" data-link-id="{{ $account->id }}" class="user-link d-block p-4 mb-4 rounded h3 text-center" target="_blank" rel="nofollow" style="border:2px solid {{ $user->text_color }};color:{{ $user->text_color }}">
                    {{ $account->account_name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection