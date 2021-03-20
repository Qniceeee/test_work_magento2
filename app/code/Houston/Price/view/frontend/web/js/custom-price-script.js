require([
    "jquery",
    "Magento_Ui/js/modal/modal"
],function($, modal) {

    var options = {
        type: 'popup',
        responsive: true,
        title: 'Send request price',
        buttons: [{
            text: $.mage.__('Ok'),
            class: '',
            click: function () {
                this.closeModal();
            }
        }]
    };

    var popup = modal(options, $('#custom-price-form'));
    $("#price-button").click(function() {
        $('#custom-price-form').modal('openModal');
    });
});


