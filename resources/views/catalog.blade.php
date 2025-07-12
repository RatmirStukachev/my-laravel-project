@extends('layouts.main')

@section('content')
    <section class="s-line s-page-branding md-pt-20 pt-10">
        <div class="container">
            <div class="w-breadcrumbs-mobile-scroll-shadow pb-10">
                @include('general.breadcrumbs')
            </div>
            <h1 class="_h1 pagetitle bold mb-20">{{ $page->h1 ?: $page->title }}</h1>
        </div>
    </section>

    @if($categories?->isNotEmpty())
        <section class="s-line s-index-category-slider s-items-slider">
                <div class="container pt-30 pb-0">
                    <div class="w-category-list">
                    <div class="owl-carousel owl-categorys-list-slider">
                        @foreach ($categories as $category)
                            <div class="slide">
                                <div class="w-category-list-item">
                                    <a href="{{ $category->getLink() }}" class="block__link color-black nul">
                                        <div class="frame">
                                            <div class="w-title mb-5">
                                                <div class="title _h6 semibold">
                                                    {{ $category->h1 ?: $category->title }}
                                                </div>
                                            </div>
                                            <div class="w-image">
                                                <div class="image">
                                                    <picture>
                                                        <img src="{{(new zImage($category->image, [460, 460], ['contain']))->resize()}}" alt="{{ $category->title }}" title="{{ $category->title }}" class="img block" loading="lazy">
                                                    </picture>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection