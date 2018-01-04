@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 权限管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">权限添加</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="" method="post">
        <div class="am-form-group am-cf">
          <div class="zuo">权限名称：</div>
          <div class="you">
            <input type="text" name="powername" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入名称">
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">权限分类：</div>
          <div class="you">
            <select name="pid">
            	<option value="0">顶级管理</option>
            	<option>管理员管理</option>
            </select>
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">权限路由：</div>
          <div class="you">
            <input type="text" name="route" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入名称">
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
