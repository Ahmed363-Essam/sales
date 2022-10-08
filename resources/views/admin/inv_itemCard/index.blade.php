@extends('admin.layouts.admin')
@section('title')
    ضبط الاصناف
@endsection

@section('contentheader')
    الاصناف
@endsection

@section('contentheaderlink')
    <a href="{{ route('itemcard.index') }}"> الاصناف </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection



@section('content')



    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">بيانات الاصناف</h3>


            <a href="{{ route('itemcard.create') }}" class="btn btn-sm btn-success">اضافة جديد</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            @if (session()->has('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('delete') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('edit'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('edit') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


            <div class="row">
                <div class="col-md-4">
                    <input checked type="radio" name="searchbyradio" id="searchbyradio" value="barcode"> بالباركود
                    <input type="radio" name="searchbyradio" id="searchbyradio" value="item_code"> بالكود
                    <input type="radio" name="searchbyradio" id="searchbyradio" value="name"> بالاسم

                    <input style="margin-top: 6px !important;" type="text" id="search_by_text"
                        placeholder=" اسم - باركود - كود للصنف" class="form-control"> <br>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label> بحث بنوع الصنف</label>
                        <select name="item_type_search" id="item_type_search" class="form-control">
                            <option value="all"> بحث بالكل</option>
                            <option value="1"> مخزني</option>
                            <option value="2"> استهلاكي بتاريخ صلاحية</option>
                            <option value="3"> عهدة</option>
                        </select>

                        @error('item_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label> بحث بفئة الصنف</label>

                        <select name="inv_itemcard_categories_id_search" id="inv_itemcard_categories_id_search"
                            class="form-control ">
                            <option value="all"> بحث بالكل</option>
                            @if (@isset($inv_itemcard_categories) && !@empty($inv_itemcard_categories))
                                @foreach ($inv_itemcard_categories as $info)
                                    <option value="{{ $info->id }}"> {{ $info->name }} </option>
                                @endforeach
                            @endif
                        </select>
                        @error('inv_itemcard_categories_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="clearfix"></div>

                <div id="ajax_responce_serarchDiv" class="col-md-12">

                    @if (@isset($data) && !@empty($data))
                        @php
                            $i = 1;
                        @endphp
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="custom_thead">
                                <th>مسلسل</th>
                                <th>الاسم </th>
                                <th> النوع </th>
                                <th> الفئة </th>
                                <th> الصنف الاب </th>
                                <th> الوحدة الاب </th>
                                <th> الوحدة التجزئة </th>
                                <th>حالة التفعيل</th>

                                <th></th>

                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->name }}</td>
                                        <td>
                                            @if ($info->item_type == 1)
                                                مخزني
                                            @elseif($info->item_type == 2)
                                                استهلاكي بصلاحية
                                            @elseif($info->item_type == 3)
                                                عهدة
                                            @else
                                                غير محدد
                                            @endif
                                        </td>
                                        <td>{{ $info->invItemCardCat->name }}</td>
                                        <td>{{ $info->Inv_itemcard->name }}</td>
                                        <td>{{ $info->uomMain->name }}</td>
                                        @if ($info->retail_uom == null)
                                        <td>    لا يوجد </td>
                                        @else
                                        <td>{{ $info->retailUom->name }}</td>
                                        @endif
                                     


                                        <td>
                                            @if ($info->active == 1)
                                                مفعل
                                            @else
                                                معطل
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ route('itemcard.edit', $info->id) }}"
                                                class="btn btn-sm  btn-primary">تعديل</a>
                                                <form action="{{ route('itemcard.destroy', $info->id) }}"
                                                    method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm are_you_shue  btn-danger">حذف</button>
                                                </form>
                                            <a href="{{ route('itemcard.show', $info->id) }}"
                                                class="btn btn-sm   btn-info">عرض</a>

                                        </td>


                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach



                            </tbody>
                        </table>
                        <br>
                        {{ $data->links() }}
                    @else
                        <div class="alert alert-danger">
                            عفوا لاتوجد بيانات لعرضها !!
                        </div>
                    @endif

                </div>



            </div>

        </div>

    </div>





@endsection

@section('script')
    <script src="{{ asset('assets/admin/js/inv_itemcard.js') }}"></script>
@endsection
