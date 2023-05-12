@extends('layouts.user_type.auth')

@section('content')

<div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4" style="margin-left:180px">
        <div class="card">
            <div class="card-header pb-0">
                <h3>{{ $analytics->domain_url }}</h3>
            </div>
            <div class="card-body px-0 pb-2">
                <p>Domain rank: {{ $analytics->domain_rank }}</p>
                <p>Domain authority: {{ $analytics->domain_auth }}</p>
                <p>CTR score: {{ $analytics->ctr_scope }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
