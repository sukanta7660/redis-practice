<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
    <img
       src="{{ asset('img/AdminLTELogo.png') }}"
       alt="AdminLTE Logo"
       class="brand-image img-circle elevation-3"
       style="opacity: 0.8"
       />
    <span class="brand-text font-weight-light">Online-Exam</span>
    </a>
    <div class="sidebar">
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
             <img
                src="{{ asset('img/user1-128x128.jpg') }}"
                class="img-circle elevation-2"
                alt="User Image"
                />
          </div>
          <div class="info">
             <a href="#" class="d-block">{{ auth()->user()->userRole }}</a>
          </div>
       </div>
       <nav class="mt-2">
          <ul
             class="nav nav-pills nav-sidebar flex-column"
             data-widget="treeview"
             role="menu"
             data-accordion="false"
             >
             <li class="nav-item has-treeview">
                <a
                   href="{{ route('admin.dashboard.index') }}"
                   class="
                   nav-link
                   {{ Request::path() === 'admin/dashboard' ? 'active' : '' }}
                   ">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>Dashboard</p>
                </a>
             </li>
             <li class="nav-item">
                <a
                   href="{{ route('admin.exams.index') }}"
                   class="
                   nav-link
                   {{ Request::path() === 'admin/exams' ? 'active' : '' }}
                   "
                   >
                   <i class="nav-icon fas fa-file"></i>
                   <p>Exam List</p>
                </a>
             </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-users"></i>
                   <p>Candidate</p>
                </a>
             </li>
          </ul>
       </nav>
    </div>
 </aside>
