(function($) {
    'use strict';



    Tc.Module.Menu = Tc.Module.extend({

        /**
         * Initialize.
         *
         * @method init
         * @return {void}
         * @constructor
         * @param {jQuery} $ctx the jquery context
         * @param {Sandbox} sandbox the sandbox to get the resources from
         * @param {Number} id the unique module id
         */
        init: function($ctx, sandbox, id) {
            // call base constructor
            this._super($ctx, sandbox, id);

            // Do stuff here
            //...
        },

        /**
         * Hook function to do all of your module stuff.
         *
         * @method on
         * @param {Function} callback function
         * @return void
         */
        on: function(callback) {
            var mod = this,
                $ctx = this.$ctx
            ;

            mod.$burgerMenu = $('.burger-menu', $ctx);
            mod.$mainContainer = $('.container', $ctx);




            mod.$burgerMenu.on('click', function() {
                if (mod.$mainContainer.hasClass('showing-menu')) {
                    mod.deactivateMenu();
                } else {
                    mod.activateMenu();
                }
            });

            callback();
        },


        activateMenu : function() {
            var mod = this;

            mod.$mainContainer.addClass('showing-menu');

        },
        deactivateMenu: function() {
            var mod = this;
            mod.$mainContainer.removeClass('showing-menu');
        },





        /**
         * Hook function to trigger your events.
         *
         * @method after
         * @return void
         */
        after: function() {
            // Do stuff here or remove after method
            //...
        }

    });

})(Tc.$);
