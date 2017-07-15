/*
 * 根据元素的id获得其坐标(x轴和y轴)
 */
function getElementPos(elementId) {
    var ua = navigator.userAgent.toLowerCase();
    var isOpera = (ua.indexOf('opera') != -1);
    var isIE = (ua.indexOf('msie') != -1 && !isOpera); // not opera spoof
    var el = document.getElementById(elementId);
    if (el.parentNode === null || el.style.display == 'none') {
        return false;
    }
    var parent = null;
    var pos = [];
    var box;
    if (el.getBoundingClientRect) {   //IE
        box = el.getBoundingClientRect();
        var scrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
        var scrollLeft = Math.max(document.documentElement.scrollLeft, document.body.scrollLeft);
        return {
            x: box.left + scrollLeft,
            y: box.top + scrollTop
        };
    } else if (document.getBoxObjectFor) {   // gecko
        box = document.getBoxObjectFor(el);
        var borderLeft = (el.style.borderLeftWidth) ? parseInt(el.style.borderLeftWidth) : 0;
        var borderTop = (el.style.borderTopWidth) ? parseInt(el.style.borderTopWidth) : 0;
        pos = [box.x - borderLeft, box.y - borderTop];
    } else {   // safari & opera
        pos = [el.offsetLeft, el.offsetTop];
        parent = el.offsetParent;
        if (parent != el) {
            while (parent) {
                pos[0] += parent.offsetLeft;
                pos[1] += parent.offsetTop;
                parent = parent.offsetParent;
            }
        }
        if (ua.indexOf('opera') != -1 || ( ua.indexOf('safari') != -1 && el.style.position == 'absolute' )) {
            pos[0] -= document.body.offsetLeft;
            pos[1] -= document.body.offsetTop;
        }
    }
    if (el.parentNode) {
        parent = el.parentNode;
    } else {
        parent = null;
    }
    while (parent && parent.tagName != 'BODY' && parent.tagName != 'HTML') { // account for any scrolled ancestors
        pos[0] -= parent.scrollLeft;
        pos[1] -= parent.scrollTop;
        if (parent.parentNode) {
            parent = parent.parentNode;
        } else {
            parent = null;
        }
    }
    return {
        x: pos[0],
        y: pos[1]
    };
}

/**
 * * 隐藏购物车弹出窗
 * @param elm 被关闭标签的id
 */
function hideElement(carBox) {
    $('#' + carBox).hide();
}
/*
 * 显示购物车弹出窗
 */
$(function () {
    $('.add_btn').click(function () {
        var num = $('[name=amount]').val();
        var goods_id = $('.add_btn').attr('data');
        var goods_attr = getAttr();
        var data = {'cart_goods_id': goods_id, 'cart_goods_attr': goods_attr, 'cart_num': num};
        $.post('/Home/Cart/addCart',data,function(msg){
            if(msg==0){
                alert('添加购物车失败!');
            }else{
                $('#goods_number').html(msg['total_sum']);
                $('#goods_totalprice').html(msg['total_price']);
            }
        },'json');
        var pos = getElementPos('add_btn');
        $('.buy_blank').css({'left': pos.x - 80, 'top': pos.y - 130});
        $('.buy_blank').show();
    });
});
//获取属性的函数
function getAttr() {
    var str = '';
    $.each($('.product'), function (index, el) {
        attr_name = $(this).find('dt').html(); //机身颜色
        str += attr_name + ":";
        $arr = $(this).find('input:checked').val();
        $.each($arr, function (k, v) {
            str += v;
        })
        str += ",";
    });
    return str;
}

/**
 * 删除某一个
 */
function delOne(){
    
}
/**
 * 更改购物车数量
 * @param goods_id 被修改商品的id
 */

/**
 * 商品数量递加
 */

/**
 * 购物车数量递加、递减、数量变化公用函数
 * @param goods_buy_number 商品修改后的数量
 * @param goods_id 被修改数量的商品
 */


/**
 * 省市区三级联动---省份改变触发的事件
 */

/**
 * 省市区三级联动---城市改变触发的事件
 */


/**
 * 核对订单任意选取收货人信息
 */

