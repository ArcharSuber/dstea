@extends('layouts.main')

@section('content')
<div class="admin-biaogelist">
    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 属性管理</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 属性列表 > <a href="{{ url('attrtype/attradd') }}">属性添加</a></dl>
    </div>
    <form class="am-form am-g">
          <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
              <tr class="am-success">
                <th class="table-id">ID</th>
                <th class="table-title">属性名称</th>
                <th class="table-title">所属类型</th>
                <th class="table-title">属性值</th>
                <th class="table-title">属性|规格</th>
                <th width="163px" class="table-set">操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($attrs as $attr)
              <tr>
                <td>{{$attr->attr_id}}</td>
                <td><a href="#">{{$attr->attr_name}}</a></td>
                <td>{{$attr->type_name}}</td>
                <td>{{$attr->attr_values}}</td>
                <td>
                     @if($attr->attr_type==1)
                        属性
                     @else
                        规格
                     @endif
                </td>
                <td>
                   <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="{{url('attrtype/attrupd')}}?attr_id={{$attr->attr_id}}" class="am-btn am-btn-default am-btn-xs am-text-secondary am-round">修改</a>
                      <a href="{{url('attrtype/attrdel')}}?attr_id={{$attr->attr_id}}" class="am-btn am-btn-default am-btn-xs am-text-secondary am-round">删除</a>
                    </div>
                   </div>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>

           <ul class="am-pagination am-fr">
                
            </ul>
          
    </form>

</div>
@endsection
