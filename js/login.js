$(function () {
    'use strict';

    $('.btrSubmit').on('click', function () {
        var form = {
            f: document.forms.f,
            mail:f.userEmail.value,
            password:f.userPwd.value
        };

        validateForm(form);
    });


    function validateForm(form) {
        var errArray = [];
        var mail = form.mail.trim();
        var pwd = form.password.trim();

        //error div.
        var $err = $('.error');
        //clean errors.
        $err.text('');
        //validation mail
        if(mail == "") {
            errArray.push('Mail');
        }
        //validation password
        if(pwd == '') {
            errArray.push('Password');
        }
        //check if there are errors.
        if(errArray.length > 0)
        {
            //dump errors
            $err.text('Error missing: ' + errArray.join(', '));
        }
        //there no errors submit form and redirect.
        else {
            form.f.action = 'login';
            form.f.method = 'post';
            form.f.submit();
        }
    }

});

