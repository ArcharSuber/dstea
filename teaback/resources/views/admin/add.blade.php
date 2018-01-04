@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 管理员</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">管理员列表</a></dl>
    </div>

    <div class="fbneirong">
      <form class="am-form" action="" method="post">
        <div class="am-form-group am-cf">
          <div class="zuo">管理员名称：</div>
          <div class="you">
            <input type="text" name="username" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入标题">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">邮箱：</div>
          <div class="you">
            <input type="email" name="email" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入邮箱">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">密码：</div>
          <div class="you">
            <input type="password" class="am-input-sm" id="doc-ipt-pwd-1" name="password" placeholder="请输入密码">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">确认密码：</div>
          <div class="you">
                  <input type="password" name="qpassword" class="am-input-sm" id="doc-ipt-pwd-1">
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
