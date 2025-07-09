@extends('layouts.main')

@section('content')
    <section class="s-line s-breadcrumbs">
        <div class="container">
            <div class="w-breadcrumbs-mobile-scroll-shadow">
                {{-- <div class="w-breadcrumbs xl-pt-0 xl-pb-15 pt-20 pb-10">
                    <a href="" class="__link">Главная</a>
                    <span class="hr"></span>
                    <a href="" class="__link">Промежуточная страница</a>
                    <span class="hr"></span>
                    <span class="page-name">Название страницы</span>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="s-line xl-mt-0 mt-0">
        <div class="container pt-50 pb-50">
            <div class="row row-error-page align-items-center">
                <div class="col-12 col">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-auto col-10">
                            <img src="assets/i/404-image.svg" alt="" class="img block">
                        </div>
                    </div>
                    <div class="align-center mt-30">
                        <div class="_h5">Нам очень жаль, но такой страницы не существует или она была удалена</div>
                        <div class="_h4 semibold mt-10">
                            <a href="{{ route('index') }}" class="color-blue nul"><span class="dashed dash">Перейти на главную страницу</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection