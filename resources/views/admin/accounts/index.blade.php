@extends('admin.layouts.admin')
@section('title')
    الحسابات
@endsection

@section('contentheader')
    الحسابات المالية
@endsection

@section('contentheaderlink')
    <a href="{{ route('Accounts.index') }}"> الحسابات المالية </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection



@section('content')


    @if (session()->has('edit'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">بيانات الحسابات المالية </h3>


            <a href="{{ route('Accounts.create') }}" class="btn btn-sm btn-success">اضافة جديد</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" checked name="searchbyradio" id="searchbyradio" value="account_number"> برقم
                    الحساب
                    <input type="radio" name="searchbyradio" id="searchbyradio" value="name"> بالاسم

                    <input style="margin-top: 6px !important;" type="text" id="search_by_text"
                        placeholder=" اسم  - رقم الحساب" class="form-control"> <br>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label> بحث بنوع الحساب</label>
                        <select name="account_type_search" id="account_type_search" class="form-control ">
                            <option value="all"> بحث بالكل</option>
                            @if (@isset($account_types) && !@empty($account_types))
                                @foreach ($account_types as $info)
                                    <option value="{{ $info->id }}"> {{ $info->name }} </option>
                                @endforeach
                            @endif
                        </select>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label> هل الحساب أب</label>
                        <select name="is_parent_search" id="is_parent_search" class="form-control">
                            <option value="all"> بحث بالكل</option>
                            <option value="1"> نعم</option>
                            <option value="0"> لا</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div id="ajax_responce_serarchDiv" class="col-md-12">

                @if (@isset($data) && !@empty($data) && count($data) > 0)
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="custom_thead">

                            <th>الاسم </th>
                            <th> رقم الحساب </th>
                            <th> النوع </th>
                            <th> هل أب </th>
                            <th> الحساب الاب </th>
                            <th> الرصيد </th>
                            <th>حالة التفعيل</th>
                            <th></th>

                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>

                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->account_number }}</td>
                                    <td>{{ $info->accountType->name }}</td>
                                    <td>
                                        @if ($info->is_parent == 1)
                                            نعم
                                        @else
                                            لا
                                        @endif
                                    </td>
                                    <td>
                                        @if ($info->is_parent == 1)
                                            {{ $info->Acc->name }}
                                        @else
                                            لا يوجد
                                        @endif
                                    </td>
                                    <td></td>

                                    <td>
                                        @if ($info->is_archived == 0)
                                            مفعل
                                        @else
                                            معطل
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('Accounts.edit', $info->id) }}"
                                            class="btn btn-sm  btn-primary">تعديل</a>

                                        <form action="{{ route('Accounts.destroy', $info->id) }}" method="post"
                                            style="display: inline-block">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-sm are_you_shue  btn-danger">حذف</button>
                                        </form>

                                        <a href="{{ route('Accounts.show', $info->id) }}"
                                            class="btn btn-sm   btn-info">عرض</a>

                                    </td>


                                </tr>
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
    <script src="{{ asset('assets/admin/js/accounts.js') }}"></script>
@endsection
