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
<li><span class="text-main-600 fw-normal text-15">Créer un cours</span></li>
</ul>
</div>
<!-- Breadcrumb End -->

        <!-- Buttons Start -->
<div class="flex-align justify-content-end gap-8">

</div>
<!-- Buttons End -->
    </div>


<!-- Create Course Step List End -->

    <!-- Course Tab Start -->
    <div class="card">
        <div class="card-header border-bottom border-gray-100 flex-align gap-8">
            <h5 class="mb-0">Ajouter un cours</h5>
            <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Nouvelle Formation">
                <i class="ph-fill ph-question"></i>
            </button>
        </div>
        <div class="card-body">
            <form action="{{ url('cours') }}" method="post" enctype="multipart/form-data">
                        @csrf
                <div class="row gy-20">
                    <div class="col-xxl-3 col-md-4 col-sm-5">
                        <div class="mb-20">
                            <label class="h5 fw-semibold font-heading mb-0">Image du cours <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                        </div>

                        <div class="">
                            <input type="file" class=" placeholder-13 form-control py-11 pe-76" name="image_url" id="">
                        </div>

                        <div class="col-sm-12 mt-5">
                            <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Nombre de mobule <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                            <div class="position-relative">
                                <input type="number" class="text-counter placeholder-13 form-control py-11 pe-77" name="nombre_module" maxlength="500" id="courseTitle" placeholder="">
                               
                            </div>
                        </div>

                    </div>
                    <div class="col-xxl-9 col-md-8 col-sm-7">
                        <div class="row g-20">
                            <div class="col-sm-12">
                                <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading">Titre <span class="text-13 text-gray-400 fw-medium">(*)</span> </label>
                                <div class="position-relative">
                                    <input type="text" class="text-counter placeholder-13 form-control py-11 pe-77" name="name" maxlength="500" id="courseTitle" placeholder="">
                                    <div class="text-gray-400 position-absolute inset-inline-end-0 top-50 translate-middle-y me-16">
                                        <span id="current">3</span>
                                        <span id="maximum">/500</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-sm-12 mt-3">
                            <label for="courseTitle" class="h5 mb-8 fw-semibold font-heading mt-3">Objectifs <span class="text-13 text-gray-400 fw-medium"></span> </label>
                            <div class="position-relative">
                                <textarea type="text" class="text-counte placeholder-13 form-control py-11 pe-76" name="objectifs"  id="course" placeholder="" rows="7"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="flex-align justify-content-end gap-8">
                        <a href="" class="btn btn-outline-main rounded-pill py-9">Annuler</a>
                        <button type="submit" class="btn btn-success rounded-pill py-9">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Course Tab End -->
</div>
@endsection