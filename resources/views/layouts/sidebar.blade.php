<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('citymanager.index')}}" class="nav-link">
                City Managers    
            </a>
          </li>
        @endrole

        @role('admin|citymanager')
          <li class="nav-item has-treeview">
            <a href="{{route('gymmanager.index')}}" class="nav-link">
                Gym Managers    
            </a>
          </li>
          @endrole

          @role('admin|citymanager')
          <li class="nav-item has-treeview">
            <a href="{{route('gym.index')}}" class="nav-link">
                Gyms
            </a>
          </li>
          @endrole
    
          @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('coach.index')}}" class="nav-link">
              <p>
              Coaches
              </p>
            </a>
          </li>
          @endrole

          @role('admin|citymanager|gymanager')
          <li class="nav-item has-treeview">
            <a href="{{route('buy_package.index')}}" class="nav-link">
                Buy Buckage User
            </a>
          </li>
          @endrole

          @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('city.index')}}" class="nav-link">
              <p>
              Cities
              </p>
            </a>
          </li>
          @endrole

          @role('admin|citymanager|gymanager')
          <li class="nav-item has-treeview">
            <a href="{{route('trainingsession.index')}}" class="nav-link">
              <p>
              Training Sessions
              </p>
            </a>
          </li>
          @endrole

          @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('package.index')}}" class="nav-link">
              <p>
              Packages
              </p>
            </a>
          </li>
          @endrole

          @role('admin|citymanager|gymanager')
          <li class="nav-item has-treeview">
            <a href="{{route('sale.index')}}" class="nav-link">
              <p>
              Packages history
              </p>
            </a>
          </li>
          @endrole


          @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('userweb.index')}}" class="nav-link">
              <p>
              Users
              </p>
            </a>
          </li>
          @endrole

          @role('admin|citymanager|gymanager')
          <li class="nav-item has-treeview">
            <a href="{{route('revenue.index')}}" class="nav-link">
              <p>
              Revenues
              </p>
            </a>
          </li>
          @endrole

          @role('admin')
          <li class="nav-item has-treeview">
            <a href="{{route('userweb.index')}}" class="nav-link">
              <p>
              Attendance
              </p>
            </a>
          </li>
          @endrole
         
        </ul>
      </nav>
    </div>

</aside>