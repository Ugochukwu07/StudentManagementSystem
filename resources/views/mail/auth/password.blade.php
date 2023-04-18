@extends('layouts.mail.app')

@section('content')
    <div style="background: white; padding: 10px;">
        <h2>Dear {{ $user->name }},</h2>

        <p>We hope this email finds you well. We have received a request to reset the password for your account.</p>

        <p>To reset your password, please click on the link below:</p>

        <center>
            <a style="margin: 2rem; padding: 10px 20px; color: white; background-color: rgb(16, 62, 187); border-radius: 700px; text-decoration: none" href="{{ route('forget.password.reset', ['token' => $token]) }}">Reset Password</a>
        </center>
        <p>
            <b>
                Thanks,<br />
                {{ config('app.name') }}
            </b>
        </p>
</div>
@endsection
