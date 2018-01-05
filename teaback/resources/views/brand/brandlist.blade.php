@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">
    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 栏目名称</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="{{ url('brand/add') }}">品牌添加</a></dl>

      <dl>
        <button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus"> <a href="{{ url('brand/add') }}">添加品牌</a></button>
      </dl>
    </div>
    <form class="am-form am-g">
          <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
              <tr class="am-success">
                <th class="table-id">ID</th>
                <th class="table-title">品牌名/logo</th>
                <th class="table-type">简短描述</th>
                <th class="table-type">排序</th>
                <th class="table-author am-hide-sm-only">是否展示</th>
                <th width="163px" class="table-set">操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach($brands as $brand)
              <tr>
                <td>{{$brand->brand_id}}</td>
                <td><img src="{{ asset('') }}{{$brand->brand_logo}}" width="80px" height="80px"><br><a href="#">{{$brand->brand_name}}</a></td>
                <td>{{$brand->brand_desc}}</td>
                <td>{{$brand->sort}}</td>
                <td>
                  @if($brand->is_show ==1)
                     <i class="am-icon-check am-text-warning"></i>
                  @else
                     <i class="am-icon-close am-text-primary"></i>
                  @endif
                </td>
                <td><div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="{{url('brand/upd')}}?brand_id={{$brand->brand_id}}" class="am-btn am-btn-default am-btn-xs am-text-secondary am-round">修改</a>
                      <a href="{{url('brand/del')}}?brand_id={{$brand->brand_id}}" class="am-btn am-btn-default am-btn-xs am-text-secondary am-round">删除</a>
                    </div>
                  </div>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>

             <ul class="am-pagination am-fr">
                {{$brands->links()}}
            </ul>
            
         
    </form>

</div>
@endsection
