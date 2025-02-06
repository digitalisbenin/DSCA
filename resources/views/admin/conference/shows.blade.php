@extends('layouts.admin')

@section('content')
@include ('partial.sidebar')


<div class="dashboard-body">

    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
<div class="breadcrumb mb-24">
<ul class="flex-align gap-4">
<li><a href="index.html" class="text-gray-200 fw-normal text-15 hover-text-main-600">Accueil</a></li>
<li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
<li><span class="text-main-600 fw-normal text-15">Meet</span></li>
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

<!-- Create Course Step List End -->

    <!-- Course Tab Start -->
    <div class="card">
        <div class="card-header border-bottom border-gray-100 flex-align gap-8">
            <h5 class="mb-0 text-center">{{ $conference->titre}}</h5>
            {{--  <button type="button" class="text-main-600 text-md d-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="meet">
                <i class="ph-fill ph-question"></i>
            </button>  --}}
        </div>
        <div class="card-body">
            <form action="{{ url('visio-conferences/' . $conference->id.'/updates') }}" method="post" enctype="multipart/form-data">
                        @csrf
                     
                <div class="row gy-20">

                    <div class="col-xxl-12 col-md-12 col-sm-7">
                         <input type="hidden" name="visio_conferences_id" value="{{ $conference->id}}">
                        <div class=" mb-6">
                           
        <div class="row">

           
            @foreach($users as $index => $user)
                <div class="col-md-3 mb-8">
                    <div class="form-check">
                        <input class="form-check-input" 
                               type="checkbox" 
                               name="selected_users[]" 
                               value="{{ $user->id }}" 
                               id="user{{ $user->id }}" 
                               {{ in_array($user->id, $selectedUsers) ? 'checked' : '' }}>
                               
                        <label class="form-check-label" for="user{{ $user->id }}">
                            {{ $user->name }} {{ $user->prenom }}
                        </label>
                    </div>
                </div>

                @if(($index + 1) % 4 == 0)
                    </div><div class="row">
                @endif
            @endforeach
        </div>
                            {{--  <div class="row">
                               
                                @foreach($users as $index => $user)
                                    <div class="col-md-3 mb-8">
                                        <input type="checkbox" name="selected_users[]" value="{{ $user->id }}">
                                        <label>{{ $user->name }} {{ $user->prenom }}</label>
                                    </div>
                            
                                    @if(($index + 1) % 4 == 0)
                                        </div><div class="row">
                                    @endif
                                @endforeach
                            </div>  --}}
                            
                            {{--  <div class="col-sm-6">
                                <label for="courseCategory" class="h5 mb-8 fw-semibold font-heading">Participant <span class="text-13 text-gray-400 fw-medium">(Requis)</span></label>
                                <div class="position-relative">
                                    <select id="courseCategory" name="user_id" class="form-select py-9 placeholder-13 text-15">
                                        <option value="" selected>Aucune</option>
                                       @foreach($users as $value)
                                       <option value="{{$value->id}}">{{$value->name}}  {{$value->prenom}} </option>    
                                       @endforeach
                                        
                                    </select>                                            
                                </div>
                            </div>  --}}
                        </div>



                    </div>
                    <div class="flex-align justify-content-end gap-8">
                        <a href="{{url('meets')}}" class="btn btn-outline-main rounded-pill py-9">Cancel</a>
                        <button type="submit" class="btn btn-success rounded-pill py-9">Mettre a jour</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Course Tab End -->
</div>
@endsection