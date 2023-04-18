@extends('layouts.mail.app')

@section('content')
<div style="margin: 1.5rem 0rem 2rem 0rem; background: white; margin-bottom: 20px; padding: 15px;">
    <h1>Hello, {{ $user->name }}</h1>
</div>
<center>
    <p>Welcome to Student Management System of Nnamdi Azikwe University Awka</p>
</center>
<div style="margin: 1.5rem 0rem 2rem 0rem; background: white; margin-bottom: 20px; padding: 15px;">
    <div style="background: #eeeeee; padding: 10px">
        <table>
            <tr>
                <td align="center">
                    <p><b>Name</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $user->name }}</p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p><b>Reg Number</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $user->profile->reg_number }}</p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p><b>Email</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $user->email }}</p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p><b>Phone Number</b></p>
                </td>
                <td>
                    <p style="margin-left: 9px">{{ $user->profile->phone_number }}</p>
                </td>
            </tr>
        </table>
    </div>
    <br />
@endsection
