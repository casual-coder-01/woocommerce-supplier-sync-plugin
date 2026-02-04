console.log("WCSS admin.js loaded");


jQuery(document).ready(function ($) {

    $('#wcss-test-connection').on('click', function () {

        const resultBox = $('#wcss-test-result');
        resultBox.text('Testing connection...');

        $.post(wcss_ajax.ajax_url, {
            action: 'wcss_test_connection',
            nonce: wcss_ajax.nonce
        }, function (response) {

            if (response.success) {
                resultBox.css('color', 'green');
                resultBox.text(response.data.message);
            } else {
                resultBox.css('color', 'red');
                resultBox.text(response.data.message);
            }

        });

    });

});


