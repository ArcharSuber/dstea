@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 产品管理 --{{$goods['goods_name']}}({{$goods['goods_sn']}})</ul>
      <dl class="am-icon-home" style="float: right;"> 当前位置： 产品添加 > <a href="{{url('goods/index')}}">商品列表</a></dl>
    </div>
@include('layouts.error')
@include('layouts.validator')
    <div class="fbneirong">
      <form class="am-form" action="{{ url('product/index') }}" method="post">
{{csrf_field()}}
        <input type="hidden" name="goods_id" value="{{$goods['goods_id']}}">
        <div class="am-form-group am-cf">
          <div class="zuo">产品编号</div>
          <div class="you">
            <input type="text" value="{{old('product_sn')}}" name="product_sn" class="am-input-sm" placeholder="请输入产品编号 如 PTEA000001"><p class="form-control-static text-danger">{{$errors->first('product_sn')}}</p>
          </div>
        </div>
        @foreach($attr as $attrs)
        @foreach($attrs as $val)
        <div class="am-form-group am-cf">
          <div class="zuo">{{ $val->attr_name}}</div>
          <div class="you">
            <select name="goods_attr[]">
              @foreach($goodsattr as $gattr)
                @if($gattr->attr_id==$val->attr_id)
                   <option value="{{$gattr->goods_attr_id}}">{{$gattr->attr_value}}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>
        @endforeach
        @endforeach
        

        <div class="am-form-group am-cf">
          <div class="zuo">产品数量(库存)</div>
          <div class="you">
            <input type="text" value="{{old('product_number')}}" name="product_number" class="am-input-sm" placeholder="请输入关键词">
            <p class="form-control-static text-danger">{{$errors->first('product_number')}}</p>
          </div>
        </div>
        
        <div class="am-form-group am-cf">
          <div class="you" style="margin-left: 11%;">
              <button type="submit" class="am-btn am-btn-success am-radius">发布并关闭窗口</button>&nbsp;  &raquo; &nbsp; <button type="submit" class="am-btn am-btn-secondary am-radius">发布并继续发布</button>

          </div>
        </div>
      </form>
    </div>
</div>
@endsection
