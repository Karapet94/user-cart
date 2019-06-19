var FlashMessage = function(flashMessage) {
    this.flashMessage = flashMessage;
};

FlashMessage.prototype.init = function () {
    this.showFlashMessageIfExists();
};

FlashMessage.prototype.showFlashMessageIfExists = function () {
    if (this.flashMessage.hasOwnProperty('status')) {
        notification({
            status: this.flashMessage.status,
            msg: this.flashMessage.msg
        })
    }
};