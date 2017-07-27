<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>tpshop商家管理后台</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
 	<link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 --
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/Public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
    	folder instead of downloading all of them to reduce the load. -->
    <link href="/Public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="/Public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />   
    <!-- jQuery 2.1.4 -->
    <script src="/Public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/Public/js/global.js"></script>
    <script src="/Public/js/myFormValidate.js"></script>    
    <script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/Public/js/layer/layer-min.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
    <script src="/Public/js/myAjax.js"></script>
    <script type="text/javascript">
    function delfunc(obj){
    	layer.confirm('确认删除？', {
    		  btn: ['确定','取消'] //按钮
    		}, function(){
    		    // 确定
   				$.ajax({
   					type : 'post',
   					url : $(obj).attr('data-url'),
   					data : {act:'del',del_id:$(obj).attr('data-id')},
   					dataType : 'json',
   					success : function(data){
   						if(data==1){
   							layer.msg('操作成功', {icon: 1});
   							$(obj).parent().parent().remove();
   						}else{
   							layer.msg(data, {icon: 2,time: 2000});
   						}
   						layer.closeAll();
   					}
   				})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);
    }
    
    function selectAll(name,obj){
    	$('input[name*='+name+']').prop('checked', $(obj).checked);
    }    
	
    function get_help(obj){
        layer.open({
            type: 2,
            title: '帮助手册',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: $(obj).attr('data-url'), 
        });
    }	
    </script>        
  </head>
  <body style="background-color:#ecf0f5;">
 

<script type="text/javascript">
    window.UEDITOR_Admin_URL = "/Public/plugins/Ueditor/";
    var URL_upload = "<?php echo ($URL_upload); ?>";
    var URL_fileUp = "<?php echo ($URL_fileUp); ?>";
    var URL_scrawlUp = "<?php echo ($URL_scrawlUp); ?>";
    var URL_getRemoteImage = "<?php echo ($URL_getRemoteImage); ?>";
    var URL_imageManager = "<?php echo ($URL_imageManager); ?>";
    var URL_imageUp = "<?php echo ($URL_imageUp); ?>";
    var URL_getMovie = "<?php echo ($URL_getMovie); ?>";
    var URL_home = "<?php echo ($URL_home); ?>";    
</script>
<script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.all.js"></script>
<div class="wrapper">
    <div class="breadcrumbs" id="breadcrumbs">
	<ol class="breadcrumb">
	<?php if(is_array($navigate_admin)): foreach($navigate_admin as $k=>$v): if($k == '后台首页'): ?><li><a href="<?php echo ($v); ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;<?php echo ($k); ?></a></li>
	    <?php else: ?>    
	        <li><a href="<?php echo ($v); ?>"><?php echo ($k); ?></a></li><?php endif; endforeach; endif; ?>          
	</ol>
</div>

    <section class="content ">
        <!-- Main content -->
        <div class="container-fluid">
            <div class="pull-right">
                <a href="javascript:history.go(-1)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="返回"><i class="fa fa-reply"></i></a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i> 编辑导航</h3>
                </div>
                <div class="panel-body ">   
                    <!--表单数据-->
                    <form method="post" id="handleposition" action="<?php echo U('Store/navigationHandle');?>">                    
                        <!--通用信息-->
                    <div class="tab-content col-md-12">                 	  
                        <div class="tab-pane active" id="tab_tongyong">                           
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="col-sm-2">导航名称：</td>
                                    <td>
                                        <input type="text" class="form-control" name="sn_title" value="<?php echo ($info["sn_title"]); ?>" >                                   
                                    </td>
                                </tr>  
                                <tr>
                                    <td>是否显示：</td>
                                    <td >
                         				<input type="radio" class="" name="sn_is_show" value="1" <?php if($info[sn_is_show] == 1): ?>checked="checked"<?php endif; ?>>是
                      					<input type="radio" class="" name="sn_is_show" value="0" <?php if($info[sn_is_show] == 0): ?>checked="checked"<?php endif; ?>>否
                                    </td>
                                   
                                </tr>  
                                <tr>
                                    <td>是否新窗口打开：</td>
                                    <td>
                               			<input type="radio" class="" name="sn_new_open" value="1"  <?php if($info[sn_new_open] == 1): ?>checked="checked"<?php endif; ?>>是
                      					<input type="radio" class="" name="sn_new_open" value="0"  <?php if($info[sn_new_open] == 0): ?>checked="checked"<?php endif; ?>>否     
                                    </td>
                                  
                                </tr>  
                                <tr>
                                    <td>导航外链URL：</td>
                                    <td>
                      					<input type="text" class="form-control" name="sn_url" value="<?php echo ($info["sn_url"]); ?>" >
                                    	<p class="text-warning">请填写包含http://的完整URL地址,如果填写此项则点击该导航会跳转到外链</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>排序：</td>
                                    <td>
                      					<input type="text" class="form-control" name="sn_sort" value="<?php echo ($info["sn_sort"]); ?>" >
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td>内容：</td>
                                    <td class="col-xs-10">
                             			<textarea class="span12 ckeditor" id="post_content" name="sn_content" title="">
							            <?php echo ($info["sn_content"]); ?>
							        </textarea>
                                    </td>
                                </tr>                                   
                                </tbody> 
                                <tfoot>
                                	<tr>
                                		<td><input type="hidden" name="sn_id" value="<?php echo ($info["sn_id"]); ?>"></td>
                                		<td class="text-right"><input class="btn btn-primary" type="button" onclick="adsubmit()" value="保存"></td>
                                	</tr>
                                </tfoot>                               
                                </table>
                        </div>                           
                    </div>              
			    	</form><!--表单数据-->
                </div>
            </div>
        </div>
    </section>
</div>
<script>
function adsubmit(){
	$('#handleposition').submit();
}

var editor;
$(function () {
    //具体参数配置在  editor_config.js 中
    var options = {
        zIndex: 999,
        initialFrameWidth: "100%", //初化宽度
        initialFrameHeight: 350, //初化高度
        focus: false, //初始化时，是否让编辑器获得焦点true或false
        maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
        pasteplain: true, autoHeightEnabled: true,
        autotypeset: {
            mergeEmptyline: true,        //合并空行
            removeClass: true,           //去掉冗余的class
            removeEmptyline: false,      //去掉空行
            textAlign: "left",           //段落的排版方式，可以是 left,right,center,justify 去掉这个属性表示不执行排版
            imageBlockLine: 'center',    //图片的浮动方式，独占一行剧中,左右浮动，默认: center,left,right,none 去掉这个属性表示不执行排版
            pasteFilter: false,          //根据规则过滤没事粘贴进来的内容
            clearFontSize: false,        //去掉所有的内嵌字号，使用编辑器默认的字号
            clearFontFamily: false,      //去掉所有的内嵌字体，使用编辑器默认的字体
            removeEmptyNode: false,      //去掉空节点
            removeTagNames: {"font": 1},
            indent: false,               //行首缩进
            indentValue: '0em'           //行首缩进的大小
        }
    };
    editor = new UE.ui.Editor(options);
    editor.render("post_content");
});

</script>
</body>
</html>