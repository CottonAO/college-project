function filter(el, ev, id = 0) {
    ev.preventDefault();

    let type = $(el).val();

    $.ajax({
        url: '/filter',
        type: 'GET',
        data: {type: type, id: id},
        success: function(res) {
            $('div#items').html(res);
        }, error: function(error) {
            console.log(error);
        }
    })
}

function ajaxForm(el, ev) {
    ev.preventDefault();

    let id = $(el).attr('id');

    $.ajax({
        url: $(el).attr('action'),
        type: $(el).attr('method'),
        data: $(el).serialize(),
        success: function(res) {
            console.log(res);
            if(res.success == 'success') window.location.href = '/';
        }, error: function(error) {
            console.log(error);
            $('form#' + id + ' div.invalid-feedback').text('');
            if(error.responseJSON.error == 'error') {
                $('form#' + id + ' input').addClass('is-invalid');
                $('form#' + id + ' div#passwordError').text('Неверный логин или пароль');
            } else {
                $('form#' + id + ' input').removeClass('is-invalid');
                $.each(error.responseJSON, function(index, value) {
                    $('form#' + id + ' div#'+index+'Error').text(value);
                    $('form#' + id + ' input#'+index+'Input').addClass('is-invalid');
                })
            }

        }
    })
}

function addToCart(el) {
    $.ajax({
        url: '/cart/add',
        type: 'GET',
        data: {id: $(el).attr('data-item')},
        success: function(res) {
            console.log(res);
        }, error: function(res) {
            console.log(res);
            if(res.responseJSON.error == 'error') {
                alert('Товар закончился!');
            }
        }
    })
}