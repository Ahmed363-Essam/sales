<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth('admin')->user()->name }} </a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            الضبط العام
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('AdminSetting.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الضبط العام

                                </p>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a href="{{ route('Treasures.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الخزن

                                </p>
                            </a>
                        </li>

                    </ul>
                </li>



                

                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                    الحسابات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('accountTypes.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    انواع الحسابات المالية

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('Accounts.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                     الحسابات المالية

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('suppliers_cat.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
        
                                    فئات الموردين
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('suppliers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
        
                                    حسابات الموردين
                                </p>
                            </a>
                        </li>

                        


                    </ul>
                </li>






                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           ضبط المخازن
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">





                        <li class="nav-item">
                            <a href="{{ route('sales_material_types.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات فئات الفواتير
        
                                </p>
                            </a>
                        </li>
        
                        <li class="nav-item">
                            <a href="{{ route('store.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات المخازن
        
                                </p>
                            </a>
                        </li>
        
                        <li class="nav-item">
                            <a href="{{ route('uoms.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الوحدات
        
                                </p>
                            </a>
                        </li>
        
                        <li class="nav-item">
                            <a href="{{ route('inv_itemcard_categories.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
        
                                    فئات الاصناف
                                </p>
                            </a>
                        </li>
        
                        <li class="nav-item">
                            <a href="{{ route('itemcard.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
        
                                    الاصناف
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('Customers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
        
                                    العملاء
                                </p>
                            </a>
                        </li>



            
        
                    </ul>
                </li>








                
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                    حركات مخزنية
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('AdminSetting.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الضبط العام

                                </p>
                            </a>
                        </li>


                    </ul>
                </li>

                
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                     المبيعات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('AdminSetting.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الضبط العام

                                </p>
                            </a>
                        </li>


                    </ul>
                </li>



                                
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                     خدمات داخلية و خارجية
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('AdminSetting.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الضبط العام

                                </p>
                            </a>
                        </li>


                    </ul>
                </li>
                                                
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                    حركة شفت   الخزينة
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('AdminSetting.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الضبط العام

                                </p>
                            </a>
                        </li>


                    </ul>
                </li>


                                                              
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                    الصلاحيات و المستخدمين
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('AdminSetting.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الضبط العام

                                </p>
                            </a>
                        </li>


                    </ul>
                </li>
                                                                              
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                    التقارير
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('AdminSetting.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الضبط العام

                                </p>
                            </a>
                        </li>


                    </ul>
                </li>

                                                                                              
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                    المراقبة و الدعم الفني
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('AdminSetting.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    بيانات الضبط العام

                                </p>
                            </a>
                        </li>


                    </ul>
                </li>






            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
