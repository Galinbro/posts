
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" id="myInput" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('admin.index')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user()->role->name == 'admin')

                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Usuarios<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('users.index')}}">Ver Usuarios</a>
                        </li>

                        <li>
                            <a href="{{route('users.create')}}">Crear Usuario</a>
                        </li>


                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Responsables<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('responsable.index')}}">Ver Responsables</a>
                        </li>
                        <li>
                            <a href="{{route('responsable.index')}}">Crear Responsables</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>



                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('posts.index')}}">Ver Posts</a>
                        </li>

                        <li>
                            <a href="{{route('posts.create')}}">Crear Post</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>


                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Categories<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('categories.index')}}">ver Categorias</a>
                        </li>

                        <li>
                            <a href="{{route('categories.index')}}">Crear Categoria</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>


                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Media<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('media.index')}}">Ver Media</a>
                        </li>

                        <li>
                            <a href="{{route('media.create')}}">Subir Media</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Peticiones<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('peticiones.index')}}">Ver Peticiones</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            @else
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('posts.index')}}">Ver Posts</a>
                        </li>

                        <li>
                            <a href="{{route('posts.create')}}">Crear Post</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>


                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Media<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('media.index')}}">Ver Media</a>
                        </li>

                        <li>
                            <a href="{{route('media.create')}}">Subir Media</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i>Peticiones<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('peticiones.index')}}">Ver Peticiones</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            @endif

        </ul>


    </div>
    <!-- /.sidebar-collapse -->
</div>

