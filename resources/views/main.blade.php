@extends('template.template')

@section('content')
    <div class="panel-heading">Пользовательские данные
        @if (isset($message) && $message != '')
            <div class="message">{{ $message }}</div>
        @endif
    </div>
    <div class="panel-body">
        @if(isset($myusers) && count($myusers))
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th>Id</th>
                    <th>Login</th>
                    <th>Nick</th>
                    <th>Email</th>
                    <th>Инфо</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                @foreach($myusers as $myuser)
                <tr>
                    <td align="center">{{ $myuser->id }}</td>
                    <td>{{ $myuser->login }}</td>
                    <td>{{ $myuser->nick }}</td>
                    <td>{{ $myuser->email }}</td>
                    <td align="center"><a href="info/{{ $myuser->id }}">инфо</a></td>
                    <td align="center"><a href="edit/{{ $myuser->id }}">редактировать</a></td>
                    <td align="center"><a href="delete/{{ $myuser->id }}">удалить</a></td>
                </tr>
                @endforeach
                <tr align="right">
                    <td colspan="7">
                        <a class="btn btn-link" href="{{ url('/add') }}">Создать пользователя</a>
                    </td>
                </tr>
            </table>
        @else
            <b>Список пользователей пуст</b>
        @endif
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.panel-body').on('click', 'a[href*="delete"]', function(){
                if (confirm("Вы уверены, что хотите удалить этого пользователя?"))
                    return true;
                else
                    return false;
            });
            $('.message').delay(2000).fadeOut(400);
        });
    </script>
@stop