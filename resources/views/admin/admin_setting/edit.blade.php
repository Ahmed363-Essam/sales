@extends('admin.layouts.admin')

@section('title')
    تعديل الاعدادات
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
                        <form action="{{ route('AdminSetting.update','test') }}" method="post"
                            enctype="multipart/form-data">
        
                            {{ method_field('PUT') }}
                            @csrf

                            <input type="hidden" value="{{ $data->id }}" name="id">
                            <div class="form-group">
                                <label>اسم الشركة</label>
                                <input name="system_name" id="system_name" class="form-control"
                                    value="{{ $data['system_name'] }}" placeholder="ادخل اسم الشركة"
                                    oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                                @error('system_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>عنوان الشركة</label>
                                <input name="address" id="address" class="form-control" value="{{ $data['address'] }}"
                                    placeholder="ادخل اسم الشركة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>هاتف الشركة</label>
                                <input name="phone" id="phone" class="form-control" value="{{ $data['phone'] }}"
                                    placeholder="ادخل اسم الشركة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


             
                 
                            <div class="form-group">
                                <label>رسالة تنبية اعلي الشاشة </label>
                                <input name="general_alert" id="general_alert" class="form-control"
                                    value="{{ $data['general_alert'] }}" placeholder="ادخل اسم الشركة"
                                    oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                    onchange="try{setCustomValidity('')}catch(e){}">
                            </div>

                            <input type="file" name="photo">

                            <div class="form-group">
                                <label>شعار الشركة</label>
                                <div class="image">
                                    <img class="custom_img"  src="{{ asset('admin/upload/settings') . '/' . $data['photo'] . '/'. $data['photo'] }}"
                                        alt="لوجو الشركة">
                                    <button type="button" class="btn btn-sm btn-danger" id="update_image">تغير
                                        الصورة</button>
                                    <button type="button" class="btn btn-sm btn-danger" style="display: none;"
                                        id="cancel_update_image"> الغاء</button>



                                </div>
                                <div id="oldimage">

                                </div>


                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
                            </div>


                        </form>
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
