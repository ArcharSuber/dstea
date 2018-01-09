@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 商品管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 图片添加 > <a href="{{url('goods/index')}}">商品列表</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="{{url('goods/picture')}}" method="post" enctype="multipart/form-data">
      	{{csrf_field()}}
      	<input type="hidden" value="{{$goods_id}}" name="goods_id">
        <div class="am-form-group am-cf">
          <div class="zuo">请上传图片(<font color="red">按Ctrl可以选择多个图片上传</font>):</div>
          <div class="you">
            <input type="file" name="picture_url[]" class="am-input-sm" id="doc-ipt-email-1" multiple="multiple">
          </div>
          
        </div>
        
        <div class="am-form-group am-cf">
          <div class="you" style="margin-left: 11%;">
              <button type="submit" class="am-btn am-btn-success am-radius">添加</button>

          </div>
        </div>
      </form>
    </div>
</div>
@endsection
