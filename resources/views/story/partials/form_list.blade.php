<div id="form-messages" class="alert success" role="alert" style="display: none;"></div>
<form id="new_post">
    {{ csrf_field() }}

    <input type="text" class="form-control form_list__title" name="title" placeholder="Опубликовать запись" value="{{$story->title or ""}}" required>

    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
        <div class="btn-group">
            <a class="btn btn-default" data-edit="bold" title="Bold (Ctrl/Cmd+B)">Bold</a>
            <a class="btn btn-default" data-edit="italic" title="Italic (Ctrl/Cmd+I)">Italic</a>
            <a class="btn btn-default" data-edit="underline" title="Underline (Ctrl/Cmd+U)">Underline</a>
        </div>
        <div class="btn-group">
            <a class="btn btn-default" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage"/>
        </div>
    </div>

    <div id="editor" class="form_list__content"></div>

    <button type="submit" class="btn btn-primary pull-right">
        <i class="glyphicon glyphicon-send"></i>
    </button>
</form>

<script>
    $(document).ready(function () {
        // OPEN FORM
        $('.form_list__title').click(function () {
            $('.form_list__content').addClass('form_list__content--open');
        });

        // EDITOR
        $('#editor').wysiwyg({
            hotKeys: {
                'ctrl+b meta+b': 'bold',
                'ctrl+i meta+i': 'italic',
                'ctrl+u meta+u': 'underline',
            },
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

            console.log(data["content"]);
            //SEND FORM

            $.ajax({
                data: data,
                type: 'POST',
                url: '/story/create_in_list',
                DataType: 'text',
                success: function (result) {
                    alert.removeClass('alert-danger');
                    alert.addClass('alert-success');
                    alert.text(result);
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