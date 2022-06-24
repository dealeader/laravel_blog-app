@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите свой Email-адрес') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ссылка для подтверждения отправлена на вашу почту.') }}
                        </div>
                    @endif

                    {{ __('Для продолжения подтвердите адрес электронной почты') }}
                    {{ __('Если вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь для повторной отправки') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
