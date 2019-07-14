var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$('.love-react').click(function () {
    let id = $(this).attr('id'), ip = GetUserIP();
    let clas = $(this);
    if ($('.love-react-icon', this).hasClass("fa-heart-o")) {
        $.ajax({
            url: 'add-love-react',
            type: 'post',
            data: {_token: CSRF_TOKEN, id: id, ip: ip},
        });
        $.ajax({
            url: 'love-react',
            type: 'get',
            data: {id: id,},
            success: function (response) {
                var exploded = response.split(',');
                $('.love-react-icon', clas).toggleClass('fa-heart-o fa-heart');
                $('.love-react-count', clas).html(exploded.length - 1);
            }
        });
    } else {
        $.ajax({
            url: 'remove-love-react',
            type: 'post',
            data: {_token: CSRF_TOKEN, id: id, ip: ip},
        });
        $.ajax({
            url: 'love-react',
            type: 'get',
            data: {id: id,},
            success: function (response) {
                var exploded = response.split(',');
                $('.love-react-icon', clas).toggleClass('fa-heart fa-heart-o');
                $('.love-react-count', clas).html(exploded.length - 1);
            }
        });
    }
});

$(document).ready(function() {
    $('.js-example-basic-single').select2({
        placeholder: "Start select option",
        allowClear: true,
        theme: "bootstrap",
        width:'100%'
    });
});

$(document).ready(function () {
    $('.love-react').each(function () {
        let id = $(this).attr('id');
        let clas = $(this);
        $.ajax({
            url: 'love-react',
            type: 'get',
            data: {id: id,},
            success: function (response) {
                var exploded = response.split(',');
                if (exploded.includes(GetUserIP())) {
                    $('.love-react-icon', clas).toggleClass('fa-heart-o fa-heart');
                    $('.love-react-count', clas).html(exploded.length - 1);
                }
            }
        });
    });
});


function GetUserIP() {
    var ret_ip;
    $.ajaxSetup({async: false});
    $.get('https://api.ipify.org/?format=json', function (r) {
        ret_ip = r.ip;
    });
    return ret_ip;
}