define([
    'jquery',
    'jquery/validate'
], function($) {
    'use strict';

    $.each({
        "custom-required-rule":[
            function (value){
                return !$.mage.isEmpty(value);
            },
            function (value,element){

                return $.mage._('this is requre');

            }
        ]
    }, function(i,rule){
        rule.unshift(i);
        $.validator.addMethod.apply($.validator,rule);

    });

    $.validator.addClassRules({
        "custom-required-rule": {
          required: true
        }
      });
    
});