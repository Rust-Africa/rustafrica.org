/**
 * @since: 1.0.0
 * @author: Case-Themes
 */
(function ($) {
    function download(filename, text) {
        var element = document.createElement('a');
        element.setAttribute('href', text);
        element.setAttribute('download', filename);
        element.style.display = 'none';
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);
    }
    $(document).on('click', '.button-primary.create-demo', function (e) {
        e.preventDefault();
        if ($('#ct-ie-id').val() === '') {
            $('#ct-ie-id').focus();
        } else {
            $('.ct-export-contents').submit();
        }
    });
    $(document).on('click', '.ct-import-btn.ct-import-submit', function (e) {
        e.preventDefault();
        var _form = $(this).parents('form.ct-ie-demo-item');
        if (confirm('Are you sure you want to install this demo data?')) {
            _form.find(".ct-loading").css('display', 'block');
            _form.submit();
        } else {
            return;
        }
    });
    $(document).on('click', '.ct-delete-demo', function (e) {
        e.preventDefault();
        var _this = $(this);
        var _validate = prompt("Type \"reset\" in the confirmation field to confirm the reset and then click the OK button");
        if (_validate === "reset") {
            if (confirm('Are you sure you want to reset site?')) {
                _this.parents('form.ct-ie-demo-item').find('input[name="action"]').val('ct-reset');
                _this.parents('form.ct-ie-demo-item').submit();
            } else {
                return;
            }
        } else {
            if (_validate !== null) {
                alert('Invalid confirmation. Please type \'reset\' in the confirmation field.');
            } else {
                return;
            }
        }
    });
    $(document).on('click', 'li.ct-advance-reset', function (e) {
        e.preventDefault();
        var _form = $(document).find('form.ct-reset-form-advance');
        var _validate = prompt("Type \"reset\" in the confirmation field to confirm the reset and then click the OK button");
        if (_validate === "reset") {
            if (confirm('Are you sure you want to reset site?')) {
                _form.submit();
            } else {
                return false;
            }
        } else {
            if (_validate !== null) {
                alert('Invalid confirmation. Please type \'reset\' in the confirmation field.');
            } else {
                return false;
            }
        }
    });
    $(document).on('click', 'li.ct-show-regenerate-thumbnail', function (e) {
        e.preventDefault();
        var _form = $(document).find('form.ct-regenerate-thumbnail-sm');
        if (confirm('Are you sure you want to Regenerate Thumbnail?')) {
            _form.submit();
        } else {
            return false;
        }
    });
    $(document).on('click', '.ct-show-manual-import', function (e) {
        e.preventDefault();
        $(document).find(".ct-manual-import-layout").css('display','block');
        setTimeout(function () {
            $(document).find(".tabs-contents.ct-mi-demo-list").addClass("active");
            $(document).find(".ct-manual-import-layout").removeClass("ct-m-hidden");
        },10);
    });
    $(document).on('click', '.ct-contain .dashicons.dashicons-dismiss', function (e) {
        e.preventDefault();
        $(document).find(".ct-manual-import-layout").addClass("ct-m-hidden");
        setTimeout(function () {
            $(document).find(".ct-manual-import-layout").css('display','none');
        },600);
    });

    $(document).on('click', '.ct-mi-select', function (e) {
        e.preventDefault();
        $(document).find(".ct-mi-image.ct-selected").removeClass("ct-selected");
        $(document).find(".tabs-contents.active").removeClass("active");
        $(document).find("#attachments").addClass("active");
        $(document).find(".tabs-demos[data-id=select-demo]").addClass("ct-mi-done");
        $(document).find(".tabs-demos[data-id=select-demo]").removeClass("ct-mi-active");
        $(document).find(".tabs-demos[data-id=attachments]").addClass("ct-mi-active");
        var _this = $(this),
            _img = _this.parents(".ct-mi-image");
        _img.addClass("ct-selected");
        $(".ct-mi-image-selected img").attr("src",_img.find("img").attr("src"));
        $("#ct-download-attachment-btn").attr("data-attachment",_this.attr("data-attachment"));
        $(".ct-mi-demo-title-selected").html(_img.find(".ct-mi-demo-title").html());
        $("input[name=ct-ie-id]").val(_this.attr("data-demo"));
        setTimeout(function () {
            $(document).find("#select-demo").css('display','none');
        },300);
    });
    $(document).on('click', '.tabs-demos.ct-mi-done', function (e) {
        e.preventDefault();
        var _this = $(this);
        $(document).find(".tabs-demos").removeClass("ct-mi-done");
        $(document).find(".tabs-demos").removeClass("ct-mi-active");
        var _data_id = _this.attr("data-id");
        switch (_data_id) {
            case "attachments":
                $(document).find(".tabs-demos").removeClass("ct-mi-done");
                $(document).find(".tabs-demos").removeClass("ct-mi-active");
                $(document).find(".tabs-contents.active").removeClass("active");
                $(document).find("#attachments").addClass("active");
                $(document).find(".tabs-demos[data-id=select-demo]").addClass("ct-mi-done");
                $(document).find(".tabs-demos[data-id=select-demo]").removeClass("ct-mi-active");
                $(document).find(".tabs-demos[data-id=attachments]").addClass("ct-mi-active");
                break;
            case "select-demo":
                $(document).find("#select-demo").css('display','block');
                $(document).find(".tabs-demos").removeClass("ct-mi-done");
                $(document).find(".tabs-demos").removeClass("ct-mi-active");
                setTimeout(function () {
                    $(document).find(".tabs-contents.active").removeClass("active");
                    $(document).find("#select-demo").addClass("active");
                    $(document).find(".tabs-demos[data-id=attachments]").removeClass("ct-mi-active");
                    $(document).find(".tabs-demos[data-id=select-demo]").addClass("ct-mi-active");
                },10);
                break;
            default:
                break;
        }
    });
    $(document).on('click','#ct-download-attachment-btn',function (e) {
        e.preventDefault();
        var _this = $(this);
        download("ct-attachments.zip",_this.attr("data-attachment"));
    });
    $(document).on('change','#ct-accept-unzip-done',function (e) {
        e.preventDefault();
        var _checked = $("input#ct-accept-unzip-done:checked").length;
        if(_checked === 1){
            $(document).find(".ct-mi-dl-step.step-4 button").addClass("active");
        }else{
            $(document).find(".ct-mi-dl-step.step-4 button").removeClass("active");
        }
    });
    $(document).on('click','.ct-mi-dl-step.step-4 button.active',function (e) {
        e.preventDefault();
        var _this = $(this);
        var _checked = $("input#ct-accept-unzip-done:checked").length;
        if(_checked === 1){
            if (confirm('Are you sure you want to install this demo data?')) {
                _this.next().submit();
            } else {
                return false;
            }
        }else{
            alert("Please accept \"I uploaded and unzipped file\"");
        }
    });
})(jQuery);
