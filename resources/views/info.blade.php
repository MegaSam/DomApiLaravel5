@extends('template.template')

@section('content')
    <div class="panel-heading">Информация о пользователе <b>{{ $user->login }}</b></div>
    <div class="panel-body">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <th>Login</th>
                <td>{{ $user->login }}</td>
            </tr>
            <tr>
                <th>Nick</th>
                <td>{{ $user->nick }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr align="right">
                <td colspan="2">
                    <a class="btn btn-link" href="{{ url('/') }}">Назад</a>
                </td>
            </tr>
        </table>
    </div>
@stop