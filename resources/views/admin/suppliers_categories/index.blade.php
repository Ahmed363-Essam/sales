@extends('admin.layouts.admin')
@section('title')
    الموردين
@endsection

@section('contentheader')
    الحسابات
@endsection

@section('contentheaderlink')
    <a href="{{ route('Accounts.index') }}"> الموردين </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection



@section('content')



    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center">بيانات الموردين </h3>


            <a href="{{ route('suppliers_cat.create') }}" class="btn btn-sm btn-success">اضافة جديد</a>
        </div>
        @if (session()->has('edit'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('edit') }}</strong>
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


        @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" checked name="searchbyradio" id="searchbyradio" value="suuplier_code"> برقم المورد
                    <input type="radio" name="searchbyradio" id="searchbyradio" value="account_number"> برقم الحساب
                    <input type="radio" name="searchbyradio" id="searchbyradio" value="name"> بالاسم
                    <input autofocus style="margin-top: 6px !important;" type="text" id="search_by_text"
                        placeholder=" اسم  - رقم الحساب  - كود المرود" class="form-control"> <br>

                </div>

            </div>
            <div class="clearfix"></div>

            <div id="ajax_responce_serarchDiv" class="col-md-12">

                @if (@isset($data) && !@empty($data) && count($data) > 0)
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="custom_thead">
                            <th>مسلسل</th>
                            <th>اسم الفئة</th>
                            <th>حالة التفعيل</th>
                            <th> تاريخ الاضافة</th>
                            <th> تاريخ التحديث</th>
                            <th></th>

                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>
                                        @if ($info->active == 1)
                                            مفعل
                                        @else
                                            معطل
                                        @endif
                                    </td>
                                    <td>

                                        @php
                                            $dt = new DateTime($info->created_at);
                                            $date = $dt->format('Y-m-d');
                                            $time = $dt->format('h:i');
                                            $newDateTime = date('A', strtotime($time));
                                            $newDateTimeType = $newDateTime == 'AM' ? 'صباحا ' : 'مساء';
                                        @endphp
                                        {{ $date }} <br>
                                        {{ $time }}
                                        {{ $newDateTimeType }} <br>
                                        بواسطة
                                        {{ $info->admin->name }}


                                    </td>

                                    <td>
                                        @if ($info->updated_by > 0 and $info->updated_by != null)
                                            @php
                                                $dt = new DateTime($info->updated_at);
                                                $date = $dt->format('Y-m-d');
                                                $time = $dt->format('h:i');
                                                $newDateTime = date('A', strtotime($time));
                                                $newDateTimeType = $newDateTime == 'AM' ? 'صباحا ' : 'مساء';
                                            @endphp
                                            {{ $date }} <br>
                                            {{ $time }}
                                            {{ $newDateTimeType }} <br>
                                            بواسطة
                                    

                                                @if (isset($info->updated_by))
                                                    {{ $info->admin2->name }}
                                                @else
                                                    لا يوجد
                                                @endif
                                                
                                     
                                        @else
                                            لايوجد تحديث
                                        @endif

                                    </td>


                                    <td>


                                        <a href="{{ route('suppliers_cat.edit', $info->id) }}"
                                            class="btn btn-sm  btn-primary">تعديل</a>
                                            <form style="display: inline-block" action="{{ route('suppliers_cat.destroy',$info->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                               <button type="submit" class="btn btn-danger"> حذف </button>
                                            </form>
                              
                                    </td>


                                </tr>
                                @php
                                   
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
    <script src="{{ asset('admin/js/suppliers.js') }}"></script>
@endsection
