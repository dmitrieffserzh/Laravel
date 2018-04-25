<div id="form-messages" class="alert success" role="alert" style="display: none;"></div>
<form id="form_list" class="form-horizontal">
    {{ csrf_field() }}

    <input type="text" class="form-control form_list__title" name="title" placeholder="Опубликовать запись"
           value="{{$category->title or ""}}" required>
    <textarea type="text" class="form-control form_list__content" name="content" placeholder=""
              value="{{$category->description or ""}}" required></textarea>
    <button type="submit" class="btn btn-primary pull-right">
        <i class="glyphicon glyphicon-send"></i>
    </button>

</form>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#form_list').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/story/create_in_list',
                data: $('#form_list').serialize(),
                success: function (result) {

                    // setTimeout(function () {
                    //     location.reload();
                    // }, 5000)
                }
            })
                .done(function (response) {
                    // Make sure that the formMessages div has the 'success' class.
                    $('#form-messages').removeClass('alert-danger');
                    $('#form-messages').addClass('alert-success');

                    // Set the message text.
                    $('#form-messages').text('Ок');

                    $('#form-messages').show();
                })
                .fail(function (data) {
                    // Make sure that the formMessages div has the 'error' class.
                    $('#form-messages').removeClass('alert-success');
                    $('#form-messages').addClass('alert-danger');
                    $('#form-messages').text('Error');
                });

        });


        $('.form_list__title').click(function () {
            $('.form_list__content').addClass('form_list__content--open');
        });

        $('.form_list__content').summernote({
            toolbar: [
                ['insert', ['link', 'picture', 'video']],
            ],
            callbacks: {
                onImageUpload: function (files) {
                    var el = $(this);
                    sendFile(files[0], el);
                }
            }
        });

        function sendFile(file, el) {
            var data = new FormData();
            data.append("file", file);
            var url = '{{ route('upload') }}';
            $.ajax({
                data: data,
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function (url2) {
                    el.summernote('insertImage', url2);
                }
            });
        }


    })
    ;
</script>