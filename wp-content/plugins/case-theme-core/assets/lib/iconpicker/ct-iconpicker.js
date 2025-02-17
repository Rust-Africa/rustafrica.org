(function($){
    "user strict";

    $( window ).on( 'elementor:init', function() {
        var CTIconsItemView = elementor.modules.controls.BaseData.extend({
            wrapper: null,
            items: null,
            iconpicker_els: null,
            url_els: null,
            add_btn: null,
            delete_btn: null,
            template: null,
            onReady: function () {
                var self = this;
                this.wrapper = $(this.el);
                this.items = this.wrapper.find(".ct-group-item");
                this.add_btn = this.wrapper.find(".ct-group-add");
                this.template = this.wrapper.find(".ct-template").val();

                self.setupIconPicker();
                self.setupUrlInput();
                self.setupDeleteBtn();
                this.add_btn.on("click", function(){
                    var new_item = $(self.template);
                    self.wrapper.find(".ct-group").append(new_item);
                    setTimeout(function(){
                        self.setupIconPicker();
                        self.setupUrlInput();
                        self.setupDeleteBtn();
                        self.items = self.wrapper.find(".ct-group-item");
                    }, 300);
                });
            },

            setupIconPicker: function () {
                var self = this;
                self.iconpicker_els = self.wrapper.find(".ct-iconpicker");
                self.iconpicker_els.fontIconPicker();
                self.iconpicker_els.on("change", function(e){
                    e.preventDefault();
                    self.saveValue();
                });
            },

            setupUrlInput: function () {
                var self = this;
                self.url_els = self.wrapper.find(".ct-url-input");
                self.url_els = self.wrapper.find(".ct-content-input");
                self.url_els = self.wrapper.find(".ct-content-pricing");
                self.url_els = self.wrapper.find(".ct-class-pricing");
                self.url_els = self.wrapper.find(".ct-title-input");
                self.url_els = self.wrapper.find(".ct-number-input");
                self.url_els.on("keyup", function(e){
                    e.preventDefault();
                    self.saveValue();
                });
            },

            setupDeleteBtn: function () {
                var self = this;
                self.delete_btn = self.wrapper.find(".ct-group-delete");
                self.delete_btn.on("click", function(e){
                    e.preventDefault();
                    $(this).parent().remove();
                    self.items = self.wrapper.find(".ct-group-item");
                    self.saveValue();
                });
            },

            saveValue: function () {
                var values = [];
                $.each(this.items, function(index, item){
                    var item_val = {};
                    item_val.icon = $(item).find(".ct-iconpicker").val();
                    item_val.url = $(item).find(".ct-url-input").val();
                    item_val.content = $(item).find(".ct-content-input").val();
                    item_val.content_pricing = $(item).find(".ct-content-pricing").val();
                    item_val.class_pricing = $(item).find(".ct-class-pricing").val();
                    item_val.title = $(item).find(".ct-title-input").val();
                    item_val.number = $(item).find(".ct-number-input").val();
                    values.push(item_val);
                });
                this.setValue(JSON.stringify(values));
            },

            onBeforeDestroy: function () {
                this.saveValue();
            }
        });

        elementor.addControlView('ct_icons', CTIconsItemView);
        elementor.addControlView('ct_lists', CTIconsItemView);
        elementor.addControlView('ct_lists_pricing', CTIconsItemView);
        elementor.addControlView('ct_progressbar', CTIconsItemView);
    } );
}(jQuery));