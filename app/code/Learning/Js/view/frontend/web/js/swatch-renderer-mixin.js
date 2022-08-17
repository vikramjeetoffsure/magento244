define([
    'jquery',
    'Learning_Js/js/custom-swatch-valitor'
], function($) {
    'use strict';

    return function()
    {

            $.widget('mage.SwatchRenderer', {

                _RenderFormInput: function (config) {
                    return '<input class="' + this.options.classes.attributeInput + ' super-attribute-select" ' +
                        'name="super_attribute[' + config.id + ']" ' +
                        'type="text" ' +
                        'value="" ' +
                        'data-selector="super_attribute[' + config.id + ']" ' +
                        'data-validate="{\'custom-required-rule\': true}" ' +
                        'aria-required="true" ' +
                        'aria-invalid="false">';
                }
                

            });
            
            return $.mage.SwatchRenderer;
    }

});