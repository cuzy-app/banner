humhub.module('banner', function (module, require, $) {

    const client = require('client');

    module.initOnPjaxLoad = false;

    /**
     * @param isPjax
     */
    const init = function (isPjax) {
        if (isPjax) {
            return;
        }

        $(function () {
            const $root = $('#banner');
            const $content = $('#banner-content');

            function checkScrolling() {

                if ($content.width() > $root.width()) {
                    $root.addClass('scrolling');
                } else {
                    $root.removeClass('scrolling');
                }
            }

            checkScrolling();
            $(window).on('resize', checkScrolling);
        });
    };

    /**
     * Hides the banner and remembers it server side, so that it stays hidden
     * for the rest of the session.
     *
     * @param evt
     */
    const close = function (evt) {
        $('#banner').remove();
        $(':root').css('--hh-banner-height', '0px');

        client.post(evt).catch(function (err) {
            module.log.error(err);
        });
    };

    module.export({
        init: init,
        close: close
    });
});
