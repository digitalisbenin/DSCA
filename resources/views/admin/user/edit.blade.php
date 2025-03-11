@extends('layouts.admin')

@section('content')
    @include ('partial.sidebar')

    <div class="dashboard-body">
        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <!-- Breadcrumb Start -->
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="#" class="text-gray-200 fw-normal text-15 hover-text-main-600">Accueil</a></li>
                    <li><span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span></li>
                    <li><span class="text-main-600 fw-normal text-15">Modifier un utilisateur</span></li>
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

        <!-- Edit User Form Start -->
        <div class="card">
            <div class="card-header border-bottom border-gray-100 flex-align gap-8">
                <h5 class="mb-0">Modifier un utilisateur</h5>
                <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Catégorie">
                    <i class="ph-fill ph-question"></i>
                </button>
            </div>
            <div class="card-body">
                <form action="{{ url('users/' . $user->id.'/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Utilise PUT pour l'édition -->
                    <div class="row gy-20">
                        <div class="col-sm-6">
                            <label for="name" class="h5 mb-8 fw-semibold font-heading">Nom <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    name="name" value="{{ old('name', $user->name) }}" maxlength="200" id="name"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="prenom" class="h5 mb-8 fw-semibold font-heading">Prénoms <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    name="prenom" value="{{ old('prenom', $user->prenom) }}" maxlength="200" id="prenom"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="sex" class="h5 mb-8 fw-semibold font-heading">
                                Sexe <span class="text-13 text-gray-400 fw-medium">(*)</span>
                            </label>
                            <div class="position-relative">
                                <select class="form-select py-9 placeholder-13 text-15" name="sex" id="sex">
                                    <option value="" disabled {{ old('sex', $user->sex) == '' ? 'selected' : '' }}>Choisissez votre sexe</option>
                                    <option value="M" {{ old('sex', $user->sex) == 'M' ? 'selected' : '' }}>Masculin</option>
                                    <option value="F" {{ old('sex', $user->sex) == 'F' ? 'selected' : '' }}>Féminin</option>
                                </select>
                                <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                    <!-- Icône optionnelle -->
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-6">
                            <label for="courseSpet" class="h5 mb-8 fw-semibold font-heading">Matricule <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76" name="matricule" value="{{ old('matricule', $user->matricule) }}" maxlength="200" id="matricule">
                                
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="adresse" class="h5 mb-8 fw-semibold font-heading">Adresse <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="text" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    name="adresse" value="{{ old('adresse', $user->adresse) }}" maxlength="500"
                                    id="adresse" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="telephone" class="h5 mb-8 fw-semibold font-heading">Téléphone <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="number" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    name="telephone" value="{{ old('telephone', $user->telephone) }}" maxlength="500"
                                    id="telephone" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="email" class="h5 mb-8 fw-semibold font-heading">Email <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="email" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    name="email" value="{{ old('email', $user->email) }}" maxlength="500" id="email"
                                    placeholder="">
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <label for="user_categorie_id" class="h5 mb-8 fw-semibold font-heading">Grade <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span></label>
                            <div class="position-relative">
                                <select id="user_categorie_id" name="user_categorie_id"
                                    class="form-select py-9 placeholder-13 text-15">
                                    @foreach ($userCategory as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $value->id == old('user_categorie_id', $user->user_categorie_id) ? 'selected' : '' }}>
                                            {{ $value->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-5">
                            <label for="user_class_id" class="h5 mb-8 fw-semibold font-heading">Classe <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <select id="user_class_id" name="user_class_id"
                                    class="form-select py-9 placeholder-13 text-15">
                                    @foreach ($userClass as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $value->id == old('user_class_id', $user->user_class_id) ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="coursePoste" class="h5 mb-8 fw-semibold font-heading">Poste occupé <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <select id="coursePoste" name="post_user_id" class="form-select py-9 placeholder-13 text-15">
                                    <option value="" disabled selected>Choisissez un poste</option>
                                    
                                    @foreach($postes as $value)
                                        <option value="{{ $value->id }}" {{ old('post_user_id', $user->post_user_id) == $value->id ? 'selected' : '' }}>
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>                                            
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="courseService" class="h5 mb-8 fw-semibold font-heading">Service <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
                            <div class="position-relative">
                                <select id="courseService" name="service_user_id" class="form-select py-9 placeholder-13 text-15">
                                    <option value="" disabled selected>Choisissez un service</option>
                                    @foreach($services as $value)
                                        <option value="{{ $value->id }}" 
                                                {{ old('service_user_id', $user->service_user_id) == $value->id ? 'selected' : '' }}>
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>                                            
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="courseCorp" class="h5 mb-8 fw-semibold font-heading">Corps <span class="text-13 text-gray-400 fw-medium">(*)</span></label>
                            <div class="position-relative">
                                <select id="courseCorp" name="user_corps_id" class="form-select py-9 placeholder-13 text-15">
                                    <option value="" disabled selected>Choisissez un corps</option>
                                    @foreach($corps as $value)
                                        <option value="{{ $value->id }}" 
                                                {{ old('user_corps_id', $user->user_corps_id) == $value->id ? 'selected' : '' }}>
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>                                            
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="role_id" class="h5 mb-8 fw-semibold font-heading">Groupe utilisateurs <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span></label>
                            <div class="position-relative">
                                <select id="role_id" name="role_id" class="form-select py-9 placeholder-13 text-15">
                                    @foreach ($role as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $value->id == old('role_id', $user->role_id) ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-5">
                            <label for="password" class="h5 mb-8 fw-semibold font-heading">Mot de passe <span
                                    class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="password" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    name="password" id="password" placeholder="">
                            </div>
                        </div>
                        {{-- <div class="col-sm-4">
                            <label for="password_confirmation" class="h5 mb-8 fw-semibold font-heading">Confirmer votre
                                mot de passe <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="password" class="text-counter placeholder-13 form-control py-11 pe-76"
                                    name="password_confirmation" id="password_confirmation" placeholder="">
                            </div>
                        </div> --}}
                       
                        
                    </div>
                    <div class="flex-align justify-content-end gap-8 mt-5">
                        <a href="{{ url('users') }}" class="btn btn-outline-main rounded-pill py-9">Annuler</a>
                        <button type="submit" class="btn btn-success rounded-pill py-9">Mettre à jour</button>
                    </div>
                </form>
            </div
        </div>
      
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#coursePoste').on('change', function () {
        var postId = $(this).val(); // Récupère l'ID du poste sélectionné
        
        if (postId) {
            $.ajax({
                url: '/get-services/' + postId, // Route pour récupérer les services
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#courseService').empty(); // Vide le select des services
                    //$('#courseService').append('<option value="">Sélectionner un service</option>'); 

                    $.each(data, function (key, value) {
                        $('#courseService').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#courseService').empty();
            $('#courseService').append('<option value="">Sélectionner un service</option>');
        }
    });
});
</script>

    @endsection