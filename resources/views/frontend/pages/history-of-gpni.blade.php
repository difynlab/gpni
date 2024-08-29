@extends('frontend.layouts.app')

@section('title', 'History of GPNi')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/history-of-gpni.css') }}">
@endpush

@section('content')

    <div class="section">
        <div class="text-container">
            <div class="since">SINCE<br>
                <div class="history">Our History</div>2018
            </div>
        </div>
        <div class="image-container">
            <img src="/assets/bg-removebg-preview 1.png" alt="Since 2018" class="img-fluid">
        </div>
    </div>

    <div class="who-we-are">
        <h2 class="ff-poppins-medium fs-49">Who We Are?</h2>
        <h3 class="fs-31 ff-poppins-medium">We are GPNI – Your Nutrition Key</h3>
        <p class="fs-25 ff-poppins-regular">An educational platform redefining the landscape of nutritional learning. We
            are not just an educational
            platform; we are a thriving network of educators and practitioners committed to shaping the future of
            nutrition.</p>
    </div>

    <div class="our-story">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="pb-3 fs-49 ff-poppins-medium">Our Story</h2>
                    <p class="fs-25 ff-poppins-regular">The Global Performance Nutrition Institute, GPNi® was founded in
                        2018 and is the official partner
                        for The International Society of Sports Nutrition.</p>
                    <p class="fs-25 ff-poppins-regular">GPNi® is an all-access portal, to begin and advance your career
                        in sports nutrition. GPNi® is the
                        world’s first science-backed performance nutrition online education portal to be offered in
                        multiple countries and available in multiple languages.</p>
                </div>
                <div class="col-md-6">
                    <img src="/assets/image-5.svg" alt="GPNI Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div class="our-founders">
        <div class="container">
            <h2 class="fs-49  ff-poppins-medium">Our Founders</h2>
            <div class="row founder align-items-center">
                <div class="col-lg-2 text-center text-md-start">
                    <img src="/assets/mask-group.svg" alt="Dr. Roger Adams" class="img-fluid">
                </div>
                <div class="col-lg-10 text-center text-md-start">
                    <h4 class="p-0 m-0 fs-31 ff-poppins-semibold">Dr. Roger Adams</h4>
                    <div class="title py-2 fs-20 ff-poppins-regular">Ph.D. in Nutrition, CISSN</div>
                    <p class="pt-3 fs-25">In December of 2004, Dr. Roger Adams life-long goal was obtaining a Ph.D. in
                        Nutrition.
                        He is a member, as well as certified by the International Society of Sports Nutrition (ISSN)
                        with
                        the highest certification available by ISSN, CISSN certification, also known as the Sports
                        Nutritionist.
                    </p>
                </div>
            </div>
            <div class="row founder align-items-center">
                <div class="col-lg-10 text-center text-md-end order-2 order-md-1">
                    <h4 class="p-0 m-0 fs-31 ff-poppins-semibold">Drew Campbell</h4>
                    <div class="title py-2 fs-20 ff-poppins-regular">CISSN</div>
                    <p class="pt-3 fs-25">Over 22 years in the fitness industry, and 14 years of this being in China and
                        Asia.
                        Drew is a consultant and board member from some of the world's leading nutrition brands and
                        organizations.
                    </p>
                </div>
                <div class="col-lg-2 order-1 order-md-2 text-center text-md-start">
                    <img src="/assets/mask-group-2.svg" alt="Drew Campbell" class="img-fluid ms-md-auto">
                </div>
            </div>
        </div>
    </div>

    <div class="our-partners">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/assets/image-6.svg" alt="ISSN Logo" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="fs-49 ff-poppins-medium">Our Official Partners</h2>
                    <p class="fs-25 ff-poppins-regular">GPNI is the official partner for The International Society of
                        Sports Nutrition (ISSN) from 2018.
                    </p>
                    <p class="fs-25 ff-poppins-regular">ISSN founded in 2003 and it is a world leader in providing
                        scientific sports nutrition and
                        supplemental information.</p>
                    <p class="fs-25 ff-poppins-regular">Our peer-reviewed journals (JISSN), conferences, and
                        participants
                        are key influencers and thought
                        leaders in sports nutrition and supplements.</p>
                    <ul class="custom-list fs-25 ff-poppins-regular">
                        <li>Jose Antonio, Ph.D.</li>
                        <li>Doug Kalman, Ph.D., RD</li>
                        <li>Richard Kreider, Ph.D.</li>
                        <li>Susan Kleiner, Ph.D., RD</li>
                        <li>Anthony Almada MSc</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="gold-standard py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="fs-49 ff-poppins-medium">Gold Standard</h2>
                    <p class="fs-25 ff-poppins-regular">ISSN Leads in Research and Innovation and it is recognized by
                        universities worldwide as offering
                        the latest, cutting edge, and non-biased research in the science and application of sports
                        nutrition and supplementation.</p>
                    <p class="fs-25 ff-poppins-regular">ISSN research has led to the development and discovery of some
                        of the biggest ingredients and
                        applications in sports nutrition supplementation. Many of these discoveries are attributed to
                        fellows within the ISSN (FISSN).</p>
                    <p class="fs-25 ff-poppins-regular">Creatine, Theacrine, HMB, Beta alanine, Nitrosigine, and many
                        others.</p>
                </div>
                <div class="col-md-6">
                    <img src="/assets/image-5-2.svg" alt="Gold Standard Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

@endsection