
@extends('layouts.home')

@section('content')



    <!--CAROUSEL -->
    <section class="slide1">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 600px ! important;">
                    <img class="d-block w-100" src="{{URL::to('/')}}/images/books.jpg" alt="First slide" style="filter: brightness(90%);">
                    <div class="carousel-caption d-none d-md-block  flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <h2 class="xl-text2 t-center bo14 p-b-6 animated visible-true m-b-22" data-appear="fadeInUp">
                            Productos
                        </h2>
                        <span class="m-text1 t-center animated visible-true m-b-33 fadeInDown" data-appear="fadeInDown">
                                Productos BEyG
                            </span>
                    </div>
                </div>
                <div class="carousel-item" style="height: 600px ! important;">
                    <img class="d-block w-100" src="{{URL::to('/')}}/images/building.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block  flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <h2 class="xl-text2 t-center bo14 p-b-6 animated visible-true m-b-22" data-appear="fadeInUp">
                            Control interno
                        </h2>
                        <span class="m-text1 t-center animated visible-true m-b-33" data-appear="fadeInDown">
                               Control interno BEyG
                    </span>
                    </div>
                </div>
                <div class="carousel-item" style="height: 600px ! important;">
                    <img class="d-block w-100 bright-bgimage-80" src="{{URL::to('/')}}/images/nosotros.jpg" alt="Third slide" style="filter: brightness(80%);">
                    <div class="carousel-caption d-none d-md-block  flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <h2 class="xl-text2 t-center bo14 p-b-6 animated visible-true m-b-22" data-appear="fadeInUp">
                            Nosotros
                        </h2>
                        <span class="m-text1 t-center animated visible-true m-b-33" data-appear="fadeInDown">
                                Descubre todo sobre tu banca
                            </span>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- Our product -->
    <section class="bgwhite p-t-45 p-b-58" id="productosSection">
        <div class="container">
            <div class="sec-title p-b-22">
                <h3 class="m-text5 t-center">
                    Nuestros productos
                </h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01" id="tabProducto">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    @php
                        $i = 0;
                        $j = 0;
                    @endphp
                    @if($categories)
                        @foreach($categories as $category)
                            @if($category->group == 1)
                                <li class="nav-item" id="nav-item-producto">
                                    <a class="nav-link {{($i==0)?'active':''}}" data-toggle="tab" href="#{{$category->name}}">{{$category->name}}</a>
                                </li>
                                @php
                                    $i += 1
                                @endphp
                            @endif
                        @endforeach
                    @endif

                </ul>
                <div class="tab-content p-t-35">
                    @if($categories)
                        @foreach($categories as $category)
                            @if($category->group == 1)
                                    <!-- - -->
                                <div class="tab-pane fade {{($j == 0) ? 'show active' : ''}}" id="{{$category->name}}">
                                    @php
                                        $j += 1
                                    @endphp
                                    <div class="row">
                                        @if($posts)
                                            @foreach($posts as $post)
                                                @if($category->id == $post->category_id && $post->category->group == 1)
                                                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                                                        <!-- Block2 -->
                                                        <div class="block2">
                                                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                                @php
                                                                    $p = App\Post::findOrFail($post->id);

                                                                    $a = explode("/", $p->photo->file);

                                                                    $link = end($a);
                                                                @endphp
                                                                <img src="{{ URL::to('/') }}/images/{{$link}}" alt="IMG-PRODUCT">

                                                                <div class="block2-overlay trans-0-4">

                                                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                                                        <!-- Button -->
                                                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
                                                                            <a class="block2-name dis-block s-text3white p-b-5 hov6" href="{{$post->archivo->file}}" target="_blank">Abrir</a>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="block2-txt p-t-20">
                                                                <a href="{{$post->archivo->file}}" target="_blank" class="block2-name dis-block s-text3 p-b-5">
                                                                    {{$post->title}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- control interno -->
    <section class="bgwhite p-t-45 p-b-58" id="controlSection">
        <div class="container">
            <div class="sec-title p-b-22">
                <h3 class="m-text5 t-center">
                    Control interno
                </h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01" id="tabControl">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    @php
                        $i = 0;
                        $j = 0;
                    @endphp
                    @if($categories)
                        @foreach($categories as $category)
                            @if($category->group == 2)
                                <li class="nav-item" id="nav-item-control">
                                    <a class="nav-link {{($i==0)?'active':''}}" data-toggle="tab" href="#{{$category->name}}">{{$category->name}}</a>
                                </li>
                                @php
                                    $i += 1
                                @endphp
                            @endif
                        @endforeach
                    @endif

                </ul>
                <div class="tab-content p-t-35">
                @if($categories)
                    @foreach($categories as $category)
                        @if($category->group == 2)
                            <!-- - -->
                                <div class="tab-pane fade {{($j == 0) ? 'show active' : ''}}" id="{{$category->name}}">
                                    @php
                                        $j += 1
                                    @endphp
                                    <div class="row">
                                        @if($posts)
                                            @foreach($posts as $post)
                                                @if($category->id == $post->category_id && $post->category->group == 2)
                                                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                                                        <!-- Block2 -->
                                                        <div class="block2">
                                                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                                                @php
                                                                    $p = App\Post::findOrFail($post->id);

                                                                    $a = explode("/", $p->photo->file);

                                                                    $link = end($a);
                                                                @endphp
                                                                <img src="{{ URL::to('/') }}/images/{{$link}}" alt="IMG-PRODUCT">

                                                                <div class="block2-overlay trans-0-4">

                                                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                                                        <!-- Button -->
                                                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
                                                                            <a class="block2-name dis-block s-text3white p-b-5 hov6" href="{{$post->archivo->file}}" target="_blank">Abrir</a>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="block2-txt p-t-20">
                                                                <a href="{{$post->archivo->file}}" target="_blank" class="block2-name dis-block s-text3 p-b-5">
                                                                    {{$post->title}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>


    <!-- Banner video -->
    <section class="parallax0 parallax100" style="background-image: url({{ URL::to('/') }}/images/video-beyg.jpg);">
        <div class="overlay0 p-t-190 p-b-200">
            <div class="flex-col-c-m p-l-15 p-r-15">
				<span class="m-text9 p-t-45 fs-20-sm">
					Nosotros
				</span>

                <h3 class="l-text1 fs-35-sm">
                    Video BEyG
                </h3>

                <span class="btn-play s-text4 hov5 cs-pointer p-t-25" data-toggle="modal" data-target="#modal-video-01">
					<i class="fa fa-play" aria-hidden="true"></i>
					Play Video
				</span>
            </div>
        </div>
    </section>

    <section class="instagram p-t-20" id="directorio">
        <div class="sec-title p-b-1 p-l-15 p-r-15 m-t-20">
            <h3 class="m-text6 t-center">
                "Aunque nadie puede volver atrás y hacer un nuevo comienzo, cualquiera puede comenzar a partir de ahora y crear un nuevo final."
            </h3>
            <h4 class="s-text11 t-right">
                Carl Bard
            </h4>
        </div>
    </section>

    <!-- Shipping -->
    <section class="shipping bgwhite p-t-52 p-b-46">
        <div class="flex-w p-l-15 p-r-15 ">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Fabricio Cordero de la Riva
                </h4>

                <span class="s-text11 t-center">
					Director de promocion y segmentos
				</span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    Gerardo Cantu Yeverino
                </h4>

                <span class="s-text11 t-center">
					Director division empresas
				</span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Maria Elena Alonzo Renteria
                </h4>

                <span class="s-text11 t-center">
					Asesor de segmento y control comercial
				</span>
            </div>
        </div>
    </section>

    <!-- Directorio -->
    <section class="instagram p-t-20">
        <div class="sec-title p-b-52 p-l-15 p-r-15">
            <h3 class="m-text5 t-center">
                Directorio
            </h3>
            <h4 class="m-text12 t-center"><!-- https://drive.google.com/open?id=0B-Uq_9AuGVyUZE15bkZ3ZXYtTFVWSmtrQzg2Wmg3Z0pHVUdr -->
                <a href="https://drive.google.com/open?id=0B-Uq_9AuGVyUZE15bkZ3ZXYtTFVWSmtrQzg2Wmg3Z0pHVUdr" target="_blank">Abrir directorio en pestaña diferente</a>
            </h4>
        </div>
        <h3 style="text-align:center;" >
            <iframe width="85%" height="500px" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRU0MbSIwgLPGzx1JYpLh8uBtNZkAwLIoKeIzKzaMlWYIdrdxUI5aN_malqiuR9gVit_o3VAZZVhmtNPBKUipw/pubhtml?gid=2144865494&amp;single=true&amp;widget=true&amp;headers=false" width="180" height="90" ></iframe>
        </h3>
    </section>

    <!-- Nosotros -->
    <section class="instagram p-t-20" id="nosotros">
        <div class="sec-title p-b-52 p-l-15 p-r-15">
            <h3 class="m-text5 t-center">
                ¿Quienes somos?
            </h3>
            <h4 class="m-text12 t-center">
                <a>BEyG</a>
            </h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div style="width:100%; height:400px;" id="orgchart"/></div>
            </div>
            <div class="col-2"></div>
        </div>
        </div>


        <!-- Contiene el mapa y los numeros de las oficinas-->
        <div class="container">
            <div class="row">
                <div class="col flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>EMPRESAS MERIDA</div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-99-99-42-27-14</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>GOBIERNO YUCATAN</div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-99-99-42-27-14</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>GOBIERNO TABASCO</div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-99-33-58-28-01</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>EMPRESAS VILLAHERMOSA </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-99-33-58-28-00</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>EMPRESAS Y GOBIERNO CANCUN </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-99-88-81-62-34</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>EMPRESAS TUXTLA GUTIERREZ </div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-96-16-18-82-10</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>GOBIERNO CHIAPAS</div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-96-16-18-82-05</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>EMPRESAS Y GOBIERNO CD. DEL CARMEN</div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-93-81-38-01-30</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>GOBIERNO Y EMPRESAS CAMPECHE</div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-98-18-16-66-27</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>GOBIERNO QUINTANA ROO / EMPRESAS CHETUMAL</div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-98-38-35-02-89</a></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <i style="color: #1e73be;" class="fa fa-phone fa-2x"></i>
                            </div>
                            <div class="col align-self-center">
                                <div>EMPRESAS Y GOBIERNO TAPACHULA</div>
                            </div>
                            <div class="col-lg-2">
                                <h4 class="m-text12 t-center"><a>01-96-26-20-13-06</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <img class="p-l-35" style="width: 500px; height: 430px;" src="https://lh3.googleusercontent.com/DyNH3BnerhUQn5J6AIGpXAxDCvD2hB5PYPCN0k2Pvk45kyWCdJ5-rXyKge1NhK_GyMqFcPSIOMuvPUB6ApO6fAnWRZ0aalC7Pw0c=s0" />
                </div>
            </div>
        </div>
    </section>

    @include('includes.home-footer')



    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
                <div class="video-mo-01">
                    <iframe src="https://drive.google.com/file/d/1Ig0qTzI_URMceBd526I1TR63xQRGRTat/preview?autoplay=1"></iframe>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/home.js')}}"></script>
    <script type="text/javascript">
        $('.parallax100').parallax100();
    </script>
    <script>
        var chart = new OrgChart(document.getElementById("orgchart"), {
            mouseScrool: OrgChart.action.none,

            menu: {
                pdf: { text: "Export PDF" },
                png: { text: "Export PNG" },
                svg: { text: "Export SVG" },
                csv: { text: "Export CSV" }
            },
            nodeMenu: {
                pdf: { text: "Export PDF" },
                png: { text: "Export PNG" },
                svg: { text: "Export SVG" }
            },
            //scaleInitial:OrgChart.match.width,
            nodeBinding: {
                field_0: "name",
                field_1: "title",
                img_0: "img"
            },
            nodes: [
                { id: 1, name: "Gerardo Cantu", title: "DD", img: "" },
                { id: 2, pid: 1, name: "Fabricio Cordero", title: "DP", img: "" },

                { id: 3, pid: 1, name: "Alma Jusaino", title: "Regional", img: "" },
                { id: 4, pid: 1, name: "Luisa Hernandez", title: "Regional", img: "" },
                { id: 5, pid: 3, name: "Blair Francis", title: "HR", img: "" }
            ]
        });
        chart.draw(OrgChart.action.init);
    </script>
    <script>
        $("#nav-item-producto").click(function(){
            //alert($(this).attr('href'));
            if($('#tabProducto').find('.active').hasClass('show'))
                $('#tabProducto').find('.active').removeClass("show");
            $('#tabProducto').find('.active').removeClass("active");

            $('#tabProducto').find('.active').addClass("fade");
        });

        $("#nav-item-control").click(function(){
            //alert($(this).attr('href'));
            if($('#tabControl').find('.active').hasClass('show'))
                $('#tabControl').find('.active').removeClass("show");
            $('#tabControl').find('.active').removeClass("active");

            $('#tabControl').find('.active').addClass("fade");
        });
    </script>

@endsection
