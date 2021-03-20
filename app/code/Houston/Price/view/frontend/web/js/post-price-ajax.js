require(["jquery"],function($) {
    jQuery(document).ready(function() {
        jQuery('[data-role="button-send-form"]').click(function()
        {
            let $userName = jQuery("input[name='user-name']").val();
            let $userEmail = jQuery("input[name='user-email']").val();
            let $userComment = jQuery('#user-comment').val();
            let $productSku = jQuery('[itemprop="sku"]').text();

            if ($userEmail.length > 0
                && ($userEmail.match(/.+?\@.+/g) || []).length !== 1) {
                console.log('email false');
            }else {
                if ($userName !== '' && $userEmail !== ''){
                    jQuery.ajax({
                        url: "/houston/request/price",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            name: $userName,
                            email: $userEmail,
                            comment: $userComment,
                            product_sku: $productSku,
                        }
                    });
                }
            }
        });
    });
});




