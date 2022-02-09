<h2>Привет, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h2>
@include('inc.message')
@if(\Illuminate\Support\Facades\Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}" style="color: red">В админку</a>
    <br>
@endif
<a href="{{ route('account.edit') }}">Изменить данные аккаунта</a>
<br>
<a href="{{ route('logout') }}">Выход</a>
