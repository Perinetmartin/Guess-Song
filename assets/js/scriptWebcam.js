$(function () {
    // Initialize the jQuery File Upload widget
    $('#fileupload').fileupload({
        url: 'index.php?route=uploadWebcam',
        done: function (e, data) {
            $.each(data.files, function (index, file) {
            });
        }
    });
});

// setup videojs-record
var player = videojs("myVideo",
    {
        // video.js options
        controls: true,
        loop: false,
        width: 900,
        height: 700,
        plugins: {
            // videojs-record plugin options
            record: {
                image: false,
                audio: true,
                video: true,
                maxLength: 10,
                debug: true
            }
        }
    });
// player error handling
player.on('deviceError', function()
{
    console.warn('device error:', player.deviceErrorCode);
});
player.on('error', function(error)
{
    console.log('error:', error);
});
// data is available
player.on('finishRecord', function()
{
    // the blob object contains the audio data
    var videoFile = player.recordedData.video;
    // upload data to server
    var filesList = [videoFile];
//            uploader.addFiles(filesList);
//            console.log(JSON.stringify(filesList));
    $('#fileupload').fileupload('add', {files: filesList});
});