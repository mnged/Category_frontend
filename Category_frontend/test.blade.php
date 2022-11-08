{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"> </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div style="text-align: center">

                            @if (session()->get('language') == 'arabic')
                                <b>
                                    <h1>مرحبا</h1>
                                </b>
                            @else
                                <b>
                                    <h1>Hallo </h1>
                                </b>
                            @endif



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


<li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle"
        data-toggle="dropdown">Home</a> </li>

<!--   // Get Category Table Data -->
@php
    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp


@foreach ($categories as $category)
    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle"
            data-toggle="dropdown">{{ $category->category_name_en }}</a>
        <ul class="dropdown-menu container">
            <li>
                <div class="yamm-content ">
                    <div class="row">

                        <!--   // Get SubCategory Table Data -->
                        @php
                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)
                                ->orderBy('subcategory_name_en', 'ASC')
                                ->get();
                        @endphp

                        @foreach ($subcategories as $subcategory)
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">


                                <h2 class="title">{{ $subcategory->subcategory_name_en }}</h2>


                                <!--   // Get SubSubCategory Table Data -->
                                @php
                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)
                                        ->orderBy('subsubcategory_name_en', 'ASC')
                                        ->get();
                                @endphp

                                @foreach ($subsubcategories as $subsubcategory)
                                    <ul class="links">
                                        <li><a href="#">{{ $subsubcategory->subsubcategory_name_en }}</a></li>

                                    </ul>
                                @endforeach <!-- // End SubSubCategory Foreach -->

                            </div>
                            <!-- /.col -->
                        @endforeach <!-- // End SubCategory Foreach -->


                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive"
                                src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt="">
                        </div>
                        <!-- /.yamm-content -->
                    </div>
                </div>
            </li>
        </ul>
    </li>
@endforeach <!-- // End Category Foreach -->
