@extends('layouts.admin')

@section('content')
@include ('partial.sidebar')


<div class="dashboard-body">

    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
<div class="breadcrumb mb-24">
<ul class="flex-align gap-4">
<li><a href="#" class="text-gray-200 fw-normal text-15 hover-text-main-600">Accueil</a></li>
<li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
<li><span class="text-main-600 fw-normal text-15">Créer un utilisateur</span></li>
</ul>
</div>
<!-- Breadcrumb End -->

        <!-- Buttons Start -->
<div class="flex-align justify-content-end gap-8">
{{--  <button type="button" class="btn btn-outline-main bg-main-100 border-main-100 text-main-600 rounded-pill py-9">Save as Draft</button>
<button type="button" class="btn btn-main rounded-pill py-9" disabled>Publish Course</button>  --}}
</div>
<!-- Buttons End -->
    </div>

        <!-- Create Course Step List Start -->
{{--  <ul class="step-list mb-24">
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  active">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    Course Details
    <span class="line position-relative"></span>
</li>
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  ">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    Upload Videos
    <span class="line position-relative"></span>
</li>
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  ">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    About Course
    <span class="line position-relative"></span>
</li>
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  ">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    Create Quiz
    <span class="line position-relative"></span>
</li>
<li class="step-list__item py-15 px-24 text-15 text-heading fw-medium flex-center gap-6  ">
    <span class="icon text-xl d-flex"><i class="ph ph-circle"></i></span> 
    Publish Course
    <span class="line position-relative"></span>
</li>
</ul>  --}}
<!-- Create Course Step List End -->

    <!-- Course Tab Start -->
    <div class="card">
        <div class="card-header border-bottom border-gray-100 flex-align gap-8">
            <h5 class="mb-0">Utilisateurs</h5>        
            <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Catégorie">
                <i class="ph-fill ph-question"></i>
            </button>
        </div>
        <div class="card-body">
            <form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
                        @csrf
                <div class="row gy-20">
                    {{--  <div class="col-xxl-3 col-md-4 col-sm-5">
                        <div class="mb-20">
                            <label class="h5 fw-semibold font-heading mb-0">Thumbnail Image <span class="text-13 text-gray-400 fw-medium">(Required)</span> </label>
                        </div>
                        <div id="fileUpload" class="fileUpload image-upload"></div>
                    </div>  --}}
                    <div class="col-xxl-12 col-md-12 col-sm-7">
                        <div class="row g-20 mb-6">
                            <div class="col-sm-6">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Nom <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76" name="name" maxlength="200" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Prénoms <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76" name="prenom" maxlength="200" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD

                            <div class="col-sm-4">
<<<<<<< HEAD
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Formation <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
=======
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Groupe utilisateurs <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
>>>>>>> 36375f142bf7f8c7d01d91a8362f48bf698e74ea
                                <div class="position-relative">
                                    <select id="courseCategory" name="role_id" class="form-select py-9 placeholder-13 text-15" >
                                        
                                        @foreach($role as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                        
                                    </select>                                            
                                </div>
                            </div>
                            <div class="col-sm-4">
<<<<<<< HEAD
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Formation <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
=======
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Grade <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
>>>>>>> 36375f142bf7f8c7d01d91a8362f48bf698e74ea
                                <div class="position-relative">
                                    <select id="courseCategory" name="user_categorie_id" class="form-select py-9 placeholder-13 text-15" >
                                        
                                        @foreach($userCategory as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                        
                                    </select>                                            
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">email <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counte placeholder-13 form-control py-11 pe-76" name="email" maxlength="500" id="courseTitle" placeholder="">
=======
                            <div class="col-sm-6">
                                <label for="sex" class="h5 mb-8 fw-semibold font-heading">
                                    Sexe <span class="text-13 text-gray-400 fw-medium">(*)</span>
                                </label>
                                <div class="position-relative">
                                    <select class="form-select py-9 placeholder-13 text-15" name="sex" id="sex">
                                        <option value="" disabled selected>Choisissez votre sexe</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Féminin</option>
                                    </select>
>>>>>>> 758af20ded3cd43b4cd55039958b1f3c10f229d7
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        <!-- Icône optionnelle -->
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <label for="courseSpet" class="h5 mb-8 fw-semibold font-heading">Matricule <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76" name="matricule" maxlength="200" id="courseSpet" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Adresse <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counte placeholder-13 form-control py-11 pe-76" name="adresse" maxlength="500" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        {{--  <span id="current">3</span>
                                        <span id="maximum">/ 300</span>  --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Téléphone <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="number" class="text-counte placeholder-13 form-control py-11 pe-76" name="telephone" maxlength="500" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        {{--  <span id="current">3</span>
                                        <span id="maximum">/ 300</span>  --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">email <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counte placeholder-13 form-control py-11 pe-76" name="email" maxlength="500" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        {{--  <span id="current">3</span>
                                        <span id="maximum">/ 300</span>  --}}
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-6">
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Grade <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
                                <div class="position-relative">
                                    <select id="courseCategory" name="user_categorie_id" class="form-select py-9 placeholder-13 text-15" >
                                        
                                        @foreach($userCategory as $value)
                                        <option value="{{ $value->id }}">{{ $value->description }}</option>
                                    @endforeach
                                        
                                    </select>                                            
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Classe <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
<<<<<<< HEAD
                                    <input type="text" class="text-counte placeholder-13 form-control py-11 pe-76" name="classe" maxlength="500" id="courseTitle" placeholder="">
=======
                                    {{-- <input type="text" class="text-counte placeholder-13 form-control py-11 pe-76" name="classe" maxlength="500" id="courseTitle" placeholder=""> --}}
>>>>>>> 36375f142bf7f8c7d01d91a8362f48bf698e74ea
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        {{--  <span id="current">3</span>
                                        <span id="maximum">/ 300</span>  --}}
                                    </div>
<<<<<<< HEAD
=======
                                    <select id="courseTitle" name="user_class_id" class="form-select py-9 placeholder-13 text-15" >
                                        
                                        @foreach($userClass as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                        
                                    </select>    
>>>>>>> 36375f142bf7f8c7d01d91a8362f48bf698e74ea
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <label for="coursePoste" class="h5 mb-8 fw-semibold font-heading">Poste occupé <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <select id="coursePoste" name="post_user_id" class="form-select py-9 placeholder-13 text-15" >
                                        
                                        @foreach($postes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                        
                                    </select>                                            
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="courseService" class="h5 mb-8 fw-semibold font-heading">
                                    Service <span class="text-13 text-gray-400 fw-medium">(*)</span>
                                </label>
                                <div class="position-relative">
                                    <input type="text" id="courseService" class="text-counte placeholder-13 form-control py-11 pe-76" readonly>
                                    <!-- Input caché pour stocker l'ID du service -->
                                    <input type="hidden" id="service_user_id" name="service_user_id">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="courseCorp" class="h5 mb-8 fw-semibold font-heading">Corps <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
                                <div class="position-relative">
                                    <select id="courseCorp" name="user_corps_id" class="form-select py-9 placeholder-13 text-15" >
                                        
                                        @foreach($corps as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                        
                                    </select>                                            
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Groupe utilisateurs <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
                                <div class="position-relative">
                                    <select id="courseCategory" name="role_id" class="form-select py-9 placeholder-13 text-15" >
                                        
                                        @foreach($role as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                        
                                    </select>                                            
                                </div>
                            </div>
                            <div class="col-sm-4 mb-5">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Mot de passe <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="password" class="text-counte placeholder-13 form-control py-11 pe-76" name="password" maxlength="500" id="courseTitle" placeholder=""  value="Default@123">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        {{--  <span id="current">3</span>
                                        <span id="maximum">/ 300</span>  --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-4">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Confirmer votre mot d passe <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="password" class="text-counte placeholder-13 form-control py-11 pe-76" name="password_confirmation" maxlength="500" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        
                                    </div>
                                </div>
                            </div> --}}
                            
                           
                           
                        
                        
                    </div>
                    <div class="flex-align justify-content-end gap-8 mt-5">
                        <a href="{{url('create-categories')}}" class="btn btn-outline-main rounded-pill py-9">Annuler</a>
                        <button type="submit" class="btn btn-success rounded-pill py-9">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Course Tab End -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#coursePoste').on('change', function () {
            var postId = $(this).val(); // Récupère l'ID du poste sélectionné
            
            if (postId) {
                $.ajax({
                    url: '/get-services/' + postId, // Route pour récupérer le service
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data.length > 0) {
                            $('#courseService').val(data[0].name); // Affiche le nom dans l'input texte
                            $('#service_user_id').val(data[0].id); // Stocke l'ID dans l'input caché
                        } else {
                            $('#courseService').val('');
                            $('#service_user_id').val('');
                        }
                    }
                });
            } else {
                $('#courseService').val('');
                $('#service_user_id').val('');
            }
        });
    });
    </script>
@endsection