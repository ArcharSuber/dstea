@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 品牌管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 品牌修改 > <a href="{{ url('brand/index') }}">品牌列表</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="{{ url('brand/upd')}}" method="post" enctype="multipart/form-data">
      	{{csrf_field()}}
         <input type="hidden" name="brand_id" value="{{$brand->brand_id}}">
        <div class="am-form-group am-cf">
          <div class="zuo">品牌名称:</div>
          <div class="you">
            <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="am-input-sm" placeholder="请输入品牌名称">
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">品牌官网:</div>
          <div class="you">
            <input type="text" name="brand_url" value="{{$brand->brand_url}}" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入品牌官网">
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">品牌LOG:</div>
          <div class="you">
            <img src="{{ asset('') }}{{$brand->brand_logo}}" width="80px" height="80px"><br>
            <input type="file" name="brand_logo" class="am-input-sm">
          </div>
        </div>
         
        <div class="am-form-group am-cf">
          <div class="zuo">前台展示:</div>
          <div class="you">
            @if($brand->is_show==1)
                <input type="checkbox" name="is_show" class="am-input-sm" value="1" checked="true">
            @else
               <input type="checkbox" name="is_show" value="0" class="am-input-sm">
            @endif
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">排序:</div>
          <div class="you">
            <input type="text" name="sort" value="{{$brand->sort}}" class="am-input-sm" id="doc-ipt-email-1">
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">品牌描述:</div>
          <div class="you">
            <textarea value="" rows="2" id="doc-ta-1" name="brand_desc">{{$brand->brand_desc}}</textarea>
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
