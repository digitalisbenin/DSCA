@extends('layouts.base')
@section('title', 'Formations')

@section('content')
    @include ('partial.navbar')

    <!-- Start Breadcrumbs -->
    {{--  <div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="">
                    <h1 class="page-title"> formations</h1>
                    <p>Des formations de qualifiantes</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="{{url('/')}}">Accueil</a></li>
                    <li>Formations</li>
                </ul>
            </div>
        </div>
    </div>
</div>  --}}
    <!-- End Breadcrumbs -->


    <!-- Start Courses Area -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="section-title">
                        {{--  <span class="wow zoomIn" data-wow-delay="0.2s"></span>  --}}
                        <h3 class="wow fadeInUp" style="text-transform: uppercase;" data-wow-delay=".4s"> {{ $cours->name }}
                        </h3>
                        <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="call-to-action" class="">

        <div class="container">

            <div class="row" data-aos="zoom-in" data-aos-delay="100"
                style="text-align: justify; font-family: 'Montserrat', sans-serif;">
                <div class="col-xl-12">

                    {{--  <h3 class="py-8"> Titre de la formation: <strong>{{$formation->titre}}</strong></h3>  --}}
                    {{-- <h5 class="mt-3 mb-3"> Prix: <strong>{{$formation->montant}}</strong>
          </h5> --}}
                    <h3 class="mt-3 mb-3">
                    </h3>

                    <p style="text-align: justify; font-size: 20px;">
                        <img src="{{ asset('assets/uploads/formation_images/' . $cours->image_url) }}"
                            style="float: left; margin-right: 15px; margin-bottom: 10px; max-width: 40%;" alt="Image">
                        {!! $cours->description !!}
                    </p>


                    {{-- <h4 class="mt-3 mb-3">Les chapitres de la formation
          </h4>
          @foreach ($formation->chapitres as $value)
          <h6 class=" py-3" style="text-align: justify;" >
              <ol>
                <li>{{ $value->name }}
                </li>
              </ol>
          </h6>
          @endforeach --}}




                </div>
                {{-- <div class="col-xl-6 cta-btn-container text-center">
          <div class="mt-4">
              <img src="{{ asset('assets/uploads/formation_images/'.$cours->image_url) }}" class="img-fluid rounded-4 mb-5" alt="Image"
                   >
          </div> --}}
                {{--  <a class="btn btn-primary float-end mt-4" href="formation">VOIR NOS FORMATIONS</a>  --}}
            </div>

        </div>

        </div>

    </section>
    <section class="courses style2 section" style=" padding-top: 10px !important; padding-bottom: 10px !important;">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="section-title">
                        {{--  <span class="wow zoomIn" data-wow-delay="0.2s"></span>  --}}
                        <h2 class="wow fadeInUp mt-5" data-wow-delay=".4s">MODULES DISPONIBLES </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">

                    @foreach ($module->sortByDesc('created_at') as $value)
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Start Single Course -->
                            <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                                <div class="course-image" style="height: 200px">
                                    <a href="{{ url('module-details/' . $value->id) }}"><img
                                            src="{{ asset('assets/uploads/formation_images/' . $value->image_url) }}"
                                            alt="#" style="height: 200px; width: 350px;">
                                    </a>
                                    {{--  <p class="price">Categorie</p>     --}}
                                </div>
                                <div class="content ">
                                    <div class="d-flex justify-content-between">
                                        <p class="date">{{ $value->category->name }}</p>
                                        <p class="date">{{ $value->niveaudifficulete->name }}</p>
                                    </div>
                                    <h5 style="display: -webkit-box;
    -webkit-line-clamp: 3; /* Forcer 3 lignes */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 4.5em;"> {{ $value->titre }}</h5>
                                   
                                    <a href="{{ url('details-formation/' . $value->id) }}"></a>
                                    <div class="">
                                        <p style="
                                                display: -webkit-box;
                                                -webkit-line-clamp: 3;
                                                -webkit-box-orient: vertical;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                text-align: justify;
                                            ">
                                            {{ $value->description }}
                                        </p>

                                    </div>

                                </div>
                            </div>
                            <!-- End Single Course -->
                        </div>
                    @endforeach
                    {{--  <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".4s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-8.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="course-details.html">Contrôleur aérien </a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".6s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-9.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="#">Équipier des forces spéciales de l'air</a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>  --}}
                    {{--  <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".2s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-10.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="price">$300</p>
                            <p class="date">FEb 10, 2023</p>
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="course-details.html">Spécialiste en cybersécurité</a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".4s">
                        <div class="course-image">
                            <a href="course-details.html"><img src="assets/images/courses/courses-11.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="price">Free</p>
                            <p class="date">MAR 05, 2023</p>
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="#">Spécialiste des systèmes d'armes navales</a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Course -->
                    <div class="single-course wow fadeInUp" data-wow-delay=".6s">
                        <div class="course-image">
                            <a href="#"><img src="assets/images/courses/courses-12.jpg"
                                    alt="#"></a>
                        </div>
                        <div class="content">
                            <p class="date">Categorie</p>

                            <p class="date">Difficulté</p>
                            <h3><a href="#">Technicien de maintenance navale</a></h3>
                        </div>
                    </div>
                    <!-- End Single Course -->
                </div>  --}}
                </div>
                {{--  <div class="row">
                <div class="col-12">
                    <div class="button">
                        <a href="courses-grid.html" class="btn">browsing all courses</a>
                    </div>
                </div>
            </div>  --}}
            </div>
        </div>
    </section>
@endsection
@section('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
    $(document).ready(function() {
        $('.ajouter-formation').on('click', function() {
            var formationId = $(this).data('id'); // Récupérer l'ID de la formation


            $.ajax({
                url: '/mes-cours',  // URL de la route Laravel pour ajouter la formation
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  // CSRF token pour la sécurité
                    formation_id: formationId     // ID de la formation à envoyer au serveur
                },
                success: function(response) {
                    swal("",response.status,"success")
                },
                error: function(xhr, status, error) {
                    swal("","Erreur lors de l'enregistrement de ce cours.","error")
                }
            });
        });
    });
</script> --}}
    <script>
        $(document).ready(function() {
            loadcart();

            $('.addToCartBtn').click(function(e) {
                e.preventDefault();

                // var product_id= $(this).closest('.product_data').find('.chapitre_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                var product_id = $(this).closest('.product_data').find('.formation_id').val();
                var montans = $(this).closest('.product_data').find('.prix').val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "Post",
                    url: "/add-to-cart",
                    data: {
                        // 'chapitre_id':product_id,
                        'quantite': product_qty,
                        'formation_id': product_id,
                        'montant': montans,
                    },

                    success: function(response) {
                        console.log(response);
                        swal(response.status);
                        loadcart();
                        //window.location.reload();

                    }

                });

            });

            function loadcart() {
                $.ajax({
                    method: "GET",
                    url: "/load-cart-data",
                    success: function(response) {
                        $('.cart-count').html('');
                        $('.cart-count').html(response.count);
                        //alert(response.count)
                    }

                });
            };
            $(document).on('click', '.delete-cart-item', function(e) {
                e.preventDefault();

                var prod_id = $(this).closest('.product_data').find('.prod_id').val();

                //alert(prod_id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "Post",
                    url: "/delete-cart-item",
                    data: {
                        'article_id': prod_id,

                    },
                    success: function(response) {
                        //window.location.reload();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                        loadcart();
                        // $('.cartitems').load(location.href +" .cartitems");
                        swal("", response.status, "success")
                    }

                });



            });

            $(document).on('click', '.changeQuantity', function(e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var qty = $(this).closest('.product_data').find('.qty-input').val();
                // alert(product_id)
                // alert(qty)
                data = {
                        'article_id': product_id,
                        'quantite': qty,

                    },

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                $.ajax({
                    method: "Post",
                    url: "/update-cart",
                    data: data,
                    success: function(response) {
                        loadcart();

                        swal("", response.status, "success")
                        //window.location.reload();
                        //$('.cartitems').load(location.href +" .cartitems");
                    }

                });



            });

            {{--  function commandes (e,transaction) {
            e.preventDefault();


                    var adresses= $(this).closest('.product_data').find('.adresse').val();
                    var phones= $(this).closest('.product_data').find('.phone').val();



                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method:"Post",
                        url:"/placer-commande",
                        data:{
                            'transaction_id':transaction,
                            'adresse':adresses,
                            'phone':phones,

                        },
                        success:function(response){
                            //window.location.reload();

                           //loadcart();
                           // $('.cartitems').load(location.href +" .cartitems");
                            swal("",response.status,"success")
                        }

                    });






        };  --}}




        });
    </script>
