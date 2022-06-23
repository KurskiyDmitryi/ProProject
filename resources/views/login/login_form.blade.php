@extends('layout.app')
@section('title','Login')
@section('content')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Вход</h1>

            <form method="POST" action="">
                @csrf
                <label for="email">Email</label>
                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email" />
                @error('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror
                <label for="password">Password</label>
                <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Пароль" />
                @error('password')
                <p class="text-red-500">{{$message}}</p>
                @enderror
                <div>
                    <a href="#" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Забыли пароль?</a>
                </div>

                <div>
                    <a href="{{route('registration_form')}}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Регистрация</a>
                </div>

                <button type="submit" class="btn btn-danger">Войти</button>
            </form>
        </div>
    </div>
@endsection

