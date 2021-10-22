<x-panel-layout>
    <x-slot name="title">
        - مدیریت دسته بندی ها
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('categories.index') }}" class="is-active">دسته بندی ها</a></li>
        </ul>
    </div>
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=0; @endphp
                        @foreach($categories as $category)
                        <tr role="row" class="">
                            <td>{{++$i}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->category_id}}</td>
                            <td>
                                <a href="" class="item-delete mlg-15" title="حذف"></a>
                                <a href="edit-category.html" class="item-edit " title="ویرایش"></a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                <form action="{{route('categories.store')}}" method="post" class="padding-30">
                    @csrf
                    <input type="text" name="name" placeholder="نام دسته بندی" class="text">
                    @error('name')
                    <P class="error">{{$message}}</P>
                    @enderror
                    <input type="text" name="slug" placeholder="نام انگلیسی دسته بندی" class="text">
                    @error('slug')
                    <P class="error">{{$message}}</P>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select class="select" name="category_id" id="category_id">
                        <option value="">ندارد</option>
                        @foreach($parent_categories as $parent)
                        <option value="{{$parent->id}}">{{$parent->name}} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <P class="error">{{$message}}</P>
                    @enderror
                    <button class="btn btn-webamooz_net">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
</x-panel-layout>
