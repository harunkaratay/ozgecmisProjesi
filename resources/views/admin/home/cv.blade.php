@extends('admin.layouts.app')

@section('content')

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="dashboard">
        <div class="my-auto">
            <h1 class="mb-0">Muhammed Harun Karatay</span>
            </h1>
            <div class="subheading mb-5">Öğrenci Yazılım Mühendisi
            </div>
            <ul class="list-inline list-social-icons mb-0">
                <li class="list-inline-item">
                    <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.linkedin.com/in/muhammed-harun-karatay-7842a52ab/" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://github.com/harunkaratay" target="_blank">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
            <h2 class="mb-5">Egitim Bilgileri</h2>
            <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0">Fırat Üniversitesi</h3>
                    <div class="subheading mb-3">Teknoloji Fakültesi</div>
                    <div>Yazılım Mühendisliği</div>
                </div>
                <div class="resume-date text-md-right">
                    <div class="text-primary">2023-2027</div>
                </div>
            </div>
            <div class="resume-item d-flex flex-column flex-md-row">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0"> Elazığ Necip Fazıl Kısakürek Anadolu Lisesi</h3></div>
                <div class="resume-date text-md-right">
                    <div class="text-primary">2018-2022</div>
                </div>
            </div>
        </div>
    </section>

@endsection
