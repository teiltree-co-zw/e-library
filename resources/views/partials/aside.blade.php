@php use Illuminate\Support\Facades\Auth;
 use App\Models\Teacher;
 use Illuminate\Support\Facades\DB;

 if (Auth::user()->role == 'Teacher'){
     $teacher = Teacher::where('user_id',Auth::user()->id)->first();
  $class = DB::table('teachers_grades')->where('teacher_id',$teacher->id)->first();
 }

 @endphp
<nav class="sidebar bg-white sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        @if(Auth::user()->role == 'Teacher')
        <li class="nav-item  {{ request()->routeIs('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Teacher Dashboard</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->role == 'Admin')
            <li class="nav-item  {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('teachers.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('teachers.index') }}">
                    <span class="icon-bg"><i class="mdi mdi-account-network menu-icon"></i></span>
                    <span class="menu-title">Teachers</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('students.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('students.index') }}">
                    <span class="icon-bg"><i class="mdi mdi-account-multiple menu-icon"></i></span>
                    <span class="menu-title">Students</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('classes.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('classes.index') }}">
                    <span class="icon-bg"><i class="mdi mdi-apps menu-icon"></i></span>
                    <span class="menu-title">Classes</span>
                </a>
            </li>
        @endif
        @if(Auth::user()->role == 'Teacher' && $class !== null)
            <li class="nav-item {{ request()->routeIs('books.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('books.index') }}">
                    <span class="icon-bg"><i class="mdi mdi-book-multiple-variant menu-icon"></i></span>
                    <span class="menu-title">Books & Files</span>
                </a>
            </li>
        @endif
        <li class="nav-item {{ request()->routeIs('reports') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reports') }}">
                <span class="icon-bg"><i class="mdi mdi-book-multiple-variant menu-icon"></i></span>
                <span class="menu-title">Report</span>
            </a>
        </li>
        @if(Auth::user()->role == 'Admin')
            <li class="nav-item {{ request()->routeIs('books.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('books.index') }}">
                    <span class="icon-bg"><i class="mdi mdi-book-multiple-variant menu-icon"></i></span>
                    <span class="menu-title">Books & Files</span>
                </a>
            </li>
        @endif
        @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teacher')
            <li class="nav-item {{ request()->routeIs('library.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('library.index') }}" target="_blank">
                    <span class="icon-bg"><i class="mdi mdi-book-open-page-variant menu-icon"></i></span>
                    <span class="menu-title">Library</span>&nbsp; <i class="fa fa-external-link"></i>
                </a>
            </li>
        @endif
        <li>
            <div role="separator" class="dropdown-divider"></div>
        </li>
        @if(Auth::user()->role == 'Admin')
        <li class="nav-item sidebar-user-actions {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <div class="sidebar-user-menu">
                <a href="{{ route('users.index') }}" class="nav-link"><i
                        class="mdi mdi-account-multiple-outline menu-icon"></i>
                    <span class="menu-title">Users (Admins)</span>
                </a>
            </div>
        </li>
        @endif

    </ul>
</nav>
