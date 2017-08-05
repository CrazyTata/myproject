// 如果在页面最上面引入该文件时，必须使用页面载入事件，否则是找不到对应的标签对象的
// 如果在页面下面引入该文件，则不需要使用页面载入事件
$(function(){
	//为“加入购物车”按钮绑定点击事件
	$('.add_btn').click(function(){
		//获取加入购物车所需的商品信息
		var goods_id = $(this).attr('data');
		var num = $('[name=amount]').val();
		var attr = getAttr();
		var data = {'goods_id':goods_id, 'num':num, 'attr':attr};
		$.post(url, data, function(msg){
			if(msg == 0){
				alert('添加购物车失败');
			} else {
				$('#goods_number').html(msg.number);
				$('#goods_totalprice').html(msg.price);
				//获取"加入购物车"标签对象在网页上的xy坐标
				var pos = getElementPos('add_btn');
				//设置“弹出框”的xy坐标
				$('#cartBox').css({'left': pos.x-80, 'top':pos.y-130});
				//显示弹出框
				$('#cartBox').show();
			}
		}, 'json');
		
	})
})
//获取商品信息的DOM操作
function getAttr(){
	var attr_str = '';
	var pro_list = $('.product');
	$.each(pro_list, function(index, el){
		//获取属性名称
		attr_name = $(this).find('dt').html(); //机身颜色
		//将属性名称拼接到最后的属性信息字符串中
		attr_str += attr_name + ":";
		//根据属性名称来获取对应的radio标签组
		obj_name = "[name="+attr_name+"]"; // [name=机身颜色]
		radio_list = $(obj_name);
		
		//循环radio标签组，找出checked=checked的标签，在获取其value值，拼接到attr_str中
		$.each(radio_list, function(i, e){
			if($(this).attr('checked') == 'checked'){
				attr_str += $(this).val() + ',';
			}
		})
	})
	return attr_str;
}

function hideElement(elm){
    $('#'+elm).hide();
}

/*
 * 根据元素的id获得其坐标(x轴和y轴)
 */
function getElementPos(elementId) {
    var ua = navigator.userAgent.toLowerCase();
    var isOpera = (ua.indexOf('opera') != -1);
    var isIE = (ua.indexOf('msie') != -1 && !isOpera); // not opera spoof
    var el = document.getElementById(elementId);
    if(el.parentNode === null || el.style.display == 'none') {
        return false;
    }
    var parent = null;
    var pos = [];
    var box;
    if(el.getBoundingClientRect) {   //IE
        box = el.getBoundingClientRect();
        var scrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
        var scrollLeft = Math.max(document.documentElement.scrollLeft, document.body.scrollLeft);
        return {
            x:box.left + scrollLeft, 
            y:box.top + scrollTop
        };
    }else if(document.getBoxObjectFor) {   // gecko
        box = document.getBoxObjectFor(el);
        var borderLeft = (el.style.borderLeftWidth)?parseInt(el.style.borderLeftWidth):0;
        var borderTop = (el.style.borderTopWidth)?parseInt(el.style.borderTopWidth):0;
        pos = [box.x - borderLeft, box.y - borderTop];
    }else {   // safari & opera
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
        x:pos[0], 
        y:pos[1]
    };
}