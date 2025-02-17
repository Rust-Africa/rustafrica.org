(function($){
    "user strict";

    $( window ).on( 'elementor:init', function() {
        var LayoutControl = elementor.modules.controls.BaseData.extend( {
            onReady: function() {
                var self = this;
                var options = this.ui.radio;
                options.each(function(key, value){
                    $(value).on("click", function(){
                        options.each(function(key2, value2){
                            if($(value2).parent().hasClass("selected")){
                                $(value2).parent().removeClass("selected");
                            }
                        });
                       $(this).parent().addClass("selected");
                    });
                });
            },

            saveValue: function() {
                var self = this;
                var options = this.ui.radio;
                $.each(options, function(key, value){
                    if($(value).is(':checked')){
                        self.setValue( $(value).val() );
                    }
                });
            },

            onBeforeDestroy: function() {
                this.saveValue();
            }
        } );
        elementor.addControlView( 'layoutcontrol', LayoutControl );
    } );

}(jQuery));