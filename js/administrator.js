$(function () {
    'use strict';
    /** After clicking on one of list elements redirect to edit form **/
    $('.adminList').on('click', function (e) {
        if (e.target.getAttribute('data') == null) {
            window.location.href = "http://localhost/theschool/administration/" + e.target.parentNode.getAttribute('data') + "/edit";
        } else {
            window.location.href = "http://localhost/theschool/administration/" + e.target.getAttribute('data') + "/edit";
        }
    });

    /** button create new administrator redirect to create form of administrator **/
    $('.btnAddAdmin').on('click', function () {
        window.location.href = "http://localhost/theschool/administration/create";
    });

    /** button delete administrator, after confirm redirect to delete page of administrator**/
     $('.btnDelete').on('click', function (e) {
        if (confirm("Are you sure you want delete?")) {
            window.location.href = "http://localhost/theschool/administration/" + e.target.getAttribute('data') + '/delete';
        }
    });

    /** button save/edit administrator, call validation function**/
     $('.btnSave').on('click', function () {
        validateForm($(this).attr('value'));
    });

     /** button choose file, call function to check image validation and preview it **/
     $('.file').on('change', function () {
         previewFileAndCheckErrors();
     });

    /** Validate administrator form inputs **/
    function validateForm(btnName) {
        // FORM inputs
        var form = {
            f: document.forms.f,
            name: f.administrator_name.value,
            phone: f.administrator_phone.value,
            email: f.administrator_email.value,
            password: f.administrator_password.value,
            role: f.administrator_role.value
        };

        var errBool = false;
        var errArray = [];
        var imgErr = previewFileAndCheckErrors();

        // inputs validation.

        // validate name input.
        if (form.name.trim() == '') {
            errArray.push("Name");
            errBool = true;
        }
        // validate phone with function that use regular expression.
        if (!validatePhoneNumber(form.phone.trim())) {
            errArray.push("Phone");
            errBool = true;
        }
        // validate mail with function that use regular expression.
        if (!validateEmail(form.email.trim())) {
            errArray.push("Email");
            errBool = true;
        }
        // validate password input.
        if(btnName == "Create"){
            if (form.password.trim() == '') {
                errArray.push("Password");
                errBool = true;
            }
        }
        // validate selection input
        if (form.role == "empty") {
            errArray.push("Role");
            errBool = true;
        }
        // validate image
        if (imgErr.length > 0) {
            errArray.push(imgErr);
            errBool = true;
        }
        // errBool = false; Yaniv user it for check php validation
        if (!errBool) {
            // no validation errors.
            form.f.method = 'post';
            if (btnName == 'Create') {
                form.f.action = "administration/create";
               form.f.submit();
            } else if(btnName == "Edit") {
                form.f.action = window.location;
                form.f.submit();
            }
        }
        // there are validation errors.
        else {
            // dump errors
            dumpErrors(errArray.join(', '));
        }
    }

    /**
     validate number +972039660060 or 039660060 or 0544444444
     **/
    function validatePhoneNumber(num) {
        var phoneno = /^\+?(972|0)(\-)?0?(([23489]{1}\d{7})|[5]{1}\d{8})$/;
        if (num.match(phoneno)) {
            return true;
        }
        else {
            return false;
        }
    }

    /**        validate email     **/
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    /** Thumbnail of image with checking format size resolution of image
     *  function return string errors else empty string **/
    function previewFileAndCheckErrors() {
        var preview = document.querySelector('form img');
        var reader = new FileReader();
        var error = [];
        var filePath = document.querySelector('input[type=file]');
        var file = filePath.files[0];
        var fileSizeSupported = 5000000;
        var imageSupported = ['jpeg', 'jpg', 'gif', 'png'];

        //clean image resolution error
        $(".errorImageResolution").text('');
        // if file exist
        if (file) {
            var fileSize = file.size;
            var imageType = filePath.value.substring(filePath.value.lastIndexOf('.') + 1).toLowerCase();

            /** check image format supported **/
            if ((imageSupported.indexOf(imageType)) == -1) {
                //console.log("image format not supported");
                error.push("Image format not supported");
            }
            /** check image size supported **/
            if (fileSize < fileSizeSupported) {
                reader.onloadend = function (e) {
                    var base64 = e.target.result;
                    var image = new Image();
                    image.src = base64;

                    /** check image resolution **/
                    image.onload = function () {
                        if (this.width > 2048 || this.height > 1152) {
                            // alert("Allow resolution 2048x1152!\n Your image width is " + this.width + " and image height is " + this.height);
                            //console.log("image resolution must be 2048x1152");
                            $(".errorImageResolution").text("ERROR: image resolution must be MAX 2048x1152");
                        }
                    };
                    preview.src = reader.result;
                };
                if(file) {
                    reader.readAsDataURL(file);
                }else {
                    preview.src = "";
                }
            }else {
                error.push("Image size too big");
                //console.log("image size too big");
            }
        }
        return error.join(', ');
    }

    /** print errors **/
    function dumpErrors(str) {
        // get error container to dump errors messages.
        var er = $(".error");
        // clean errors.
        er.text('');
        // dump errors.
        er.text('ERROR: ' + str);
    }
});

