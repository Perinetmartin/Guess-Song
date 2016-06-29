$(document).ready(function() {
    $(".btn-like").click(function()
    {
        $.get
        (
            "index.php?route=like",
            {
                id : $('.id_hidden').val()
            },
            function (data) 
            {
                console.log(data);
            },
            'text'
        );
    });

    $(".btn-dislike").click(function()
    {
        $.get
        (
            "index.php?route=dislike",
            {
                id : $('.id_hidden').val()
            },
            function (data)
            {
                console.log(data);
            },
            'text'
        );
    });
});