   <!-- ========== Left Sidebar Start ========== -->
   <div class="left-side-menu">

         <!-- LOGO -->
         <a href="index.html" class="logo text-center logo-light">
               <span class="logo-lg">
                     <img src="{{asset('template/assets/images/logo.png')}}" alt="" height="16">
               </span>
               <span class="logo-sm">
                     <img src="{{asset('template/assets/images/logo_sm.png')}}" alt="" height="16">
               </span>
         </a>

         <!-- LOGO -->
         <a href="index.html" class="logo text-center logo-dark">
               <span class="logo-lg">
                     <img src="{{asset('template/assets/images/logo-dark.png')}}" alt="" height="16">
               </span>
               <span class="logo-sm">
                     <img src="{{asset('template/assets/images/logo_sm_dark.png')}}" alt="" height="16">
               </span>
         </a>

         <div class="h-100" id="left-side-menu-container" data-simplebar>

               <!--- Sidemenu -->
               <ul class="metismenu side-nav">

                     <li class="side-nav-title side-nav-item">Navigation</li>

                     <li class="side-nav-item">
                           <a href="javascript: void(0);" class="side-nav-link">
                                 <i class="uil-home-alt"></i>
                                 <span class="badge badge-success float-right">4</span>
                                 <span> Users </span>
                           </a>
                           <ul class="side-nav-second-level" aria-expanded="false">
                                 <li>
                                       <a href="{{route('add')}}">thêm danh mục</a>
                                 </li>
                                 <li>
                                       <a href="{{route('list')}}">danh sách danh mục</a>
                                 </li>
                                 <li>
                                       <a href="{{route('products.add')}}">thêm sản phẩm</a>
                                 </li>
                                 <li>
                                       <a href="{{route('products.list')}}">danh sách sản phẩm</a>
                                 </li>
                                 <li>
                                       <a href="index.html">Ecommerce</a>
                                 </li>
                                 <li>
                                       <a href="dashboard-projects.html">Projects</a>
                                 </li>
                           </ul>
                     </li>





               </ul>


               <div class="clearfix"></div>

         </div>
         <!-- Sidebar -left -->

   </div>
   <!-- Left Sidebar End -->