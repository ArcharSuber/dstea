@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 属性管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 类型添加 > <a href="{{url('attrtype/attrindex')}}">属性列表</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="{{url('attrtype/attrupd')}}" method="post">
      	{{csrf_field()}}
      	<input type="hidden" name="attr_id" value="{{$attr->attr_id}}">
        <div class="am-form-group am-cf">
          <div class="zuo">属性名称:</div>
          <div class="you">
            <input type="text" name="attr_name" class="am-input-sm" id="doc-ipt-email-1" value="{{$attr->attr_name}}" placeholder="请输入名称">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">所属商品类型:</div>
          <div class="you">
            <select name="type_id">
              @foreach($types as $type)
                 @if($type->type_id==$attr->type_id)
                    <option value="{{$type->type_id}}" selected="true">{{$type->type_name}}</option>
                 @else
                     <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                 @endif
              @endforeach
            </select>
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">属性|规格:</div>
          <div class="you">
             @if($attr->attr_type==1)
              <input type="radio" checked="true" name="attr_type" value="1">属性
              <input type="radio" name="attr_type" value="2">规格
             @else
               <input type="radio" name="attr_type" value="1">属性
               <input type="radio" checked="true" name="attr_type" value="2">规格
             @endif
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">属性值:</div>

          <div class="you">
            <span>以逗号的形式拼接属性值</span>
            <textarea name="attr_values" rows="2" id="doc-ta-1">{{$attr->attr_values}}</textarea>
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="you" style="margin-left: 11%;">
              <button type="submit" class="am-btn am-btn-success am-radius">修改</button>

          </div>
        </div>
      </form>
    </div>
</div>
@endsection
