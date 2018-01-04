@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 角色管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">角色添加</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="" method="post">
        <div class="am-form-group am-cf">
          <div class="zuo">角色名称：</div>
          <div class="you">
            <input type="text" name="rolename" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入名称">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">所有的权限：</div>
          <div class="you">
            
               <input type="checkbox" name="power_id[]" value="管理员管理">管理员管理
               <input type="checkbox" name="power_id[]" value="管理员添加">管理员添加
               <input type="checkbox" name="power_id[]" value="管理员列表">管理员列表
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
