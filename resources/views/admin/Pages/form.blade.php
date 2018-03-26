
<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{$page->title}}" required>
<label for="">Url</label>
<input type="text" class="form-control" name="slug" placeholder="Заголовок категории" value="{{$page->slug}}" required>
<label for="">Публикация</label>
<input type="text" class="form-control" name="published" placeholder="Заголовок категории" value="{{$page->published}}" required>
<input type="text" class="form-control" name="created_at" placeholder="Заголовок категории" value="{{$page->created_at}}" required>
<input type="text" class="form-control" name="updated_at" placeholder="Заголовок категории" value="{{$page->updated_at}}" required>
<label for="">Описание</label>
<textarea class="form-control" name="content" placeholder="Текст страницы">{{$page->content}}</textarea>
<button type="submit" class="btn btn-primary">Сохранить</button>
