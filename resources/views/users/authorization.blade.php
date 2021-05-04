@extends('layouts.app')
@section('content')
    @php
        $routs = $_SERVER['REQUEST_URI'] == "/users/registration";
        if ($routs){
            $act_active_text = "Зарегестрироваться";
            $act_active_href = "registration";
            $act_else_text = "Авторизоваться";
            $act_else_href = "authorization";
        }else{
            $act_active_text = "Авторизоваться";
            $act_active_href = "auth";
            $act_else_text = "Зарегестрироваться";
            $act_else_href = "registration";
        }
    @endphp
    <h2>Authorization</h2>
    <a href="{{route($act_else_href)}}">{{$act_else_text}}</a>
    <form action="{{$routs ? route('register') : route($act_active_href)}}" method="post">
        @csrf
        <label for="login">
            Введите ваше логин:
            <input type="text" id="login" name="login" placeholder="Логин...">
        </label>
        <label for="password">
            Введите ваше пароль:
            <input type="password" id="password" name="password" placeholder="Пароль...">
        </label>
        @if($routs)
            <label for="password_success">
                Введите подтверждение пароля:
                <input type="password" id="password_success" name="password_success" placeholder="Подтверждение паролья...">
            </label>
            <label for="email">
                Введите ваше e-mail:
                <input type="text" id="login" name="login" placeholder="Логин...">
            </label>
            <label for="name">
                Введите ваше пароль:
                <input type="text" id="name" name="name" placeholder="Имя...">
            </label>
        @endif
        <button type="submit">{{$act_active_text}}</button>
    </form>
@endsection

