$(document).ready(function() {
    $(".btn-like").click(function () {
        $.get
        (
            "index.php?route=like",
            {
                id: $('.id_hidden').val()
            },
            function (data) {
                console.log(data);
                location.href = 'index.php?route=top';
            },
            'text'
        );
    });

    $(".btn-dislike").click(function () {
        $.get
        (
            "index.php?route=dislike",
            {
                id: $('.id_hidden').val()
            },
            function (data) {
                console.log(data);
                location.href = 'index.php?route=top';
            },
            'text'
        );
    });

    $('.bloc_camera').click(function (e) {
        e.preventDefault();
        $('.webcam').fadeIn(1000);
    });

    $('.closeWebcam').click(function () {
        $('.webcam').fadeOut(1000);
    })
});

    $(".register").click(function (e) {
        e.preventDefault();
        $('.formulaireRegister').toggle(1000);
    });

    $(".login").click(function (e) {
        e.preventDefault();
        // $('.formulaireRegister').toggle(1000);
        $('.formulaireLogin').toggle(1000);
    });



//
//     $(".login").click(function (e) {
//         $('.formulaire').remove();
//         e.preventDefault();
//         $.get
//         (
//             "index.php?route=login",
//             function (data) {
//                 console.log(data);
//                 $('.homepage').append(data);
//             },
//             'text'
//         );
//     });
//
//     $('.formualairea').on('submit', function (e) {
//         e.preventDefault();
//         $.post
//         (
//             'index.php?route=login',
//             {
//                 pseudo : $('#pseudo').val(),
//                 password : $('#password').val()
//             },
//             function (data) {
//                 console.log(data);
//                 $('.homepage').append(data);
//             },
//             'text'
//         );
//     })
// });