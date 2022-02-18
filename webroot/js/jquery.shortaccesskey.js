// noinspection CssInvalidAtRule

$.shortaccesskey = {
    accesskeyArr: Array(),

    init: function () {
        let i = 0;
        $("a[accesskey]").each(function () {
            $.shortaccesskey.accesskeyArr[i] = $(this).attr('accesskey');
            i++;
        });

        $(document).keypress($.shortaccesskey.handleKeyPress);

        $("input,textarea,select").focus(function () {
            $(document).unbind();
        });

        $("input,textarea,select").blur(function () {
            $(document).keypress($.shortaccesskey.handleKeyPress);
        });
    },

    handleKeyPress: function (e) {
        const es = e || window.event;
        let k = es.charCode ? es.charCode : es.keyCode ? es.keyCode : es.which;
        let keyPressed = String.fromCharCode(k);
        if ($.inArray(keyPressed, $.shortaccesskey.accesskeyArr) >= 0) {
            window.location = $("a[accesskey=" + keyPressed + "]").attr("href");
        }
    }
};

$(document).ready(function () {
        $.shortaccesskey.init();
    }
);