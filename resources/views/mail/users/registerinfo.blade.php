@component('mail::message')

    Информация о регистрации:
        Логин: {{ $name }}
        Email: {{ $email }}
        Пароль: {{ $password }}

@endcomponent
