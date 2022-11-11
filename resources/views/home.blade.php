@extends('layouts.panelBasic')
@section('title', 'home')

@section('content')

<div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">{{ __($titulo) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
</div>
@endsection
