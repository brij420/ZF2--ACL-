$(document).ready(function() {
    file_upload();
});
function file_upload() {

    $(function() {
        var btnUpload = $('#upload');
        var status = $('#status');
        new AjaxUpload(btnUpload, {
            action: get_base_url() + 'index.php/user/upload_file',
            name: 'uploadfile',
            onSubmit: function(file, ext) {
                if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                    // extension is not allowed 
                    status.text('Only JPG, PNG or GIF files are allowed');
                    return false;
                }
                status.text('Uploading...');
            },
            onComplete: function(file) {

                if (file != '') {
                    $('#image_name').val($('#image_name').val() + ',' + file);
                    $('<li></li>').appendTo('#files').html('<img style="width:100px;height:100px;" src="' + get_base_url() + 'uploads/' + file + '" alt="" /><br />').addClass('success');
                } else {
                    $('<li></li>').appendTo('#files').text(file).addClass('error');
                }
            }
        });

    });

}



function image_upload() {

    $(function() {
        var btnUpload = $('#upload');
        var status = $('#status');
        new AjaxUpload(btnUpload, {
            action: get_base_url() + 'index.php/image/upload_file',
            name: 'uploadfile',
            onSubmit: function(file, ext) {
                if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                    // extension is not allowed 
                    status.text('Only JPG, PNG or GIF files are allowed');
                    return false;
                }
                status.text('Uploading...');
            },
            onComplete: function(file) {

                if (file != '') {
                    $('#image_name').val($('#image_name').val() + ',' + file);
                    $('<li></li>').appendTo('#files').html('<img style="width:100px;height:100px;" src="' + get_base_url() + 'uploads/' + file + '" alt="" /><br />').addClass('success');
                } else {
                    $('<li></li>').appendTo('#files').text(file).addClass('error');
                }
            }
        });

    });

}