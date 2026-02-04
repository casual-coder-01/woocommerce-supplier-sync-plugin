console.log("WCSS admin.js loaded");

jQuery(document).ready(function ($) {

    /*
    =====================================
    Test Connection Button
    =====================================
    */

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


    /*
    =====================================
    Import Products Button
    =====================================
    */

    $('#wcss-import-products').on('click', function (e) {

        e.preventDefault();

        const resultBox = $('#wcss-import-result');

        resultBox.css('color', 'black');
        resultBox.text('Importing products... Please wait.');

        $.post(wcss_ajax.ajax_url, {
            action: 'wcss_import_products',
            nonce: wcss_ajax.nonce
        }, function (response) {

            if (response.success) {
                resultBox.css('color', 'green');
                resultBox.text(response.message || response.data?.message);
            } else {
                resultBox.css('color', 'red');
                resultBox.text(response.message || response.data?.message);
            }

        }).fail(function () {

            resultBox.css('color', 'red');
            resultBox.text('Import request failed.');

        });

    });

});

