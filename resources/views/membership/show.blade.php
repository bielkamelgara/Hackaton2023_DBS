@extends('layouts.app')

@section('template_title')
    {{ $membership->name ?? "{{ __('Show') Membership" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Membership</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('memberships.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Payment:</strong>
                            {{ $membership->payment }}
                        </div>
                        <div class="form-group">
                            <strong>Ccn:</strong>
                            {{ $membership->ccn }}
                        </div>
                        <div class="form-group">
                            <strong>Duration:</strong>
                            {{ $membership->duration }}
                        </div>
                        <div class="form-group">
                            <strong>Id Pay:</strong>
                            {{ $membership->id_pay }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $membership->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
