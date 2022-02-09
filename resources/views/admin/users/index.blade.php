@extends('layouts.admin')
@section('title')
    Список пользователей @parent
@stop
@section('header')
    <h1 class="h2">Список пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.users.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить пользователя</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Пароль</th>
                <th>Токен</th>
                <th>Дата последнего входа</th>
                <th>Администратор</th>
                <th>Дата добавления</th>
                <th>Дата изменения</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->remember_token }}</td>
                    <td>{{ $user->last_login_at }}</td>
                    <td>@if ($user->is_admin) Да @else Нет @endif</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Редактировать</a><br>
                        <a href="javascript:" class="delete" rel="{{ $user->id }}">Удалить</a>
                    </td>
                </tr>
            @empty
                Пользователей нет
            @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush
