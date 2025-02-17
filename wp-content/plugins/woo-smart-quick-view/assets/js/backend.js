'use strict';

(function($) {
  $(function() {
    woosq_view_type();
    woosq_button_icon();
    woosq_init_fields();

    $('.woosq_icon_picker').fontIconPicker();

    $('.woosq-fields').sortable({
      handle: '.move', placeholder: 'woosq-field',
    });

    $('#woosq_settings_cats').selectWoo();
  });

  $(document).on('change', 'select.woosq_view', function() {
    woosq_view_type();
  });

  $(document).on('change', 'select.woosq_button_icon', function() {
    woosq_button_icon();
  });

  $(document).on('click touch', '.woosq-field .remove', function(e) {
    $(this).closest('.woosq-field').remove();
  });

  $(document).on('click touch', '.woosq-field-add', function(e) {
    e.preventDefault();

    var $this = $(this);
    var $wrapper = $this.closest('.woosq-fields-wrapper');
    var $fields = $wrapper.find('.woosq-fields');
    var $types = $wrapper.find('select.woosq-field-types');
    var field = $types.val();
    var type = $types.find('option:selected').data('type');
    var setting = $this.data('setting');

    var data = {
      action: 'woosq_add_field',
      type: type,
      field: field,
      setting: setting,
      nonce: woosq_vars.nonce,
    };

    $wrapper.addClass('woosq-fields-wrapper-loading');

    $.post(ajaxurl, data, function(response) {
      $fields.append(response);
      woosq_init_fields();
      $wrapper.removeClass('woosq-fields-wrapper-loading');
    });
  });

  function woosq_view_type() {
    var type = $('select.woosq_view').val();

    $('.woosq_view_type').hide();
    $('.woosq_view_type_' + type).show();
  }

  function woosq_button_icon() {
    var button_icon = $('select.woosq_button_icon').val();

    if (button_icon !== 'no') {
      $('.woosq-show-if-button-icon').show();
    } else {
      $('.woosq-show-if-button-icon').hide();
    }
  }

  function woosq_init_fields() {
    $('.woosq-field-type-custom_field .woosq-field-name:not(.woosq-field-name-initialized)').
        selectWoo().
        addClass('woosq-field-name-initialized');
  }
})(jQuery);