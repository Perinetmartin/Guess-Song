$('.launchMic').click(function () {
    $.get(
        'Views/micro.php',
        function (data) {
            console.log(data);
            $('body').html(data);
            setup();
        }
    )
});
