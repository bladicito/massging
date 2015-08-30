(function($) {

    Tc.Module.Form = Tc.Module.extend({

        /**
         * Initializes the Default module.
         *
         * @method init
         * @constructor
         * @param {jQuery|Zepto} $ctx the jquery context
         * @param {Sandbox} sandbox the sandbox to get the resources from
         * @param {String} modId the unique module id
         */
        init: function($ctx, sandbox, modId) {
            // call base constructor
            this._super($ctx, sandbox, modId);
        },

        /**
         * Hook function to do all of your module stuff.
         *
         * @method on
         * @param {Function} callback function
         * @return void
         */
        on: function(callback) {
            callback();

            var mod = this,
                $ctx = mod.ctx
                ;

            mod.$submitForm = $('.js-submit-form', $ctx);
            mod.$inputs     = $('.form-control', $ctx);
            mod.$form       = $('form', $ctx);
            mod.$mandatoryFields = (function() {
                var $fields = $('.frm-required', $ctx).siblings('input'),
                    arrayWithItems =  []
                ;

                $fields.each(function(index, item) {
                    arrayWithItems.push({
                        input   : $(item),
                        wrapper : $(item).closest('.form-group')
                    });

                });

                return $(arrayWithItems);

            })();

            mod.$submitForm.on('click', function(evt) {
                evt.preventDefault();
                mod.checkForm();
            });

            mod.$inputs.on('focus', function() {
                $(this).closest('.form-group').removeClass('has-error');
            });




        },

        checkForm: function() {
           var mod = this,
               errors = []
           ;

            mod.$mandatoryFields.each(function(index, item) {
                if (item.input.val() === '') {
                    errors.push(item);
                }
            });


            if (errors.length > 0) {
                $(errors).each(function(index, item) {
                    item.wrapper.addClass('has-error');
                });

                swal({
                    title: "Fehler im Formular",
                    text: "Bitte überprüfen Sie, dass alle die obligatorische Felder korrekt ausgefüllt sind.",
                    type: "error",
                    confirmButtonText: "Verstanden"
                });

                return this;
            }

           mod.$form.submit();

        },

        /**
         * Hook function to trigger your events.
         *
         * @method after
         * @return void
         */
        after: function() {
        }
    });
})(Tc.$);