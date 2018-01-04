@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 分类管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 分类添加 > <a href="{{url('category/index')}}">分类列表</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="add" method="post">
      	{{csrf_field()}}
        <div class="am-form-group am-cf">
          <div class="zuo">分类名称:</div>
          <div class="you">
            <input type="text" name="category_name" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入标题">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">选择父分类：</div>
          <div class="you">
            <select name="parent_id">
            	<option value="0">----默认顶级分类----</option>
                @foreach($category as $cate)
            	<option value="{{$cate->category_id}}">{{str_repeat('&nbsp;',(($cate->level)-1)*6)}}{{$cate->category_name}}</option>
                @endforeach
            </select>
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
