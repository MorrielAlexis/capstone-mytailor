;(function ($) {
    $.fn.limit = function (options) {
        var defaults = {
            limit      : 200,
            result     : false,
            alertClass : false
        }, options = $.extend(defaults, options);

        return this.each(function () {
            var characters = options.limit;

            if (options.result != false) {
                $(options.result).append("Ainda restam <strong>"+characters+"</strong> caracteres");
            }

            $(this).keyup(function () {
                if ($(this).val().length > characters) {
                    $(this).val($(this).val().substr(0, characters));
                }

                if (options.result != false) {
                    var remaining = characters - $(this).val().length;

                    $(options.result).html("Ainda restam <strong>"+remaining+"</strong> caracteres");

                    if (remaining <= 10) {
                        $(options.result).addClass(options.alertClass);
                    } else {
                        $(options.result).removeClass(options.alertClass);
                    }
                }
            });
        });
    };
})(jQuery);