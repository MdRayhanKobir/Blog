@extends('fronend.fronend_master')
@section('title')
    About page
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>About</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>About</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                @foreach ($about as $about)
                    <div class="row content">
                        <div class="col-lg-6" data-aos="fade-right">
                            <h2>{{ $about->title }}</h2>
                            <h3>{{ $about->short_des }}</h3>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                            <p>
                                {{ $about->long_des }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </section><!-- End About Us Section -->
    </main>
@endsection
