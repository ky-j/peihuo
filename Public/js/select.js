(function ($) {
    $.selectSuggest = function (target, data, itemSelectFunction) {
        var myTarget = $('#' + target);

        var defaulOption = {
            suggestMaxHeight: '200px',//弹出框最大高度
            itemColor: '#000000',//默认字体颜色
            itemBackgroundColor: '#FFF',//默认背景颜色
            itemOverColor: '#ffffff',//选中字体颜色
            itemOverBackgroundColor: '#C9302C',//选中背景颜色
            itemPadding: 3,//item间距
            fontSize: 12,//默认字体大小
            alwaysShowALL: false //点击input是否展示所有可选项
        };
        var maxFontNumber = 0;//最大字数
        var currentItem;
        var suggestContainerId = target + "-suggest";
        var suggestContainerWidth = myTarget.innerWidth();
        var suggestContainerLeft = myTarget.offset().left;
        var suggestContainerTop = myTarget.offset().top + myTarget.outerHeight();

        // 点击子项目事件，显示子项目文本在输入框中
        var showClickTextFunction = function () {
            myTarget.val(this.innerText);
            currentItem = null;
            $('#' + suggestContainerId).hide();
        }
        var suggestContainer;
        if ($('#' + suggestContainerId)[0]) {
            suggestContainer = $('#' + suggestContainerId);
            suggestContainer.empty();
        } else {
            suggestContainer = $('<div></div>'); //创建一个子<div>
        }

        suggestContainer.attr('id', suggestContainerId) ;
        suggestContainer.attr('tabindex', '0');
        suggestContainer.hide();

        var _initItems = function (items) {
            suggestContainer.empty();
            for (var i = 0; i < items.length; i++) {
                if (items[i].text.length > maxFontNumber) {
                    maxFontNumber = items[i].text.length;
                }
                var suggestItem = $('<div></div>'); //数据子项目，创建一个子<div>
                suggestItem.attr('id', items[i].id);
                suggestItem.append(items[i].text);
                suggestItem.css({
                    'padding': defaulOption.itemPadding + 'px',
                    'white-space': 'nowrap',
                    'cursor': 'pointer',
                    'background-color': defaulOption.itemBackgroundColor,
                    'color': defaulOption.itemColor
                });
                suggestItem.bind("mouseover",
                    function () {
                        $(this).css({
                            'background-color': defaulOption.itemOverBackgroundColor,
                            'color': defaulOption.itemOverColor
                        });
                        currentItem = $(this);
                    });
                suggestItem.bind("mouseout",
                    function () {
                        $(this).css({
                            'background-color': defaulOption.itemBackgroundColor,
                            'color': defaulOption.itemColor
                        });
                        currentItem = null;
                    });
                suggestItem.bind("click", showClickTextFunction); //子项目点击事件
                suggestItem.bind("click", itemSelectFunction);
                suggestItem.appendTo(suggestContainer);
                suggestContainer.appendTo(document.body);
            }
        }

        // 文本框输入事件，匹配子项目
        var inputChange = function () {
            var inputValue = myTarget.val();
            inputValue = inputValue.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&");
            var matcher = new RegExp(inputValue, "i");
            return $.grep(data, function (value) {
                return matcher.test(value.text);
            });
        }

        myTarget.bind("keyup", function () {
            _initItems(inputChange());
        });

        myTarget.bind("blur",
            function () {
                if (!$('#' + suggestContainerId).is(":focus")) {
                    $('#' + suggestContainerId).hide();
                    if (currentItem) {
                        currentItem.trigger("click");
                    }
                    currentItem = null;
                    return;
                }
            });

        myTarget.bind("click", function () {
                if (defaulOption.alwaysShowALL) {
                    _initItems(data);
                } else {
                    _initItems(inputChange());
                }
                $('#' + suggestContainerId).removeAttr("style");
                var tempWidth = defaulOption.fontSize * maxFontNumber + 2 * defaulOption.itemPadding + 30;
                var containerWidth = Math.max(tempWidth, suggestContainerWidth);
                $('#' + suggestContainerId).css({
                    'border': '1px solid #ccc',
                    // 'max-height': defaulOption.suggestMaxHeight,
                    'top': suggestContainerTop,
                    'left': suggestContainerLeft,
                    'width': containerWidth,
                    'position': 'absolute',
                    'font-size': defaulOption.fontSize + 'px',
                    'font-family': 'Arial',
                    'z-index': 99999,
                    'background-color': '#FFFFFF',
                    'overflow-y': 'auto',
                    'overflow-x': 'hidden',
                    'white-space': 'nowrap'
                });
                $('#' + suggestContainerId).show();
            });
        _initItems(data);

        $('#' + suggestContainerId).bind("blur", function () {
            $('#' + suggestContainerId).hide();
        });

    }
})(jQuery);