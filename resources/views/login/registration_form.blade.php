@extends('layout.app')
@section('title' , 'Register')
@section('content')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Регистрация</h1>

            <form class="space-y-5 mt-5" name="register_form" method="POST">
                @csrf
                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3"
                       placeholder="Name"/>
                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3"
                       placeholder="Email"/>
                <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3"
                       placeholder="Пароль"/>
                <input name="password_confirmation" type="password"
                       class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Подтверждение пароля"/>
                <div>
                    <a href="{{route('login')}}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Есть
                        аккаунт?</a>
                </div>

                <button type="submit" class="btn btn-primary" id="register_button">Зарегистрироваться</button>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '#register_button', function () {
                var oldForm = document.forms.register_form;
                var formData = new FormData(oldForm);

                var response = $.ajax({
                    type: 'POST',
                    url: "{{ url('register_process')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) { successFunction(data); },
                    error: function (jqXHR, textStatus, errorThrown) { errorFunction(); }
                });
                // response.done(function (result) {
                //         })
                    });

                });

    </script>
@endpush
