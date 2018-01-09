@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">
    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 商品管理</ul>
      <dl class="am-icon-home" style="float: right;"> 当前位置： 商品属性添加 > <a href="{{url('goods/index')}}">商品列表</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="{{url('goodsattr/inserts')}}" method="post">
      	<input type="hidden" name="goods_id" value="{{$goods_id}}">
        {{csrf_field()}}
        <div class="am-form-group am-cf">
          <div class="zuo">商品类型</div>
          <div class="you">
            <select id="type_id">
            	<option value="0">请选择商品类型...</option>
            	@foreach($types as $type)
            	<option value="{{$type->type_id}}">{{$type->type_name}}</option>
            	@endforeach
            </select>
          </div>
        </div>
        <div id="cont"></div>
        <div class="am-form-group am-cf">
          <div class="you" style="margin-left: 11%;">
              <button type="submit" class="am-btn am-btn-success am-radius">发布并关闭窗口</button>&nbsp;  &raquo; &nbsp; <button type="submit" class="am-btn am-btn-secondary am-radius">发布并继续发布</button>
          </div>
        </div>
      </form>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#type_id").change(function(){
		    var type_id=$("#type_id").val();
             $("#cont").html('');
            $.ajax({
			   type: "get",
			   url: "{{url('goodsattr/index')}}",
			   data:{"type_id":type_id},
			   dataType: "json",
			   success: function(msg){
			   	var str="";
                   $.each(msg,function(key,val){
                   	    str+='<div class="am-form-group am-cf">';
                   	    str+='<div class="zuo">'+val.attr_name+'：</div><input type="hidden" name="attr_id[]" value="'+val.attr_id+'"><div class="you"><select name="attr_value[]">';
                        $.each(val.attr,function(k,v){
                   	       str+='<option value="'+v+'">'+v+'</option>';
                        });     
                        str+='</select></div></div><div class="am-form-group am-cf"><div class="zuo">价格：</div><div class="you"><input type="text" class="am-input-sm" name="attr_price[]"></div></div>';    
                   });
                   $("#cont").html(str);
                   
               }
			});   
		});
   });
	 
</script>
@endsection