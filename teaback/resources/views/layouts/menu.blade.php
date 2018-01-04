
<div class="nav-navicon admin-main admin-sidebar">
    <div class="sideMenu am-icon-dashboard" style="color:#aeb2b7; margin: 10px 0 0 0;"> 欢迎系统管理员：清风抚雪</div>
    <div class="sideMenu">
      <!-- <h3 class="am-icon-flag"><em></em> <a href="#">商品管理</a></h3>
      <ul>
        <li><a href="{{ url('product/index') }}">商品列表</a></li>
        <li><a href="{{ url('product/increase') }}">添加新商品</a></li>
        <li><a href="{{ url('category/index') }}">商品分类</a></li>
        <li><a href="{{ url('product/index') }}">商品列表</a></li>
        <li><a href="{{ url('product/index') }}">商品列表</a></li>
      </ul> -->
      @foreach($arr as $k=>$v)
      <h3 class="am-icon-cart-plus"><em></em> <a href="#">{{$k}}</a></h3>
      <ul>
        @foreach($v as $val)
       
        <li><a href="{{ url($val->route) }}">{{$val->powername}}</a></li>
        @endforeach
      </ul>
      @endforeach
      
      
    </div>
    <!-- sideMenu End -->
</div>
