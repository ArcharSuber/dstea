@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 类型管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 类型添加 > <a href="{{url('arrttype/typeindex')}}">类型列表</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="{{url('attrtype/typeadd')}}" method="post">
      	{{csrf_field()}}
        <div class="am-form-group am-cf">
          <div class="zuo">类型名称:</div>
          <div class="you">
            <input type="text" name="type_name" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入名称">
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
