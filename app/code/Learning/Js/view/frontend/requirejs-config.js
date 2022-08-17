var config = {
    map: {
        '*': {
            alias:  'Learning_Js/js/hello',
        }
    },
    config: {
        mixins:{
            // 'Magento_Checkout/js/action/set-shipping-information': {
            //     'Learning_Js/js/action/set-shipping-information-mixin': true
            // },
            // 'Magento_Checkout/js/action/select-payment-method':{
            //     'Learning_Js/js/action/select-payment-method-mixin':true
            // },
            'Magento_swatches/js/swatch-renderer':{
                'Learning_Js/js/swatch-renderer-mixin':true
            }

        }
    }
};