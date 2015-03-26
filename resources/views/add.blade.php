@extends('template.template')

@section('content')
    <div class="panel-heading">Добавление пользователя</div>
    <div class="panel-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Внимание!</strong> Были допущены ошибки.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="/add">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">Логин:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="login" value="{{ $data->login or '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Ник:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nick" value="{{ $data->nick or '' }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Email:</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ $data->email or '' }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Сохранить</button>

                    <a class="btn btn-link" href="{{ url('/') }}">Отмена</a>
                </div>
            </div>
        </form>
    </div>
@stop