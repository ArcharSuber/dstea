@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">
    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 类型管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 类型列表 > <a href="{{ url('attrtype/typeadd') }}">类型添加</a></dl>
    </div>
    <form class="am-form am-g">
          <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
              <tr class="am-success">
                <th class="table-id">ID</th>
                <th class="table-title">类型名称</th>
                <th width="163px" class="table-set">操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
              <tr>
                <td>{{$type->type_id}}</td>
                <td><a href="#">{{$type->type_name}}</a></td>
                <td>
                   <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="{{url('attrtype/typeupd')}}?type_id={{$type->type_id}}" class="am-btn am-btn-default am-btn-xs am-text-secondary am-round">修改</a>
                      <a href="{{url('attrtype/typedel')}}?type_id={{$type->type_id}}" class="am-btn am-btn-default am-btn-xs am-text-secondary am-round">删除</a>
                    </div>
                   </div>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>

           <ul class="am-pagination am-fr">
                {{$types->links()}}
            </ul>
          
    </form>

</div>
@endsection
