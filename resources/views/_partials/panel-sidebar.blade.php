<ul>
    <li class="item-li i-dashboard @if(request()->is('dashboard')) is-active @endif "><a href="{{route('dashboard')}}">پیشخوان</a></li>
    <li class="item-li i-users @if(request()->is('panel/users') || request()->is('panel/users/*')) is-active @endif"><a href="{{route('users.index')}}"> کاربران</a></li>
    <li class="item-li i-categories @if (request()->is('zz')) is-active @endif"><a href="categories.html">دسته بندی ها</a></li>
    <li class="item-li i-articles @if (request()->is('zz')) is-active @endif"><a href="articles.html">مقالات</a></li>
    <li class="item-li i-comments @if (request()->is('zz')) is-active @endif"><a href="comments.html"> نظرات</a></li>
    <li class="item-li i-user__inforamtion @if (request()->is('zz')) is-active @endif"><a href="user-information.html">اطلاعات کاربری</a></li>
</ul>
