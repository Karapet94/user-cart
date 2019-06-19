function notification(data) {
        var st = data.status,
            isStick = (data.status == 'success'),
            title   = st !== undefined && (st.charAt(0).toUpperCase() + st.slice(1)),
            notice  = new PNotify({
                title: title,
                text: data.msg,
                type: data.status,
                delay: 2000,
                shadow: false,
                hide: isStick,
                buttons: {
                    closer: true,
                    sticker: false
                }
            });
        notice.get().click(function () {
            notice.remove();
        });

}