@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 商品管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 商品添加 > <a href="{{url('goods/index')}}">商品列表</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="{{url('goods/add')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="am-form-group am-cf">
          <div class="zuo">商品名称:</div>
          <div class="you">
            <input type="text" class="am-input-sm" name="goods_name" placeholder="请输入标题">
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">商品编号:</div>
          <div class="you">
            <input type="text" class="am-input-sm" name="goods_sn" placeholder="请输入商品编号">
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">所属分类：</div>
          <div class="you">
               <select name="category_id">
                      <option value="0">请选择。。。</option>
                       @foreach($category as $cate)
                         <option value="{{$cate->category_id}}">{{str_repeat('&nbsp;',(($cate->level)-1)*6)}}{{$cate->category_name}}</option>
                       @endforeach
               </select>
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">所属品牌:</div>
          <div class="you">
               <select name="brand_id">
                     <option value="0">请选择。。。</option> 
                    @foreach($brands as $brand)
                     <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>   
                    @endforeach
               </select>
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">是否限时:</div>
          <div class="you">
               <input type="radio" name="is_seckill" value="1">是
               <input type="radio" name="is_seckill" value="0" checked="true">否
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">是否最新:</div>
          <div class="you">
               <input type="radio" name="is_new" value="1">是
               <input type="radio" name="is_new" value="0" checked="true">否
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">上下架:</div>
          <div class="you">
               <input type="radio" name="is_delete" value="1">上架
               <input type="radio" name="is_delete" value="0" checked="true">下架
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">商品图片：</div>
          <div class="you" style="height: 45px;">
            <input type="file" name="goods_img" id="doc-ipt-file-1">
            <p class="am-form-help">请选择要上传的文件...</p>
          </div>
        </div>
        
        <div class="am-form-group am-cf">
          <div class="zuo">市场价：</div>
          <div class="you">
               <input type="text" name="market_price">
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">现售价：</div>
          <div class="you">
               <input type="text" name="shop_price">
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="you" style="margin-left: 11%;">
             <button type="submit" class="am-btn am-btn-secondary am-radius">添加商品</button>
          </div>
        </div>
      </form>
    </div>
</div>
@endsection
