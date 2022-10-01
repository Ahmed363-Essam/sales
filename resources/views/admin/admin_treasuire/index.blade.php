@extends('admin.layouts.admin')

@section('title')
    بيانات الخزن
@endsection

@section('contentheader')
    الخزن
@endsection

@section('contentheaderlink')
    <a href="#"> الصفحة الرئيسة </a>
@endsection

@section('contentheaderactive')
    الخزن
@endsection



@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات الخزن</h3>
                    <a href="{{ route('Treasures.create') }}" class="btn btn-sm btn-success">اضافة جديد</a>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
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
                <input type="text" id="search_by_name" name="search_by_name">
                <!-- /.card-header -->
                <div class="card-body">

                    @if (@isset($data) && !@empty($data))
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="custom_thead">
                                <th>مسلسل</th>
                                <th>اسم الخزنة</th>
                                <th>هل رئيسية</th>
                                <th>اخر ايصال صرف</th>
                                <th>اخر ايصال تحصيل</th>
                                <th>حالة التفعيل</th>
                                <th></th>

                            </thead>
                            <tbody id="ajax_data">
                                <?php $i = 0; ?>
                                @foreach ($data as $info)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->name }}</td>
                                        <td>
                                            @if ($info->is_master == 1)
                                                رئيسية
                                            @else
                                                فرعية
                                            @endif
                                        </td>
                                        <td>{{ $info->last_isal_exchange }}</td>
                                        <td>{{ $info->last_isal_collect }}</td>
                                        <td>
                                            @if ($info->active == 1)
                                                مفعل
                                            @else
                                                معطل
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('Treasures.edit', $info->id) }}"
                                                class="btn btn-sm  btn-primary">تعديل</a>
                                            <a href="{{ route('Treasures.show', $info->id) }}"
                                                class="btn btn-sm  btn-info">المزيد</a>

                                        </td>


                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach



                            </tbody>
                        </table>
                        {{ $data->links() }}
                    @else
                        <div class="alert alert-danger" role="alert">
                            عفوا لا يوجد بيانات لعرضها
                        </div>
                    @endif





                </div>
            </div>
        </div>
    </div>


    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/treasuries.js') }}"></script>
@endsection
