<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview">
        <a href="#">
          <i class="fa fa-graduation-cap"></i>
          <span>Professionals</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{!! route('admin.professionals.index') !!}"><i class="fa fa-list"></i>All Professionals</a>
            <a href="{!! route('admin.professionals.create') !!}"><i class="fa fa-plus"></i>Add Professionals</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Students</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{!! route('admin.students.index') !!}"><i class="fa fa-list"></i>All Students</a>
            <a href="{!! route('admin.students.create') !!}"><i class="fa fa-plus"></i>Add Students</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-chart-pie"></i>
          <span>Plans</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{!! route('admin.plans.index') !!}"><i class="fa fa-list"></i>All Plans</a>
            <a href="{!! route('admin.plans.create') !!}"><i class="fa fa-plus"></i>Add Plan</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i>
          <span>Documents</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{!! route('admin.papers.index') !!}"><i class="fa fa-list"></i>All Documents</a>
            <a href="{!! route('admin.papers.create') !!}"><i class="fa fa-plus"></i>Add Documents</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-map-marker-alt"></i>
          <span>Locations</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{!! route('admin.locations.index') !!}"><i class="fa fa-list"></i>All Locations</a>
            <a href="{!! route('admin.locations.create') !!}"><i class="fa fa-plus"></i>Add Location</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-home"></i>
          <span>Schools</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{!! route('admin.schools.index') !!}"><i class="fa fa-list"></i>All Schools</a>
            <a href="{!! route('admin.schools.create') !!}"><i class="fa fa-plus"></i>Add School</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-images"></i>
          <span>Sliders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{!! route('admin.sliders.index') !!}"><i class="fa fa-list"></i>All sliders</a>
            <a href="{!! route('admin.sliders.create') !!}"><i class="fa fa-plus"></i>Add sliders</a>
          </li>
        </ul>
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>