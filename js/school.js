$((function () {
    'use strict';
    /** After clicking on one of courses redirect to course details page **/
    $('.coursesList').on('click', function (e) {
        if (e.target.getAttribute('data') == null) {
            window.location.href = "http://localhost/theschool/school/courses/" + e.target.parentNode.getAttribute('data');
        } else {
            window.location.href = "http://localhost/theschool/school/courses/" + e.target.getAttribute('data');
        }
    });

    /** After clicking on one of students redirect to student details page **/
    $('.studentsList').on('click', function (e) {
        if (e.target.getAttribute('data') == null) {
            window.location.href = "http://localhost/theschool/school/students/" + e.target.parentNode.getAttribute('data');
        } else {
            window.location.href = "http://localhost/theschool/school/students/" + e.target.getAttribute('data');
        }
    });

    /** event on button edit student **/
    $('.btnEditStudent').on('click', function (e) {
        window.location.href = "http://localhost/theschool/school/students/"+e.target.value+"/edit";
    });

    /** event on button delete student **/
    $('.btnDeleteStudent').on('click', function (e) {
        window.location.href = "http://localhost/theschool/school/students/"+e.target.value+"/delete";
    });

    /** event on button delete course **/
    $('.btnDeleteCourse').on('click', function (e) {
        window.location.href = "http://localhost/theschool/school/courses/"+e.target.value+"/delete";
    });

    /** event on button add course **/
    $('.btnAddCourse').on('click', function () {
        window.location.href = "http://localhost/theschool/school/courses/create";
    });

    /** event on button edit course **/
    $('.btnEditCourse').on('click', function (e) {
        window.location.href = "http://localhost/theschool/school/courses/"+e.target.value+"/edit";
    });

    /** event on button add student **/
    $('.btnAddStudent').on('click', function () {
        window.location.href = "http://localhost/theschool/school/students/create";
    });

    /** event on button add/edit student **/
    $('.btnAddEditStudent').on('click', function (e) {
        validateStudent(e.target.value);
    });

    /** event on button add/edit course **/
    $('.btnAddEditCourse').on('click', function (e) {
        validateCourse(e.target.value);
    });

    /** button choose file **/
    $('.file').on('change', function () {
        previewFileAndCheckErrors();
    });

    /** validate course form **/
    function validateCourse(btnName) {
        var form = {
            f: document.forms.f,
            name: f.course_name.value,
            description: f.course_description.value
        };
        var er = $(".error");
        //clean errors.
        er.text('');

        var errBool = false;
        var errArray = [];
        var imgErr = previewFileAndCheckErrors();


        if (form.name.trim() == '') {
            errArray.push("Name");
            errBool = true;
        }
        if (form.description.trim() == '') {
            errArray.push("Description");
            errBool = true;
        }
        if (imgErr) {
            errArray.push(imgErr);
            errBool = true;
        }

        // errBool = false; Yaniv user it for check php validation

        if (!errBool) {
            form.f.method = 'post';

            if (btnName == 'Create') {
                form.f.action = "school/courses/create";
                form.f.submit();
            } else if (btnName == "Edit") {
                form.f.action = window.location;
                form.f.submit();
            }
        } else {
            er.text('Error missing: ' + errArray.join(', '));
        }
    }

    /** validate student form **/
    function validateStudent(btnName) {
        var form = {
            f: document.forms.f,
            name: f.student_name.value,
            phone: f.student_phone.value,
            email: f.student_email.value
        };
        var er = $(".error");
        //clean errors.
        er.text('');

        var errBool = false;
        var errArray = [];
        var imgErr = previewFileAndCheckErrors();


        if (form.name.trim() == '') {
            errArray.push("Name");
            errBool = true;
        }
        if (!validatePhoneNumber(form.phone.trim())) {
            errArray.push("Phone");
            errBool = true;
        }
        if (!validateEmail(form.email.trim())) {
            errArray.push("Email");
            errBool = true;
        }
        if (imgErr) {
            errArray.push(imgErr);
            errBool = true;
        }

        // errBool = false; Yaniv user it for check php validation

        if (!errBool) {
            form.f.method = 'post';

            if (btnName == 'Create') {
                form.f.action = "school/students/create";
                form.f.submit();
            } else if (btnName == "Edit") {
                form.f.action = window.location;
                form.f.submit();
            }
        } else {
            er.text('Error: ' + errArray.join(', '));
        }
    }

    /** Thumbnail of image with checking format size resolution of image
     *  function return string errors else empty string **/
    function previewFileAndCheckErrors() {
        var preview = document.querySelector('form img');
        var reader = new FileReader();
        var error = [];
        var filePath = document.querySelector('input[type=file]');
        var file = filePath.files[0];
        var imageSupported = ['jpeg', 'jpg', 'gif', 'png'];
        var er = $('.imgErrors');
        // clean errors
        er.text('');

        if (file) {
            var fileSize = file.size;
            var imageType = filePath.value.substring(filePath.value.lastIndexOf('.') + 1).toLowerCase();

            /** check image format supported **/
            if ((imageSupported.indexOf(imageType)) == -1) {
                //console.log("image format not supported");
                error.push("image format not supported");
            }

            if (fileSize < 5000000) {
                reader.onloadend = function (e) {

                    var base64 = e.target.result;
                    var image = new Image();
                    image.src = base64;

                    /** check image resolution **/
                    image.onload = function () {

                        if (this.width > 2048 || this.height > 1152) {
                            // alert("Allow resolution 2048x1152!\n Your image width is " + this.width + " and image height is " + this.height);
                            //console.log("image resolution must be 2048x1152");
                            imgErrors("image resolution must be MAX 2048x1152");
                        }
                    };
                    preview.src = reader.result;
                };
                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "";
                }
            } else {
                error.push("image size is too big");
                //console.log("image size is too big");
            }
        }

        return error.join(', ');
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

    /** print error image resolution **/
    function imgErrors(str) {
        var er = $('.imgErrors');
        er.text(str);
        // er.text("ERROR: " + str);
    }
}));


