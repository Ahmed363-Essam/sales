@extends('admin.layouts.admin')
@section('title')
    العملاء
@endsection

@section('contentheader')
    ضبط المخازن
@endsection

@section('contentheaderlink')
    <a href="{{ route('Customers.index') }}"> العملاء </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection



@section('content')



    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">بيانات العملاء </h3>
   

            <a href="{{ route('Customers.create') }}" class="btn btn-sm btn-success">اضافة جديد</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" checked name="searchbyradio" id="searchbyradio" value="customer_code"> برقم العميل
                    <input type="radio" name="searchbyradio" id="searchbyradio" value="account_number"> برقم الحساب

                    <input type="radio" name="searchbyradio" id="searchbyradio" value="name"> بالاسم

                    <input autofocus style="margin-top: 6px !important;" type="text" id="search_by_text"
                        placeholder=" اسم  - رقم الحساب  - كود العميل" class="form-control"> <br>

                </div>

            </div>
            <div class="clearfix"></div>

            <div id="ajax_responce_serarchDiv" class="col-md-12">

                @if (@isset($data) && !@empty($data) && count($data) > 0)
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="custom_thead">

                            <th>الاسم </th>
                            <th> الكود </th>
                            <th> رقم الحساب </th>
                            <th> الرصيد </th>
                            <th>حالة التفعيل</th>
                            <th></th>

                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>

                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->customer_code }}</td>


                                    <td>{{ $info->AccCustomer->name }}</td>
                                    <td></td>

                                    <td>
                                        @if ($info->is_archived == 1)
                                            مفعل
                                        @else
                                            معطل
                                        @endif
                                    </td>

                                    <td>

                                        <a href="{{ route('Customers.edit', $info->id) }}"
                                            class="btn btn-sm  btn-primary">تعديل</a>
                 
                                            <form action="{{ route('Customers.destroy', $info->id) }}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('delete')
    
                                                <button type="submit" class="btn btn-sm are_you_shue  btn-danger">حذف</button>
                                            </form>
                                        <a href="{{ route('Customers.show', $info->id) }}"
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
    <script src="{{ asset('admin/js/accounts.js') }}"></script>
@endsection
