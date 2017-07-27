<?php if (!defined('THINK_PATH')) exit(); if(count($cartList) == 0): ?><div id="content_test">
      <div id="minicart" class="ui_poptip minicart minicartContent">
        <div class="ui_poptip_container">
          <div class="ui_poptip_arrow poptip_up"></div>
          <div class="ui_poptip_content">
            <span class="nop emptycart">购物车中没有商品哟！</span>
          </div>
        </div>
      </div>
    </div>
<?php else: ?>
    <div id="content_test">
      <div class="ui_poptip minicart minicartContent" id="minicart">
        <div class="ui_poptip_container">
          <div class="ui_poptip_arrow poptip_up"></div>
          <div class="ui_poptip_content">
            <div class="mini_product">
              <p class="mini_tit">最新加入商品</p>
              <div class="cart_con js_cart_top">
                <?php if(is_array($cartList)): foreach($cartList as $k=>$v): ?><div class="one_active js_camp_list">
                    <ul class="ul_product   js_cart_pro_list" cart_id="798325">
                      <li><a class="pdetail" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"><img src="<?php echo (goods_thum_images($v["goods_id"],60,60)); ?>">
	                        <p>
	                          <span class="name"><?php echo ($v[goods_name]); ?></span>
	                          <span class="price"><em class="symbol">¥</em><?php echo ($v[goods_price]); ?></span> X <?php echo ($v[goods_num]); ?>
	                        </p>
                        </a>
                        <div class="mini_op">
                         <a class="delete js_delete" onclick="header_cart_del(<?php echo ($v["id"]); ?>);" href="javascript:void(0);">删除</a>
                        </div>
                      </li>
                    </ul>
                  </div><?php endforeach; endif; ?>
              </div>
              <div class="mini_total clearfix">
                <p class="cart_num">共<span class="num" id="total_qty"><?php echo ($cart_total_price[num]); ?></span>件商品</p>
                <p class="cart_total">
                  <span class="tit">共计</span>
                  <span class="price"><em class="symbol">¥</em>
                  <span id="total_pay"><?php echo ($cart_total_price[total_fee]); ?></span>
                  </span>
                </p>
              </div>
              <p class="cart_bot"><a class="cart_buy" href="<?php echo U('Home/Cart/cart');?>">去购物车结算</a></p>
            </div>
          </div>
        </div>
      </div>
    </div><?php endif; ?>
<script>
var cart_cn = getCookie('cn');
$('.cart_quantity').html(cart_cn);
</script>