@extends('admin.layouts.admin')
@section('title')
    الضبط العام
@endsection

@section('contentheader')
    فئات الفواتير
@endsection

@section('contentheaderlink')
    <a href=""> فئات الفواتير </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection



@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات فئات الفواتير</h3>
                    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                    <input type="hidden" id="ajax_search_url" value="">

                    <a href="{{ route('sales_material_types.create') }}" class="btn btn-sm btn-success">اضافة جديد</a>
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

                    <div id="ajax_responce_serarchDiv">

                        @if (@isset($data) && !@empty($data))
                            @php
                                $i = 1;
                            @endphp
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
                                            <td>{{ $i }}</td>
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
                                                    {{ $data['updated_by_admin'] }}
                                                    {{ $info->adminup->name }}
                                                @else
                                                    لايوجد تحديث
                                                @endif

                                            </td>


                                            <td>


                                                <a href="{{ route('sales_material_types.edit',$info->id) }}" class="btn btn-sm  btn-primary">تعديل</a>

                                                <form action="{{ route('sales_material_types.destroy', $info->id) }}"
                                                    method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm are_you_shue  btn-danger">حذف</button>
                                                </form>


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
    </div>





@endsection

@section('script')
    <script src="{{ asset('assets/admin/js/treasuries.js') }}"></script>
@endsection
