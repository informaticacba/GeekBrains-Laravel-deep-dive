<h2 class="form-title">Форма обратной связи</h2>
<form action="{{ route('form.feedbacks.add') }}" method="post" class="form form-feedback">
    @csrf
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="comment">Комментарий</label>
        <textarea class="form-control" id="comment" name="comment">{!! old('comment') !!}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Отправить</button>
</form>
