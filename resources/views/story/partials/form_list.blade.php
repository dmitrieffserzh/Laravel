@push('custom-scripts')
    <script src="{{ asset('js/jqHotkeys.js') }}"></script>
    <script src="{{ asset('js/bootstrap-wysiwyg.js') }}"></script>
@endpush

<div id="form-messages" class="alert success" role="alert" style="display: none;"></div>
<form id="new_post">
    {{ csrf_field() }}

    <div class="editor_box">
        <input type="text" class="form-control form_list__title" name="title" placeholder="Опубликовать запись" value="{{$story->title or ""}}">
        <div id="editor" class="editor_box__textarea">{{$story->content or ""}}</div>

        <div class="btn-toolbar editor_box__toolbar" data-role="editor-toolbar" data-target="#editor">
            <div class="btn-group">
                <a class="btn btn-default" data-edit="bold" title="Выделить жирным (Ctrl/Cmd+B)"><i class="glyphicon glyphicon-bold" aria-hidden="true"></i></a>
                <a class="btn btn-default" data-edit="italic" title="Наклонный (Ctrl/Cmd+I)"><i class="glyphicon glyphicon-italic" aria-hidden="true"></i></a>
                <a class="btn btn-default" data-edit="underline" title="Подчеркнуть (Ctrl/Cmd+U)"><i class="glyphicon glyphicon-text-color" aria-hidden="true"></i></a>
            </div>

            <div class="btn-group dropup" role="group">
                <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" title="Вставить ссылку" data-original-title="Hyperlink"><i class="glyphicon glyphicon-link" aria-hidden="true"></i></a>
                <div class="dropdown-menu input-append">
                    <input class="span2" placeholder="URL" type="text" data-edit="createLink">
                    <button class="btn" type="button"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>
                </div>
                <a class="btn btn-default" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>
            </div>

            <div class="btn-group">
                <a class="btn btn-image" title="" id="pictureBtn" data-original-title="Insert picture (or just drag &amp; drop)"><i class="glyphicon glyphicon-picture" aria-hidden="true"></i></a>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 37px; height: 30px;">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">
        <i class="glyphicon glyphicon-send"></i>
    </button>
</form>

<script>
    $(document).ready(function () {
        // OPEN FORM
        $('.form_list__title').click(function () {
            $('.editor_box').addClass('editor_box--open');
        });

        // EDITOR
        $('#editor').wysiwyg({
            hotKeys: {
                'ctrl+b meta+b': 'bold',
                'ctrl+i meta+i': 'italic',
                'ctrl+u meta+u': 'underline',
            }
        });

        // FORM
        $('#new_post').submit(function (event) {

            var alert = $('#form-messages');
            var data_array = $(this).serializeArray();
            var data = {};

            data_array.forEach(function (item) {
                data[item.name] = item.value;
            });

            data["content"] = $('#editor').cleanHtml();

            //SEND FORM
            $.ajax({
                data: data,
                type: 'POST',
                url: '/story/create_in_list',
                DataType: 'text',
                success: function (result) {
                    alert.removeClass('alert-danger');
                    alert.addClass('alert-success');
                    alert.text(
                        result.error.customMessages.title.required,
                        result.error.customMessages.title.min
                    );
                    alert.show();
                     setTimeout(function () {
                         alert.hide();
                         //location.reload();
                     }, 5000)
                },
                error: function (result) {
                    alert.removeClass('alert-success');
                    alert.addClass('alert-danger');
                    alert.text(result);
                    alert.show();
                     setTimeout(function () {
                         alert.hide();
                     }, 5000)
                }
            });
            event.preventDefault();
        });
    });
</script>