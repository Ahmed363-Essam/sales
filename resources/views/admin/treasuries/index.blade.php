@extends('admin.layouts.admin')

@section('title')
test view title
@endsection

@section('contentheader')
الضبط
@endsection

@section('contentheaderlink')
<a href="#"> الصفحة الرئيسة </a>
@endsection

@section('contentheaderactive')
الضبط
@endsection



@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @if (@isset($data) && !@empty($data))
                        <table id="example2" class="table table-bordered table-hover">

                            <tr>
                                <td class="width30">اسم الشركة</td>
                                <td> {{ $data->system_name }}</td>
                            </tr>

                            <tr>
                                <td class="width30">كود الشركة</td>
                                <td> {{ $data->com_code }}</td>
                            </tr>

                            <tr>
                                <td class="width30">حالة الشركة</td>
                                <td>
                                    @if ($data->active == 1)
                                        مفعل
                                    @else
                                        غير مفعل
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="width30">عنوان الشركة</td>
                                <td>{{ $data->address }}</td>
                            </tr>

                            <tr>
                                <td class="width30">هاتف الشركة</td>
                                <td> {{ $data->phone }} </td>
                            </tr>

                            <tr>
                                <td class="width30"> التنبيه اعلي الشاشة للشركة</td>
                                <td> {{ $data->general_alert }}</td>
                            </tr>
                            <tr>
                                <td class="width30"> لوجو الشركة</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ asset('admin/upload/settings') . '/' . $data['photo'] . '/'. $data['photo'] }} " alt="" class="custom_img">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="width30">  اخر تحديث</td>
                                <td>  <a class="btn btn-sm btn-success" href="{{ route('AdminSetting.edit',$data->com_code ) }}"> edit </a></td>

                            </tr>
                           




                        </table>
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
