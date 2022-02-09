@include('inc.message')
<form action="{{ route('account.update', ['user' => $user]) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>
    <div class="form-group">
        <label for="password">Текущий пароль</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="new_password">Пароль</label>
        <input type="password" class="form-control" id="new_password" name="new_password">
    </div>
    <div class="form-group">
        <label for="new_password_confirmation">Подтверждение пароля</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
    </div>
    <div class="form-group">
        <label for="is_admin">Администратор</label>
        <select class="form-control" id="is_admin" name="is_admin">
            <option @if($user->is_admin == true) selected @endif value=1>Да</option>
            <option @if($user->is_admin == false) selected @endif value=0>Нет</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
</form>
