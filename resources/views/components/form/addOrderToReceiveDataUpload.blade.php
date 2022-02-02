<h2 class="form-title">Форма заказа на получение выгрузки данных</h2>
<form action="{{ route('form.ordersToReceiveDataUpload.add') }}" method="post" class="form form-data-upload">
    @csrf
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="phone">Номер телефона</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="info">Информация о получаемых данных</label>
        <textarea class="form-control" id="info" name="info">{!! old('info') !!}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Отправить</button>
</form>
