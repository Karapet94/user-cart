var UserRegister = function (showWrongLogin) {

    this.data = {
        showWrongLogin: showWrongLogin
    };

    this.elements = {
        form: $('.form-signin')
    };

};

UserRegister.prototype.init = function () {
    this.validateForm();
    this.startListen();
    this.showErrorMessageIfNeeded();
};

UserRegister.prototype.startListen = function () {
    this.formSubmit();
};

UserRegister.prototype.formSubmit = function () {
    this.elements.form.submit(function (event) {
        if (!$(this).valid()) {
            event.preventDefault();
        }
    })
};

UserRegister.prototype.validateForm  = function() {
    this.elements.form.validate({
        rules: {
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                minlength : 5,
                required: true
            },
            repeat_password: {
                required: true,
                minlength : 5,
                equalTo : "#password"
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        success: function (label) {
            $(label).closest('form').find('.valid').removeClass("invalid");
        },
        errorPlacement: function () {
        }
    });
};

UserRegister.prototype.showErrorMessageIfNeeded = function () {
    if (this.data.showWrongLogin) {
        notification({status: 'error', msg: 'This email already used'});
    }
};