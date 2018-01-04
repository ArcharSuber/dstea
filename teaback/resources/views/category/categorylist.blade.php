@extends('layouts.main')

@section('content')

 <div class="admin-biaogelist">
   <div class="listbiaoti am-cf">
     <ul class="am-icon-flag on">
       分类管理
     </ul>
     <dl class="am-icon-home" style="float: right;">
       当前位置： 分类列表 > <a href="{{url('category/add')}}">分类添加</a>
     </dl>
   </div>
   <form class="am-form am-g">
     <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
       <thead>
         <tr class="am-success">
           <th class="table-id am-text-center">ID</th>
           <th class="table-title">分类名称</th>
           <th class="table-type">PID</th>
           
           <th width="163px" class="table-set">操作</th>
         </tr>
       </thead>
       <tbody>
        @foreach($category as $cate)
         <tr>
           <td class="am-text-center">{{ $cate->category_id }}</td>
           <td>{{str_repeat('&nbsp;',(($cate->level)-1)*6)}}{{$cate->category_name}}</td>
           <td>{{ $cate->parent_id }}</td>
           <td><div class="am-btn-toolbar">
               <div class="am-btn-group am-btn-group-xs">
               <a class="am-btn am-btn-default am-btn-xs am-text-success am-round am-icon-file" data-am-modal="{target: '#my-popups'}" href="{{url('category/upd?category_id=').$cate->category_id}}" title="添加子栏目"></a>
                 <button class="am-btn am-btn-default am-btn-xs am-text-danger am-round"  title="删除"><span class="am-icon-trash-o"></span></button>
               </div>
             </div></td>
         </tr>
        @endforeach
       </tbody>
     </table>
     
   
  
   </form>
 </div>
 @endsection
