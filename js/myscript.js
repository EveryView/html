$(document).ready(function () {

    $('#login').keyup(function () {

        var url = "http://" + window.location.hostname + "/isUserLogin.php" + "?login=" + $('#login').val();

        if ($('#login').val().length > 0) {

            $.ajax(

                {

                    type: "get",

                    url: url,

                    error: function () {

                    },

                    success: function (data) {

                        if (data == "0") {

                            $('#login_icon-ok').css('visibility', 'visible');

                            $('#login_icon-ok').css('width', '14px');

                            $('#login_icon-remove').css('visibility', 'hidden');


                            $('#login_icon-remove').css('width', '0px');

                        } else {

                            $('#login_icon-remove').css('visibility', 'visible');

                            $('#login_icon-remove').css('width', '14px');

                            $('#login_icon-ok').css('visibility', 'hidden');

                            $('#login_icon-ok').css('width', '0px');

                        }

                    }

                })

        } else {

            $('#login_icon-ok').css('visibility', 'hidden');

            $('#login_icon-remove').css('visibility', 'hidden');

        }

    })
    $('#pass').keyup(function () {
        if($('#pass').val().length > 0){
        $('#pass_icon').css('visibility', 'visible');
        }else{
            $('#pass_icon').css('visibility', 'hidden');
        }
    })

    $('#retryPass').keyup(function () {

        if ($('#retryPass').val() === $('#pass').val()) {

            $('#pass_icon-ok').css('visibility', 'visible');

            $('#pass_icon-ok').css('width', '14px');

            $('#pass_icon-remove').css('visibility', 'hidden');

            $('#pass_icon-remove').css('width', '0px');

        } else {

            $('#pass_icon-remove').css('visibility', 'visible');

            $('#pass_icon-remove').css('width', '14px');

            $('#pass_icon-ok').css('visibility', 'hidden');

            $('#pass_icon-ok').css('width', '0px');

        }

    })

    $('#userForm').submit(function () {

        if ($('#login_icon-ok').css('visibility') != 'visible') {

            alert("Incorrect login");

            return false;

        }

        if (($('#retryPass').val() != $('#pass').val())

            || $('#retryPass').val().length == 0) {

            alert("Incorrect password");

            return false;

        }

        return true;

    });

});