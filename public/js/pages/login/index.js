var UserLogin = function (showWrongLogin) {

    this.data = {
        showWrongLogin: showWrongLogin
    };

    this.elements = {
        form: $('.form-signin')
    };

};

UserLogin.prototype.init = function () {
    this.validateForm();
    this.startListen();
    this.showErrorMessageIfNeeded();
};

UserLogin.prototype.startListen = function () {
    this.formSubmit();
};

UserLogin.prototype.formSubmit = function () {
    this.elements.form.submit(function (event) {
        if (!$(this).valid()) {
            event.preventDefault();
        }
    })
};

UserLogin.prototype.validateForm  = function() {
    this.elements.form.validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                minlength : 5,
                required: true
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

UserLogin.prototype.showErrorMessageIfNeeded = function () {
    if (this.data.showWrongLogin) {
        notification({status: 'error', msg: 'Wrong Username or Password'});
    }
};