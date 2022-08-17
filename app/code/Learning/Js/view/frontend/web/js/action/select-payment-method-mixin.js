define([
    'ko',
    'Magento_Checkout/js/model/quote',
    'jquery',
    'mage/storage',
    'mage/url',
    'Magento_Checkout/js/action/get-totals',
],
function(ko,quote,jQuery,storage,urlbuilder,getTotal){
    'use strict';

    return function(paymentMethod){
        var method = quote.paymentMethod(paymentMethod);
        console.log(method);

    }

})
