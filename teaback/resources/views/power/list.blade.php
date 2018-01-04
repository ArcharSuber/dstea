@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">
    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 权限管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">权限列表</a></dl>

      <dl>
        <button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus"> <a href="{{ url('poweradd') }}">权限添加</a></button>
      </dl>
    </div>

    <form class="am-form am-g">
          <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
              <tr class="am-success">
                <th class="table-id">ID</th>
                <th class="table-title">权限名称</th>
                <th class="table-type">权限路由</th>
                <th class="table-type">PID</th>
                <th width="163px" class="table-set">操作</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>99</td>
                <td><a href="#">管理员管理</a></td>
                <td>123@qq.com</td>
                <td>13521482689</td>
                <td class="am-hide-sm-only">0</td>
                <td><div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-success am-round"><span class="am-icon-search"></span> </button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary am-round"><span class="am-icon-pencil-square-o"></span></button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-danger am-round"><span class="am-icon-trash-o"></span></button>
                    </div>
                  </div></td>
              </tr>
              
            </tbody>
          </table>

           
          
    </form>

</div>
@endsection
