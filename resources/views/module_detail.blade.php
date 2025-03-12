@extends('layouts.base')
@section('title','Formations')

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
                    <h3 class="wow fadeInUp" style="text-transform: uppercase;" data-wow-delay=".4s"> {{$module->titre}}</h3>
                    <p class="wow fadeInUp" data-wow-delay=".6s"></p>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="call-to-action" class="">

    <div class="container">

      <div class="row" data-aos="zoom-in" data-aos-delay="100" style="text-align: justify; font-family: 'Montserrat', sans-serif;">
        <div class="col-xl-12">

          {{--  <h3 class="py-8"> Titre de la formation: <strong>{{$formation->titre}}</strong></h3>  --}}
          
          </h5>
         

         
          <p style="text-align: justify; font-size: 20px;">
            <img src="{{ asset('assets/uploads/formation_images/'.$module->image_url) }}" 
                 style="float: left; margin-right: 15px; margin-bottom: 10px; " 
                 alt="Image">
            {!! $module->description !!}
        </p>
          
          




        </div>
        

      </div>
      <div class="col-xl-12 cta-btn-container ">
       
        <h4 class="mt-3 mb-3">Les chapitres du module
        </h4>
        <div class="grid-container">
            @foreach($module->chapitres as $value)
                <div class="grid-item">
                    <h6>
                        <ol>
                            <li>{{ $value->titre }}</li>
                        </ol>
                    </h6>
                </div>
            @endforeach
        </div>
        
        <style>
            .grid-container {
                display: grid;
                grid-template-columns: repeat(3, 1fr); /* 3 colonnes égales */
                gap: 20px; /* Espacement entre les colonnes */
                padding: 10px;
            }
        
            .grid-item {
                background: #f9f9f9;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
                text-align: center; /* Centrer le texte */
            }
        </style>
        
        
     
        
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
    $(document).ready(function () {
        loadcart();

        $('.addToCartBtn').click( function (e) {
            e.preventDefault();

                // var product_id= $(this).closest('.product_data').find('.chapitre_id').val();
                var product_qty= $(this).closest('.product_data').find('.qty-input').val();
                var product_id= $(this).closest('.product_data').find('.formation_id').val();
                var montans= $(this).closest('.product_data').find('.prix').val();


                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method:"Post",
                    url:"/add-to-cart",
                    data:{
                        // 'chapitre_id':product_id,
                        'quantite':product_qty,
                        'formation_id':product_id,
                        'montant':montans,
                    },

                    success:function(response){
                        console.log(response);
                        swal(response.status);
                        loadcart();
                        //window.location.reload();

                    }

                });

        });
        function loadcart()
        {
            $.ajax({
                method:"GET",
                url:"/load-cart-data",
                success:function(response){
                     $('.cart-count').html('');
                     $('.cart-count').html(response.count);
                    //alert(response.count)
                }

            });
        };
        $(document).on('click','.delete-cart-item', function (e) {
            e.preventDefault();

                var prod_id= $(this).closest('.product_data').find('.prod_id').val();

                //alert(prod_id)
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method:"Post",
                    url:"/delete-cart-item",
                    data:{
                        'article_id':prod_id,

                    },
                    success:function(response){
                        //window.location.reload();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                       loadcart();
                       // $('.cartitems').load(location.href +" .cartitems");
                        swal("",response.status,"success")
                    }

                });



        });

        $(document).on('click','.changeQuantity', function (e) {
            e.preventDefault();

                var product_id= $(this).closest('.product_data').find('.prod_id').val();
                var qty= $(this).closest('.product_data').find('.qty-input').val();
               // alert(product_id)
               // alert(qty)
                data={
                    'article_id':product_id,
                    'quantite':qty,

                },

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method:"Post",
                    url:"/update-cart",
                    data:data,
                    success:function(response){
                        loadcart();

                         swal("",response.status,"success")
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
