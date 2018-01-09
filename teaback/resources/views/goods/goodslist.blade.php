@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">
    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 商品管理</ul>
      <dl class="am-icon-home" style="float: right;"> 当前位置： 商品列表 > <a href="{{url('goods/add')}}">商品添加</a></dl>
      <dl>
        <button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus"> <a href="{{ url('goods/add') }}">添加商品</a></button>
      </dl>
    </div>

	<div class="am-btn-toolbars am-btn-toolbar am-kg am-cf">
    <ul>
      <li>
        <div class="am-btn-group am-btn-group-xs">
        <select data-am-selected="{btnWidth: 90, btnSize: 'sm', btnStyle: 'default'}">
          <option value="b">产品分类</option>
          <option value="o">下架</option>
        </select>
        </div>
      </li>
      <li style="margin-right: 0;">
      	<span class="tubiao am-icon-calendar"></span>
        <input type="text" class="am-form-field am-input-sm am-input-zm  am-icon-calendar" placeholder="开始日期" data-am-datepicker="{theme: 'success',}"  readonly/>
      </li>
      <li style="margin-left: -4px;">
      	<span class="tubiao am-icon-calendar"></span>
        <input type="text" class="am-form-field am-input-sm am-input-zm  am-icon-calendar" placeholder="开始日期" data-am-datepicker="{theme: 'success',}"  readonly/>
      </li>
      <li><input type="text" class="am-form-field am-input-sm am-input-xm" placeholder="关键词搜索" /></li>
      <li><button type="button" class="am-btn am-radius am-btn-xs am-btn-success" style="margin-top: -1px;">搜索</button></li>
    </ul>
  </div>

    <form class="am-form am-g">
          <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
              <tr class="am-success">
              <th class="table-check"><input type="checkbox" /></th>
                <th>ID</th>
                <th>商品货号</th>
                <th>商品名称</th>
                <th>市场价</th>
                <th>现售价</th>
                <th>热卖</th>
                <th>上下架</th>
                <th>限时</th>
                <th width="280px">操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($goods as $good)
              <tr>
                <td><input type="checkbox" /></td>
                <td>{{$good->goods_id}}</td>
                <td>{{$good->goods_sn}}</td>
                <td><a href="#">{{$good->goods_name}}</a></td>
                <td>{{$good->market_price}}</td>
                <td>{{$good->shop_price}}</td>
                <td>
                  @if($good->is_hot==0)
                  <i class="am-icon-check am-text-warning"></i>
                  @else
                  <i class="am-icon-close am-text-primary"></i>
                  @endif
                </td>
                <td>
                   @if($good->is_delete==0)
                   <i class="am-icon-check am-text-warning"></i>
                   @else
                   <i class="am-icon-close am-text-primary"></i>
                   @endif
                </td>
                <td>
                   @if($good->is_seckill==0)
                   <i class="am-icon-check am-text-warning"></i>
                   @else
                   <i class="am-icon-close am-text-primary"></i>
                   @endif
                </td>

                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                       <a href="{{url('goodsattr/add')}}?goods_id={{$good->goods_id}}" class="am-btn am-btn-default am-btn-xs am-text-success am-round">属性</a>
                       <a href="{{url('product/add')}}?goods_id={{$good->goods_id}}&goods_sn={{$good->goods_sn}}&goods_name={{$good->goods_name}}" class="am-btn am-btn-default am-btn-xs am-text-success am-round">产品</a>
                       <a href="{{url('goods/picture')}}?goods_id={{$good->goods_id}}" class="am-btn am-btn-default am-btn-xs am-text-success am-round">图片</a>
                       <a href="" class="am-btn am-btn-default am-btn-xs am-text-success am-round">删除</a>
                       <a href="" class="am-btn am-btn-default am-btn-xs am-text-success am-round">修改</a>
                    </div>
                  </div>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
          <ul class="am-pagination am-fr">
                {{$goods->links()}}
          </ul>
    </form>

</div>
@endsection
