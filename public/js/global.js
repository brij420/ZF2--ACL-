
$(document).ready(function() {


    $('#username_err').text("");
    $('#password_err').text("");
    $('#confirm_password_err').text("");
    $('#fname_err').text("");
    $('#lname_err').text("");
    $('#email_err').text("");
    $('#name_err').text("");


    $('#add_user_form').submit(function(e) {
        is_admin_signin();
        e.preventDefault();
        if (($('#username').val() == '') || (!isAlphanumericCharachter($('#username').val())))
            $('#username_err').text("Please enter valid username!");
        else
            $('#username_err').text("");


        if (($('#fname').val() == '') || (!isAlphanumericCharachter($('#fname').val())))
            $('#fname_err').text("Please enter valid first name!");
        else
            $('#fname_err').text("");


        if (($('#lname').val() == '') || (!isAlphanumericCharachter($('#lname').val())))
            $('#lname_err').text("Please enter valid last name!");
        else
            $('#lname_err').text("");

        if (($('#email').val() == '') || (!isEmail($('#email').val())))
            $('#email_err').text("Please enter valid email!");
        else
            $('#email_err').text("");

        if (($('#password').val()).length < 8)
            $('#password_err').text("Please enter valid password!");
        else
            $('#password_err').text("");

        if ($('#password').val() !== $('#confirm_password').val())
            $('#confirm_password_err').text("confirm password does not match!");
        else
            $('#confirm_password_err').text("");

//alert((isAlphanumericCharachter($('#username').val())) +' '+ (isAlphanumericCharachter($('#fname').val()))  +' '+   (isAlphanumericCharachter($('#lname').val())  +' '+ (isEmail($('#email').val())))  +' '+  ($('#password').val() == $('#confirm_password').val())  +' '+  (($('#password').val()).length >= 8));
        if ((isAlphanumericCharachter($('#username').val())) && (isAlphanumericCharachter($('#fname').val())) && (isAlphanumericCharachter($('#lname').val()) && (isEmail($('#email').val()))) && ($('#password').val() == $('#confirm_password').val()) && (($('#password').val()).length >= 8)) {
            $.ajax({
                url: get_base_url() + '/index.php/administrator/index/add',
                type: "POST",
                dataType: "json",
                data: {userinfo: {
                        username: $('#username').val(),
                        fname: $('#fname').val(),
                        lname: $('#lname').val(),
                        email: $('#email').val(),
                        password: $('#password').val(),
                        role_id: $('#role_id').val(),
                        gender: $('input:radio[name=gender]:checked').val()
                    }
                },
                success: function(data) {
                    // $('#registration').resetForm(); // reset form

                    if (data.addUser.successCode == "000") {
                        window.location.href = get_base_url() + '/index.php/administrator/index';
                        return false;
                    }

                    if (data.addUser.successCode != "000") {
                        $('#msg').html(data.addUser.successMessage);
                        return false;
                    }

                }
            });
            return false;
        }
        return false;

    });

    $('#edit_user_form').submit(function(e) {
        is_admin_signin();
        e.preventDefault();
        if (($('#username').val() == '') || (!isAlphanumericCharachter($('#username').val())))
            $('#username_err').text("Please enter valid username!");
        else
            $('#username_err').text("");


        if (($('#fname').val() == '') || (!isAlphanumericCharachter($('#fname').val())))
            $('#fname_err').text("Please enter valid first name!");
        else
            $('#fname_err').text("");


        if (($('#lname').val() == '') || (!isAlphanumericCharachter($('#lname').val())))
            $('#lname_err').text("Please enter valid last name!");
        else
            $('#lname_err').text("");

        if (($('#email').val() == '') || (!isEmail($('#email').val())))
            $('#email_err').text("Please enter valid email!");
        else
            $('#email_err').text("");

        if (($('#password').val()).length < 8)
            $('#password_err').text("Please enter valid password!");
        else
            $('#password_err').text("");

        if ($('#password').val() !== $('#confirm_password').val())
            $('#confirm_password_err').text("confirm password does not match!");
        else
            $('#confirm_password_err').text("");

//alert((isAlphanumericCharachter($('#username').val())) +' '+ (isAlphanumericCharachter($('#fname').val()))  +' '+   (isAlphanumericCharachter($('#lname').val())  +' '+ (isEmail($('#email').val())))  +' '+  ($('#password').val() == $('#confirm_password').val())  +' '+  (($('#password').val()).length >= 8));
        if ((isAlphanumericCharachter($('#username').val())) && (isAlphanumericCharachter($('#fname').val())) && (isAlphanumericCharachter($('#lname').val()) && (isEmail($('#email').val()))) && ($('#password').val() == $('#confirm_password').val()) && (($('#password').val()).length >= 8)) {
            $.ajax({
                url: get_base_url() + '/index.php/administrator/index/edit',
                type: "POST",
                dataType: "json",
                data: {userinfo: {
                        id: $('#id').val(),
                        username: $('#username').val(),
                        fname: $('#fname').val(),
                        lname: $('#lname').val(),
                        email: $('#email').val(),
                        password: $('#password').val(),
                        role_id: $('#role_id').val(),
                        gender: $('input:radio[name=gender]:checked').val()
                    }
                },
                success: function(data) {

                    if (data.editUser.successCode == "000") {
                        window.location.href = get_base_url() + '/index.php/administrator/index';
                        return false;
                    }

                    if (data.editUser.successCode != "000") {
                        $('#msg').html(data.editUser.successMessage);
                        return false;
                    }

                }
            });
            return false;
        }
        return false;

    });

    $('#add_role_form').submit(function(e) {
        is_admin_signin();
        e.preventDefault();
        if (($('#name').val() == '') || (!isAlphanumericCharachter($('#name').val())))
            $('#name_err').text("Please enter valid role!");
        else
            $('#name_err').text("");




//alert((isAlphanumericCharachter($('#username').val())) +' '+ (isAlphanumericCharachter($('#fname').val()))  +' '+   (isAlphanumericCharachter($('#lname').val())  +' '+ (isEmail($('#email').val())))  +' '+  ($('#password').val() == $('#confirm_password').val())  +' '+  (($('#password').val()).length >= 8));
        if (isAlphanumericCharachter($('#name').val())) {
            $.ajax({
                url: get_base_url() + '/index.php/administrator/role/add',
                type: "POST",
                dataType: "json",
                data: {roleinfo: {
                        name: $('#name').val()
                    }
                },
                success: function(data) {
                    // $('#registration').resetForm(); // reset form

                    if (data.addRole.successCode == "000") {
                        window.location.href = get_base_url() + '/index.php/administrator/role';
                        return false;
                    }

                    if (data.addRole.successCode != "000") {
                        $('#msg').html(data.addRole.successMessage);
                        return false;
                    }

                }
            });
            return false;
        }
        return false;

    });

    $('#edit_role_form').submit(function(e) {
        is_admin_signin();
        e.preventDefault();
        if (($('#name').val() == '') || (!isAlphanumericCharachter($('#name').val())))
            $('#name_err').text("Please enter valid role!");
        else
            $('#name_err').text("");



//alert((isAlphanumericCharachter($('#username').val())) +' '+ (isAlphanumericCharachter($('#fname').val()))  +' '+   (isAlphanumericCharachter($('#lname').val())  +' '+ (isEmail($('#email').val())))  +' '+  ($('#password').val() == $('#confirm_password').val())  +' '+  (($('#password').val()).length >= 8));
        if (isAlphanumericCharachter($('#name').val())) {
            $.ajax({
                url: get_base_url() + '/index.php/administrator/role/edit',
                type: "POST",
                dataType: "json",
                data: {roleinfo: {
                        id: $('#id').val(),
                        name: $('#name').val()
                    }
                },
                success: function(data) {

                    if (data.editRole.successCode == "000") {
                        window.location.href = get_base_url() + '/index.php/administrator/role';
                        return false;
                    }

                    if (data.editRole.successCode != "000") {
                        $('#msg').html(data.editRole.successMessage);
                        return false;
                    }

                }
            });
            return false;
        }
        return false;

    });




    function user_role() {
        is_admin_signin();
        $('#role_id').empty();
        $.ajax({
            url: get_base_url() + '/index.php/administrator/role/getRole',
            type: "POST",
            dataType: "json",
            success: function(data) {

                var str = '';

                if ($('#role_id').val())
                    str += '<option value="select" >select</option>';
                else
                    str += '<option value="select" select= "select" >select</option>';
                for (var i = 0; i < data.roles.length; i++) {
                    if ($('#cat_id').val() == data.roles[i].id)
                        str += '<option value="' + data.roles[i].id + '" selected= "selected">' + data.roles[i].name + '</option>';
                    else
                        str += '<option value="' + data.roles[i].id + '">' + data.roles[i].name + '</option>';
                }
                $('#role_id').html(str);
            }
        });
        return false;


    }
    $('#signin').submit(function(e) {
        e.preventDefault();
        if (($('#username').val() == '') || (!isAlphanumericCharachter($('#username').val())))
            $('#username_err').text("Please enter valid username!");
        else
            $('#username_err').text("");


        if (($('#password').val()).length < 8)
            $('#password_err').text("Please enter valid password!");
        else
            $('#password_err').text("");



        if ((isAlphanumericCharachter($('#username').val())) && (($('#password').val()).length >= 8)) {
            $.ajax({
                url: get_base_url() + '/index.php/administrator/index/index',
                type: "POST",
                dataType: "json",
                data: {signin: {
                        username: $('#username').val(),
                        password: $('#password').val()
                    }
                },
                success: function(data) {


                    if (data.signin.successCode == "000") {
                        window.location.href = get_base_url() + '/index.php/administrator/index/index';
                        return false;
                    }
                    if (data.signin.successCode != "000") {
                        $('#msg').text(data.signin.successMessage);
                        return false;
                    }

                }
            });
            return false;
        }
        return false;

    });



    $('#admin_cancel').click(function() {
        window.location.href = get_base_url() + '/index.php/administrator/index';
        return false;
    });


});

function isAlphanumericCharachter(str) {
    if (str != null)
        var valid = str.match(/^[a-zA-Z0-9]+[-_,a-zA-Z0-9\s]*$/);
    if (valid) {
        return true;
    } else {
        return false;
    }
}

function isNumeric(str) {
    if (str != null)
        var valid = str.match(/^[0-9]+$/);
    if (valid) {
        return true;
    } else {
        return false;
    }
}
function isEmail(str) {
    if (str != null)
        var valid = str.match(/^([a-z0-9][-a-z0-9_\+\.]*[a-z0-9])@([a-z0-9][-a-z0-9\.]*[a-z0-9]\.(arpa|root|aero|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|ee|eg|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|([0-9]{1,3}\.{3}[0-9]{1,3}))$/);
    if (valid) {
        return true;
    } else {
        return false;
    }
}


function is_admin_signin() {
    $(document).ready(function() {
        $.ajax({
            url: get_base_url() + '/index.php/administrator/index/isAdminSignin',
            type: "POST",
            dataType: "json",
            success: function(data) {
                if (data.isAdminSignin.successCode != "000") {
                    alert(data.isAdminSignin.successMessage);
                    window.location.href = get_base_url() + '/index.php/administrator/index/index';
                    return false;
                }
                return false;
            }
        });
    });
    return false;
}

