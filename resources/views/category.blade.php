@extends('layouts.main')

@section('content')
    <section class="s-line s-page-branding md-pt-20 pt-10">
        <div class="container">
            <div class="w-breadcrumbs-mobile-scroll-shadow pb-10">
                @include('general.breadcrumbs')
            </div>
            <h1 class="_h1 pagetitle bold mb-20">Каталог</h1>
        </div>
    </section>

    <section class="s-line  _js-mobile-menu catalog-aside-filter">
        <div class="container pb-60">
            <div class="row lg-md-gutters sm-gutters">
                <div class="col-xl-3 col-12 col">
                    <div class="navigation-menu left-side _js-navigation-menu catalog-aside-filter">
                        <div class="menu-layout body-layout _js-b-toggle-navigation-menu catalog-aside-filter" data-nav-id="catalog-aside-filter"></div>
                        <div class="mobile-menu-header">
                            Подобрать по параметрам
                            <a href="" class="close white _js-b-toggle-navigation-menu catalog-aside-filter" data-nav-id="catalog-aside-filter"></a>
                        </div>
                        <div class="navigation-menu-body">
                            <ul class="ul-catalog-page-aside-nav mb-20 col-xl-hide">
                                <li class="li _active">
                                    <a href="" class="__link">Бензорезы</a></li>
                                    <div class="inset pt-15 pb-20">
                                        <ul class="ul-inset">
                                            <li class="li"><a href="" class="__link">Алмазные диски, чашки алмазные шлифовальные</a></li>
                                            <li class="li _active"><a href="" class="__link">Буры, сверла и коронки по бетону</a></li>
                                            <li class="li"><a href="" class="__link">Насадки</a></li>
                                            <li class="li"><a href="" class="__link">Оснастка для резки и шлифовки</a></li>
                                            <li class="li"><a href="" class="__link">Пильные диски и полотна</a></li>
                                            <li class="li"><a href="" class="__link">Сверла по металлу</a></li>
                                            <li class="li"><a href="" class="__link">Сверла, фрезы, коронки по дереву и прочим материалам</a></li>
                                        </ul>
                                    </div>
                                </li>							
                                <li class="li"><a href="" class="__link">Электрические резчики</a></li>
                                <li class="li"><a href="" class="__link">Цепные бензорезы</a></li>
                                <li class="li"><a href="" class="__link">Аксессуары и принадлежности</a></li>
                                <li class="li"><a href="" class="__link">Оснастка для бензоинструмента</a></li>
                            </ul>

                            <div class="mb-20">
                                <div class="s-name _h4 semibiold mb-10">Бренд</div>
                                <div class="w-checkboxes-group _js-show-more-filters-group">
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden" checked="">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">levenhuk</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Veber</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Sky-Watcher</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Xiaomi</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Эврики</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Орбита</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">iCarTool</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="w-more mb-10">
                                        <a href="" class="nul color-orange more _js-b-double-changed _js-b-show-more">
                                            <div class="info _active"><span class="dashed dott">Посмотреть все</span></div>
                                            <div class="info"><span class="dashed dott">Свернуть</span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-20">
                                <div class="s-name _h4 semibiold mb-10">Cтрана</div>
                                <div class="w-checkboxes-group _js-show-more-filters-group">
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Беларусь</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Германия</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Китай</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">Россия</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="w-more mb-10">
                                        <a href="" class="nul color-orange more _js-b-double-changed _js-b-show-more">
                                            <div class="info _active"><span class="dashed dott">Посмотреть все</span></div>
                                            <div class="info"><span class="dashed dott">Свернуть</span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-20">
                                <div class="s-name _h4 semibiold mb-10">Материал</div>
                                <div class="w-checkboxes-group _js-show-more-filters-group">
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">нейлон</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">пластик</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">полиамид</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">полипропилен</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">полиуретан</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">полиэтилен</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">сталь нержавеющая</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">нейлон</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">пластик</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">полиамид</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">полипропилен</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="custom-selector check mb-10">
                                        <label class="block">
                                            <div class="input">
                                                <input type="checkbox" name="checkbox001" class="selector hidden">
                                                <div class="styled-figure">
                                                    <div class="border">
                                                        <div class="inset-figure"></div>
                                                    </div>
                                                </div>
                                                <div class="label label-inner">полиуретан</div>
                                            </div> 
                                        </label>
                                    </div>
                                    <div class="w-more mb-10">
                                        <a href="" class="nul color-orange more _js-b-double-changed _js-b-show-more">
                                            <div class="info _active"><span class="dashed dott">Посмотреть все</span></div>
                                            <div class="info"><span class="dashed dott">Свернуть</span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row sm-gutters">
                                <div class="col-submit col">
                                    <button class="button block">Найти</button>
                                </div>
                                <div class="col-del col">
                                    <button class="button block">del</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-xl-9 col-12 col">
                    <div class="col-lg-show mb-20">
                        <a href="" class="button block _js-b-toggle-navigation-menu" data-nav-id="catalog-aside-filter">
                            <div class="row align-items-center justify-content-center sm-gutters">
                                <div class="col-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><path fill="#fff" d="m16 90.259h243.605c7.342 33.419 37.186 58.508 72.778 58.508s65.436-25.088 72.778-58.508h90.839c8.836 0 16-7.164 16-16s-7.164-16-16-16h-90.847c-7.356-33.402-37.241-58.507-72.77-58.507-35.548 0-65.419 25.101-72.772 58.507h-243.611c-8.836 0-16 7.164-16 16s7.164 16 16 16zm273.877-15.958c0-.057.001-.115.001-.172.07-23.367 19.137-42.376 42.505-42.376 23.335 0 42.403 18.983 42.504 42.339l.003.235c-.037 23.407-19.091 42.441-42.507 42.441-23.406 0-42.454-19.015-42.507-42.408zm206.123 347.439h-90.847c-7.357-33.401-37.241-58.507-72.77-58.507-35.548 0-65.419 25.102-72.772 58.507h-243.611c-8.836 0-16 7.163-16 16s7.164 16 16 16h243.605c7.342 33.419 37.186 58.508 72.778 58.508s65.436-25.089 72.778-58.508h90.839c8.836 0 16-7.163 16-16s-7.164-16-16-16zm-163.617 58.508c-23.406 0-42.454-19.015-42.507-42.408l.001-.058c0-.058.001-.115.001-.172.07-23.367 19.137-42.377 42.505-42.377 23.335 0 42.403 18.983 42.504 42.338l.003.235c-.034 23.41-19.089 42.442-42.507 42.442zm163.617-240.248h-243.605c-7.342-33.419-37.186-58.507-72.778-58.507s-65.436 25.088-72.778 58.507h-90.839c-8.836 0-16 7.164-16 16 0 8.837 7.164 16 16 16h90.847c7.357 33.401 37.241 58.507 72.77 58.507 35.548 0 65.419-25.102 72.772-58.507h243.611c8.836 0 16-7.163 16-16 0-8.836-7.164-16-16-16zm-273.877 15.958c0 .058-.001.115-.001.172-.07 23.367-19.137 42.376-42.505 42.376-23.335 0-42.403-18.983-42.504-42.338l-.003-.234c.035-23.41 19.09-42.441 42.507-42.441 23.406 0 42.454 19.014 42.507 42.408z"></path></svg>
                                </div>
                                <div class="col-auto">Подобрать по параметрам</div>
                            </div>
                        </a>
                    </div>
                    <div class="w-catalog-list">
                        <div class="w-catalog-tags-list-default">
                            <div class="row row-catalog-tags-list-default sm-gutters">
                                <div class="col-auto _active col mb-10"><a href="" class="catalog-tags-list-item__link">Болтовые наконечники и соединители</a></div>
                                <div class="col-auto col mb-10"><a href="" class="catalog-tags-list-item__link">Кабельные стяжки, крепеж</a></div>
                                <div class="col-auto col mb-10"><a href="" class="catalog-tags-list-item__link">Бензорезы</a></div>
                                <div class="col-auto col mb-10"><a href="" class="catalog-tags-list-item__link">Аксессуары</a></div>
                                <div class="col-auto col mb-10"><a href="" class="catalog-tags-list-item__link">Кабельные стяжки, крепеж</a></div>
                                <div class="col-auto col mb-10"><a href="" class="catalog-tags-list-item__link">Бензорезы</a></div>
                                <div class="col-auto col mb-10"><a href="" class="catalog-tags-list-item__link">Аксессуары</a></div>
                            </div>
                        </div>
                        <div class="row row-catalog-list lg-md-gutters sm-gutters">
                            <div class="col-xl-4 col-md-4 col-xxs-6 col-12 col md-mb-20 mb-10">
                                <div class="w-catalog-list-item">
                                    <div class="frame">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-auto col">
                                                <div class="w-image">
                                                    <div class="w-stickers">
                                                        <div class="row">
                                                            <div class="col-auto col">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 1.60786C19.8242 2.66108 21.3391 4.17593 22.3923 6.00016C23.4455 7.8244 24 9.89373 24 12.0002C24 14.1066 23.4455 16.1759 22.3922 18.0001C21.339 19.8244 19.8241 21.3392 17.9999 22.3924C16.1756 23.4456 14.1063 24 11.9998 24C9.89336 24 7.82402 23.4455 5.9998 22.3922C4.17558 21.339 2.66075 19.8241 1.60756 17.9998C0.554376 16.1756 -5.35076e-05 14.1062 3.87318e-09 11.9998L0.00600014 11.611C0.0732039 9.53859 0.676257 7.51897 1.75637 5.74902C2.83648 3.97907 4.35678 2.51919 6.16907 1.51172C7.98136 0.504243 10.0238 -0.0164528 12.0972 0.000396292C14.1706 0.0172454 16.2043 0.571064 18 1.60786ZM15 13.1998C14.5226 13.1998 14.0648 13.3894 13.7272 13.727C13.3896 14.0645 13.2 14.5224 13.2 14.9998C13.2 15.4771 13.3896 15.935 13.7272 16.2725C14.0648 16.6101 14.5226 16.7997 15 16.7997C15.4774 16.7997 15.9352 16.6101 16.2728 16.2725C16.6104 15.935 16.8 15.4771 16.8 14.9998C16.8 14.5224 16.6104 14.0645 16.2728 13.727C15.9352 13.3894 15.4774 13.1998 15 13.1998ZM16.4484 7.55142C16.2234 7.32645 15.9182 7.20008 15.6 7.20008C15.2818 7.20008 14.9766 7.32645 14.7516 7.55142L7.5516 14.7514C7.33301 14.9777 7.21206 15.2808 7.21479 15.5954C7.21753 15.9101 7.34373 16.211 7.56622 16.4335C7.78871 16.656 8.08968 16.7822 8.40432 16.785C8.71896 16.7877 9.02208 16.6667 9.2484 16.4482L12.8484 12.8482L16.4484 9.2482C16.6734 9.02317 16.7997 8.718 16.7997 8.39981C16.7997 8.08162 16.6734 7.77645 16.4484 7.55142ZM9 7.19982C8.52261 7.19982 8.06477 7.38946 7.72721 7.72702C7.38964 8.06459 7.2 8.52242 7.2 8.99981C7.2 9.47719 7.38964 9.93502 7.72721 10.2726C8.06477 10.6102 8.52261 10.7998 9 10.7998C9.47739 10.7998 9.93523 10.6102 10.2728 10.2726C10.6104 9.93502 10.8 9.47719 10.8 8.99981C10.8 8.52242 10.6104 8.06459 10.2728 7.72702C9.93523 7.38946 9.47739 7.19982 9 7.19982Z" fill="#FF5F00"/></svg>
                                                            </div>
                                                            <div class="col-auto col">
                                                                <div class="product-color-sticker color001">
                                                                    NEW
                                                                </div>
                                                            </div>
                                                            <div class="col-auto col">
                                                                <div class="product-color-sticker color002">
                                                                    ХИТ
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="image">
                                                        <a href="" class="block__link">
                                                            <img src="assets/content/product-image001.jpg" class="img block" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-name md-pt-10 pt-5 pb-10">
                                                    <div class="w-price-group">
                                                        <div class="w-price">
                                                            <div class="w-old-price">
                                                                <div class="row align-items-center sm-gutters">
                                                                    <div class="col-auto">
                                                                        <div class="color-orange semibold old-price">140,57 BYN</div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="old-price-sticker">-10%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="w-price">
                                                                <div class="_h5 bold">120,57 <span class="_h7">BYN/шт.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name bold mt-5">
                                                        <a href="" class="name__link block color-black nul">
                                                            Электрический конвектор с  термостатом, 1 кВт, Стич Rexant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col">
                                                <div class="w-controlls pb-5">
                                                    <div class="row row-controlls sm-gutters">
                                                        <div class="col-pcs col-12 col pb-5">
                                                            <div class="_js-pcscontrolls pcscontrolls">
                                                                <a class="btn fcm left minus _js-b-minus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
                                                                </a>
                                                                <input type="text" value="1" class="input__default">
                                                                <a class="btn fcm right plus _js-b-plus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-btn col-12 col pb-5">
                                                            <button class="button to-cart-btn block row align-items-center justify-content-center sm-gutters">
                                                                <div class="col-auto col">
                                                                    <svg viewBox="0 0 23 22" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H3C3.47158 0 3.87907 0.329457 3.97783 0.790578L4.87936 5H21.04C21.3433 5 21.6302 5.13765 21.82 5.37422C22.0098 5.61079 22.082 5.92071 22.0162 6.21679L20.3666 13.645C20.3666 13.6453 20.3667 13.6447 20.3666 13.645C20.2197 14.3115 19.8498 14.9087 19.3182 15.3368C18.7863 15.7649 18.1244 15.9989 17.4416 16L7.67003 16C6.97666 16.0126 6.30018 15.7846 5.75581 15.3545C5.20825 14.922 4.82861 14.312 4.68225 13.6298L3.10272 6.25468C3.09506 6.22552 3.08869 6.19584 3.08367 6.16571L2.19149 2H1C0.447715 2 0 1.55228 0 1ZM5.3077 7L6.63775 13.2102C6.63778 13.2104 6.63773 13.2101 6.63775 13.2102C6.6866 13.4375 6.81318 13.6411 6.99561 13.7852C7.17813 13.9294 7.40521 14.0054 7.63775 14.0002L7.66 14L17.4384 14C17.4386 14 17.4382 14 17.4384 14C17.6658 13.9995 17.8868 13.9215 18.0639 13.7789C18.2412 13.6362 18.3645 13.4373 18.4134 13.215L19.7936 7H5.3077Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.95 19.95C15.95 18.8454 16.8454 17.95 17.95 17.95C19.0545 17.95 19.95 18.8454 19.95 19.95C19.95 21.0546 19.0545 21.95 17.95 21.95C16.8454 21.95 15.95 21.0546 15.95 19.95Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.94995 19.95C4.94995 18.8454 5.84538 17.95 6.94995 17.95C8.05452 17.95 8.94995 18.8454 8.94995 19.95C8.94995 21.0546 8.05452 21.95 6.94995 21.95C5.84538 21.95 4.94995 21.0546 4.94995 19.95Z"></path></svg>
                                                                </div>
                                                                <div class="col-auto col">В корзину</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-xxs-6 col-12 col md-mb-20 mb-10">
                                <div class="w-catalog-list-item">
                                    <div class="frame">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-auto col">
                                                <div class="w-image">
                                                    <div class="w-stickers">
                                                        <div class="row">
                                                            <div class="col-auto col">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 1.60786C19.8242 2.66108 21.3391 4.17593 22.3923 6.00016C23.4455 7.8244 24 9.89373 24 12.0002C24 14.1066 23.4455 16.1759 22.3922 18.0001C21.339 19.8244 19.8241 21.3392 17.9999 22.3924C16.1756 23.4456 14.1063 24 11.9998 24C9.89336 24 7.82402 23.4455 5.9998 22.3922C4.17558 21.339 2.66075 19.8241 1.60756 17.9998C0.554376 16.1756 -5.35076e-05 14.1062 3.87318e-09 11.9998L0.00600014 11.611C0.0732039 9.53859 0.676257 7.51897 1.75637 5.74902C2.83648 3.97907 4.35678 2.51919 6.16907 1.51172C7.98136 0.504243 10.0238 -0.0164528 12.0972 0.000396292C14.1706 0.0172454 16.2043 0.571064 18 1.60786ZM15 13.1998C14.5226 13.1998 14.0648 13.3894 13.7272 13.727C13.3896 14.0645 13.2 14.5224 13.2 14.9998C13.2 15.4771 13.3896 15.935 13.7272 16.2725C14.0648 16.6101 14.5226 16.7997 15 16.7997C15.4774 16.7997 15.9352 16.6101 16.2728 16.2725C16.6104 15.935 16.8 15.4771 16.8 14.9998C16.8 14.5224 16.6104 14.0645 16.2728 13.727C15.9352 13.3894 15.4774 13.1998 15 13.1998ZM16.4484 7.55142C16.2234 7.32645 15.9182 7.20008 15.6 7.20008C15.2818 7.20008 14.9766 7.32645 14.7516 7.55142L7.5516 14.7514C7.33301 14.9777 7.21206 15.2808 7.21479 15.5954C7.21753 15.9101 7.34373 16.211 7.56622 16.4335C7.78871 16.656 8.08968 16.7822 8.40432 16.785C8.71896 16.7877 9.02208 16.6667 9.2484 16.4482L12.8484 12.8482L16.4484 9.2482C16.6734 9.02317 16.7997 8.718 16.7997 8.39981C16.7997 8.08162 16.6734 7.77645 16.4484 7.55142ZM9 7.19982C8.52261 7.19982 8.06477 7.38946 7.72721 7.72702C7.38964 8.06459 7.2 8.52242 7.2 8.99981C7.2 9.47719 7.38964 9.93502 7.72721 10.2726C8.06477 10.6102 8.52261 10.7998 9 10.7998C9.47739 10.7998 9.93523 10.6102 10.2728 10.2726C10.6104 9.93502 10.8 9.47719 10.8 8.99981C10.8 8.52242 10.6104 8.06459 10.2728 7.72702C9.93523 7.38946 9.47739 7.19982 9 7.19982Z" fill="#FF5F00"/></svg>
                                                            </div>
                                                            <div class="col-auto col">
                                                                <div class="product-color-sticker color001">
                                                                    NEW
                                                                </div>
                                                            </div>
                                                            <div class="col-auto col">
                                                                <div class="product-color-sticker color002">
                                                                    ХИТ
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="image">
                                                        <a href="" class="block__link">
                                                            <img src="https://place-hold.it/330x330" class="img block" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-name md-pt-10 pt-5 pb-10">
                                                    <div class="w-price-group">
                                                        <div class="w-price">
                                                            <div class="w-old-price">
                                                                <div class="row align-items-center sm-gutters">
                                                                    <div class="col-auto">
                                                                        <div class="color-orange semibold old-price">140,57 BYN</div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="old-price-sticker">-10%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="w-price">
                                                                <div class="_h5 bold">120,57 <span class="_h7">BYN/шт.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name bold mt-5">
                                                        <a href="" class="name__link block color-black nul">
                                                            Электрический конвектор с  термостатом, 1 кВт, Стич Rexant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col">
                                                <div class="w-controlls pb-5">
                                                    <div class="row row-controlls sm-gutters">
                                                        <div class="col-pcs col-12 col pb-5">
                                                            <div class="_js-pcscontrolls pcscontrolls">
                                                                <a class="btn fcm left minus _js-b-minus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
                                                                </a>
                                                                <input type="text" value="1" class="input__default">
                                                                <a class="btn fcm right plus _js-b-plus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-btn col-12 col pb-5">
                                                            <button class="button to-cart-btn block row align-items-center justify-content-center sm-gutters _active">
                                                                <div class="col-auto col">
                                                                    <svg viewBox="0 0 23 22" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H3C3.47158 0 3.87907 0.329457 3.97783 0.790578L4.87936 5H21.04C21.3433 5 21.6302 5.13765 21.82 5.37422C22.0098 5.61079 22.082 5.92071 22.0162 6.21679L20.3666 13.645C20.3666 13.6453 20.3667 13.6447 20.3666 13.645C20.2197 14.3115 19.8498 14.9087 19.3182 15.3368C18.7863 15.7649 18.1244 15.9989 17.4416 16L7.67003 16C6.97666 16.0126 6.30018 15.7846 5.75581 15.3545C5.20825 14.922 4.82861 14.312 4.68225 13.6298L3.10272 6.25468C3.09506 6.22552 3.08869 6.19584 3.08367 6.16571L2.19149 2H1C0.447715 2 0 1.55228 0 1ZM5.3077 7L6.63775 13.2102C6.63778 13.2104 6.63773 13.2101 6.63775 13.2102C6.6866 13.4375 6.81318 13.6411 6.99561 13.7852C7.17813 13.9294 7.40521 14.0054 7.63775 14.0002L7.66 14L17.4384 14C17.4386 14 17.4382 14 17.4384 14C17.6658 13.9995 17.8868 13.9215 18.0639 13.7789C18.2412 13.6362 18.3645 13.4373 18.4134 13.215L19.7936 7H5.3077Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.95 19.95C15.95 18.8454 16.8454 17.95 17.95 17.95C19.0545 17.95 19.95 18.8454 19.95 19.95C19.95 21.0546 19.0545 21.95 17.95 21.95C16.8454 21.95 15.95 21.0546 15.95 19.95Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.94995 19.95C4.94995 18.8454 5.84538 17.95 6.94995 17.95C8.05452 17.95 8.94995 18.8454 8.94995 19.95C8.94995 21.0546 8.05452 21.95 6.94995 21.95C5.84538 21.95 4.94995 21.0546 4.94995 19.95Z"></path></svg>
                                                                </div>
                                                                <div class="col-auto col">В корзине</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-xxs-6 col-12 col md-mb-20 mb-10">
                                <div class="w-catalog-list-item">
                                    <div class="frame">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-auto col">
                                                <div class="w-image">
                                                    <div class="w-stickers">
                                                        <div class="row">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="image">
                                                        <a href="" class="block__link">
                                                            <img src="https://place-hold.it/330x330" class="img block" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-name md-pt-10 pt-5 pb-10">
                                                    <div class="w-price-group">
                                                        <div class="w-price">
                                                            <div class="w-price">
                                                                <div class="_h5 bold">120,57 <span class="_h7">BYN/шт.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name bold mt-5">
                                                        <a href="" class="name__link block color-black nul">
                                                            Электрический конвектор с  термостатом, 1 кВт, Стич Rexant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col">
                                                <div class="w-controlls pb-5">
                                                    <div class="row row-controlls sm-gutters">
                                                        <div class="col-pcs col-12 col pb-5">
                                                            <div class="_js-pcscontrolls pcscontrolls">
                                                                <a class="btn fcm left minus _js-b-minus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
                                                                </a>
                                                                <input type="text" value="1" class="input__default">
                                                                <a class="btn fcm right plus _js-b-plus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-btn col-12 col pb-5">
                                                            <button class="button to-cart-btn block row align-items-center justify-content-center sm-gutters">
                                                                <div class="col-auto col">
                                                                    <svg viewBox="0 0 23 22" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H3C3.47158 0 3.87907 0.329457 3.97783 0.790578L4.87936 5H21.04C21.3433 5 21.6302 5.13765 21.82 5.37422C22.0098 5.61079 22.082 5.92071 22.0162 6.21679L20.3666 13.645C20.3666 13.6453 20.3667 13.6447 20.3666 13.645C20.2197 14.3115 19.8498 14.9087 19.3182 15.3368C18.7863 15.7649 18.1244 15.9989 17.4416 16L7.67003 16C6.97666 16.0126 6.30018 15.7846 5.75581 15.3545C5.20825 14.922 4.82861 14.312 4.68225 13.6298L3.10272 6.25468C3.09506 6.22552 3.08869 6.19584 3.08367 6.16571L2.19149 2H1C0.447715 2 0 1.55228 0 1ZM5.3077 7L6.63775 13.2102C6.63778 13.2104 6.63773 13.2101 6.63775 13.2102C6.6866 13.4375 6.81318 13.6411 6.99561 13.7852C7.17813 13.9294 7.40521 14.0054 7.63775 14.0002L7.66 14L17.4384 14C17.4386 14 17.4382 14 17.4384 14C17.6658 13.9995 17.8868 13.9215 18.0639 13.7789C18.2412 13.6362 18.3645 13.4373 18.4134 13.215L19.7936 7H5.3077Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.95 19.95C15.95 18.8454 16.8454 17.95 17.95 17.95C19.0545 17.95 19.95 18.8454 19.95 19.95C19.95 21.0546 19.0545 21.95 17.95 21.95C16.8454 21.95 15.95 21.0546 15.95 19.95Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.94995 19.95C4.94995 18.8454 5.84538 17.95 6.94995 17.95C8.05452 17.95 8.94995 18.8454 8.94995 19.95C8.94995 21.0546 8.05452 21.95 6.94995 21.95C5.84538 21.95 4.94995 21.0546 4.94995 19.95Z"></path></svg>
                                                                </div>
                                                                <div class="col-auto col">В корзину</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-xxs-6 col-12 col md-mb-20 mb-10">
                                <div class="w-catalog-list-item">
                                    <div class="frame">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-auto col">
                                                <div class="w-image">
                                                    <div class="w-stickers">
                                                        <div class="row">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="image">
                                                        <a href="" class="block__link">
                                                            <img src="https://place-hold.it/330x330" class="img block" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-name md-pt-10 pt-5 pb-10">
                                                    <div class="w-price-group">
                                                        <div class="w-price">
                                                            <div class="w-price">
                                                                <div class="_h5 bold">120,57 <span class="_h7">BYN/шт.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name bold mt-5">
                                                        <a href="" class="name__link block color-black nul">
                                                            Электрический конвектор с  термостатом, 1 кВт, Стич Rexant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col">
                                                <div class="w-controlls pb-5">
                                                    <div class="row row-controlls sm-gutters">
                                                        <div class="col-pcs col-12 col pb-5">
                                                            <div class="_js-pcscontrolls pcscontrolls">
                                                                <a class="btn fcm left minus _js-b-minus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
                                                                </a>
                                                                <input type="text" value="1" class="input__default">
                                                                <a class="btn fcm right plus _js-b-plus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-btn col-12 col pb-5">
                                                            <button class="button to-cart-btn block row align-items-center justify-content-center sm-gutters">
                                                                <div class="col-auto col">
                                                                    <svg viewBox="0 0 23 22" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H3C3.47158 0 3.87907 0.329457 3.97783 0.790578L4.87936 5H21.04C21.3433 5 21.6302 5.13765 21.82 5.37422C22.0098 5.61079 22.082 5.92071 22.0162 6.21679L20.3666 13.645C20.3666 13.6453 20.3667 13.6447 20.3666 13.645C20.2197 14.3115 19.8498 14.9087 19.3182 15.3368C18.7863 15.7649 18.1244 15.9989 17.4416 16L7.67003 16C6.97666 16.0126 6.30018 15.7846 5.75581 15.3545C5.20825 14.922 4.82861 14.312 4.68225 13.6298L3.10272 6.25468C3.09506 6.22552 3.08869 6.19584 3.08367 6.16571L2.19149 2H1C0.447715 2 0 1.55228 0 1ZM5.3077 7L6.63775 13.2102C6.63778 13.2104 6.63773 13.2101 6.63775 13.2102C6.6866 13.4375 6.81318 13.6411 6.99561 13.7852C7.17813 13.9294 7.40521 14.0054 7.63775 14.0002L7.66 14L17.4384 14C17.4386 14 17.4382 14 17.4384 14C17.6658 13.9995 17.8868 13.9215 18.0639 13.7789C18.2412 13.6362 18.3645 13.4373 18.4134 13.215L19.7936 7H5.3077Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.95 19.95C15.95 18.8454 16.8454 17.95 17.95 17.95C19.0545 17.95 19.95 18.8454 19.95 19.95C19.95 21.0546 19.0545 21.95 17.95 21.95C16.8454 21.95 15.95 21.0546 15.95 19.95Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.94995 19.95C4.94995 18.8454 5.84538 17.95 6.94995 17.95C8.05452 17.95 8.94995 18.8454 8.94995 19.95C8.94995 21.0546 8.05452 21.95 6.94995 21.95C5.84538 21.95 4.94995 21.0546 4.94995 19.95Z"></path></svg>
                                                                </div>
                                                                <div class="col-auto col">В корзину</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-xxs-6 col-12 col md-mb-20 mb-10">
                                <div class="w-catalog-list-item">
                                    <div class="frame">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-auto col">
                                                <div class="w-image">
                                                    <div class="w-stickers">
                                                        <div class="row">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="image">
                                                        <a href="" class="block__link">
                                                            <img src="https://place-hold.it/330x330" class="img block" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-name md-pt-10 pt-5 pb-10">
                                                    <div class="w-price-group">
                                                        <div class="w-price">
                                                            <div class="w-price">
                                                                <div class="_h5 bold">120,57 <span class="_h7">BYN/шт.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name bold mt-5">
                                                        <a href="" class="name__link block color-black nul">
                                                            Электрический конвектор с  термостатом, 1 кВт, Стич Rexant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col">
                                                <div class="w-controlls pb-5">
                                                    <div class="row row-controlls sm-gutters">
                                                        <div class="col-pcs col-12 col pb-5">
                                                            <div class="_js-pcscontrolls pcscontrolls">
                                                                <a class="btn fcm left minus _js-b-minus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
                                                                </a>
                                                                <input type="text" value="1" class="input__default">
                                                                <a class="btn fcm right plus _js-b-plus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-btn col-12 col pb-5">
                                                            <button class="button to-cart-btn block row align-items-center justify-content-center sm-gutters">
                                                                <div class="col-auto col">
                                                                    <svg viewBox="0 0 23 22" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H3C3.47158 0 3.87907 0.329457 3.97783 0.790578L4.87936 5H21.04C21.3433 5 21.6302 5.13765 21.82 5.37422C22.0098 5.61079 22.082 5.92071 22.0162 6.21679L20.3666 13.645C20.3666 13.6453 20.3667 13.6447 20.3666 13.645C20.2197 14.3115 19.8498 14.9087 19.3182 15.3368C18.7863 15.7649 18.1244 15.9989 17.4416 16L7.67003 16C6.97666 16.0126 6.30018 15.7846 5.75581 15.3545C5.20825 14.922 4.82861 14.312 4.68225 13.6298L3.10272 6.25468C3.09506 6.22552 3.08869 6.19584 3.08367 6.16571L2.19149 2H1C0.447715 2 0 1.55228 0 1ZM5.3077 7L6.63775 13.2102C6.63778 13.2104 6.63773 13.2101 6.63775 13.2102C6.6866 13.4375 6.81318 13.6411 6.99561 13.7852C7.17813 13.9294 7.40521 14.0054 7.63775 14.0002L7.66 14L17.4384 14C17.4386 14 17.4382 14 17.4384 14C17.6658 13.9995 17.8868 13.9215 18.0639 13.7789C18.2412 13.6362 18.3645 13.4373 18.4134 13.215L19.7936 7H5.3077Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.95 19.95C15.95 18.8454 16.8454 17.95 17.95 17.95C19.0545 17.95 19.95 18.8454 19.95 19.95C19.95 21.0546 19.0545 21.95 17.95 21.95C16.8454 21.95 15.95 21.0546 15.95 19.95Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.94995 19.95C4.94995 18.8454 5.84538 17.95 6.94995 17.95C8.05452 17.95 8.94995 18.8454 8.94995 19.95C8.94995 21.0546 8.05452 21.95 6.94995 21.95C5.84538 21.95 4.94995 21.0546 4.94995 19.95Z"></path></svg>
                                                                </div>
                                                                <div class="col-auto col">В корзину</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-xxs-6 col-12 col md-mb-20 mb-10">
                                <div class="w-catalog-list-item">
                                    <div class="frame">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-auto col">
                                                <div class="w-image">
                                                    <div class="w-stickers">
                                                        <div class="row">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="image">
                                                        <a href="" class="block__link">
                                                            <img src="https://place-hold.it/330x330" class="img block" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-name md-pt-10 pt-5 pb-10">
                                                    <div class="w-price-group">
                                                        <div class="w-price">
                                                            <div class="w-price">
                                                                <div class="_h5 bold">120,57 <span class="_h7">BYN/шт.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name bold mt-5">
                                                        <a href="" class="name__link block color-black nul">
                                                            Электрический конвектор с  термостатом, 1 кВт, Стич Rexant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col">
                                                <div class="w-controlls pb-5">
                                                    <div class="row row-controlls sm-gutters">
                                                        <div class="col-pcs col-12 col pb-5">
                                                            <div class="_js-pcscontrolls pcscontrolls">
                                                                <a class="btn fcm left minus _js-b-minus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
                                                                </a>
                                                                <input type="text" value="1" class="input__default">
                                                                <a class="btn fcm right plus _js-b-plus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-btn col-12 col pb-5">
                                                            <button class="button to-cart-btn block row align-items-center justify-content-center sm-gutters">
                                                                <div class="col-auto col">
                                                                    <svg viewBox="0 0 23 22" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H3C3.47158 0 3.87907 0.329457 3.97783 0.790578L4.87936 5H21.04C21.3433 5 21.6302 5.13765 21.82 5.37422C22.0098 5.61079 22.082 5.92071 22.0162 6.21679L20.3666 13.645C20.3666 13.6453 20.3667 13.6447 20.3666 13.645C20.2197 14.3115 19.8498 14.9087 19.3182 15.3368C18.7863 15.7649 18.1244 15.9989 17.4416 16L7.67003 16C6.97666 16.0126 6.30018 15.7846 5.75581 15.3545C5.20825 14.922 4.82861 14.312 4.68225 13.6298L3.10272 6.25468C3.09506 6.22552 3.08869 6.19584 3.08367 6.16571L2.19149 2H1C0.447715 2 0 1.55228 0 1ZM5.3077 7L6.63775 13.2102C6.63778 13.2104 6.63773 13.2101 6.63775 13.2102C6.6866 13.4375 6.81318 13.6411 6.99561 13.7852C7.17813 13.9294 7.40521 14.0054 7.63775 14.0002L7.66 14L17.4384 14C17.4386 14 17.4382 14 17.4384 14C17.6658 13.9995 17.8868 13.9215 18.0639 13.7789C18.2412 13.6362 18.3645 13.4373 18.4134 13.215L19.7936 7H5.3077Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.95 19.95C15.95 18.8454 16.8454 17.95 17.95 17.95C19.0545 17.95 19.95 18.8454 19.95 19.95C19.95 21.0546 19.0545 21.95 17.95 21.95C16.8454 21.95 15.95 21.0546 15.95 19.95Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.94995 19.95C4.94995 18.8454 5.84538 17.95 6.94995 17.95C8.05452 17.95 8.94995 18.8454 8.94995 19.95C8.94995 21.0546 8.05452 21.95 6.94995 21.95C5.84538 21.95 4.94995 21.0546 4.94995 19.95Z"></path></svg>
                                                                </div>
                                                                <div class="col-auto col">В корзину</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-xxs-6 col-12 col md-mb-20 mb-10">
                                <div class="w-catalog-list-item">
                                    <div class="frame">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-auto col">
                                                <div class="w-image">
                                                    <div class="w-stickers">
                                                        <div class="row">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="image">
                                                        <a href="" class="block__link">
                                                            <img src="https://place-hold.it/330x330" class="img block" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-name md-pt-10 pt-5 pb-10">
                                                    <div class="w-price-group">
                                                        <div class="w-price">
                                                            <div class="w-price">
                                                                <div class="_h5 bold">120,57 <span class="_h7">BYN/шт.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name bold mt-5">
                                                        <a href="" class="name__link block color-black nul">
                                                            Электрический конвектор с  термостатом, 1 кВт, Стич Rexant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col">
                                                <div class="w-controlls pb-5">
                                                    <div class="row row-controlls sm-gutters">
                                                        <div class="col-pcs col-12 col pb-5">
                                                            <div class="_js-pcscontrolls pcscontrolls">
                                                                <a class="btn fcm left minus _js-b-minus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
                                                                </a>
                                                                <input type="text" value="1" class="input__default">
                                                                <a class="btn fcm right plus _js-b-plus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-btn col-12 col pb-5">
                                                            <button class="button to-cart-btn block row align-items-center justify-content-center sm-gutters">
                                                                <div class="col-auto col">
                                                                    <svg viewBox="0 0 23 22" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H3C3.47158 0 3.87907 0.329457 3.97783 0.790578L4.87936 5H21.04C21.3433 5 21.6302 5.13765 21.82 5.37422C22.0098 5.61079 22.082 5.92071 22.0162 6.21679L20.3666 13.645C20.3666 13.6453 20.3667 13.6447 20.3666 13.645C20.2197 14.3115 19.8498 14.9087 19.3182 15.3368C18.7863 15.7649 18.1244 15.9989 17.4416 16L7.67003 16C6.97666 16.0126 6.30018 15.7846 5.75581 15.3545C5.20825 14.922 4.82861 14.312 4.68225 13.6298L3.10272 6.25468C3.09506 6.22552 3.08869 6.19584 3.08367 6.16571L2.19149 2H1C0.447715 2 0 1.55228 0 1ZM5.3077 7L6.63775 13.2102C6.63778 13.2104 6.63773 13.2101 6.63775 13.2102C6.6866 13.4375 6.81318 13.6411 6.99561 13.7852C7.17813 13.9294 7.40521 14.0054 7.63775 14.0002L7.66 14L17.4384 14C17.4386 14 17.4382 14 17.4384 14C17.6658 13.9995 17.8868 13.9215 18.0639 13.7789C18.2412 13.6362 18.3645 13.4373 18.4134 13.215L19.7936 7H5.3077Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.95 19.95C15.95 18.8454 16.8454 17.95 17.95 17.95C19.0545 17.95 19.95 18.8454 19.95 19.95C19.95 21.0546 19.0545 21.95 17.95 21.95C16.8454 21.95 15.95 21.0546 15.95 19.95Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.94995 19.95C4.94995 18.8454 5.84538 17.95 6.94995 17.95C8.05452 17.95 8.94995 18.8454 8.94995 19.95C8.94995 21.0546 8.05452 21.95 6.94995 21.95C5.84538 21.95 4.94995 21.0546 4.94995 19.95Z"></path></svg>
                                                                </div>
                                                                <div class="col-auto col">В корзину</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-xxs-6 col-12 col md-mb-20 mb-10">
                                <div class="w-catalog-list-item">
                                    <div class="frame">
                                        <div class="row flex-column justify-content-between">
                                            <div class="col-auto col">
                                                <div class="w-image">
                                                    <div class="w-stickers">
                                                        <div class="row">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="image">
                                                        <a href="" class="block__link">
                                                            <img src="https://place-hold.it/330x330" class="img block" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-name md-pt-10 pt-5 pb-10">
                                                    <div class="w-price-group">
                                                        <div class="w-price">
                                                            <div class="w-price">
                                                                <div class="_h5 bold">120,57 <span class="_h7">BYN/шт.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="name bold mt-5">
                                                        <a href="" class="name__link block color-black nul">
                                                            Электрический конвектор с  термостатом, 1 кВт, Стич Rexant
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto col">
                                                <div class="w-controlls pb-5">
                                                    <div class="row row-controlls sm-gutters">
                                                        <div class="col-pcs col-12 col pb-5">
                                                            <div class="_js-pcscontrolls pcscontrolls">
                                                                <a class="btn fcm left minus _js-b-minus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
                                                                </a>
                                                                <input type="text" value="1" class="input__default">
                                                                <a class="btn fcm right plus _js-b-plus">
                                                                    <svg width="15" height="15" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-btn col-12 col pb-5">
                                                            <button class="button to-cart-btn block row align-items-center justify-content-center sm-gutters">
                                                                <div class="col-auto col">
                                                                    <svg viewBox="0 0 23 22" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H3C3.47158 0 3.87907 0.329457 3.97783 0.790578L4.87936 5H21.04C21.3433 5 21.6302 5.13765 21.82 5.37422C22.0098 5.61079 22.082 5.92071 22.0162 6.21679L20.3666 13.645C20.3666 13.6453 20.3667 13.6447 20.3666 13.645C20.2197 14.3115 19.8498 14.9087 19.3182 15.3368C18.7863 15.7649 18.1244 15.9989 17.4416 16L7.67003 16C6.97666 16.0126 6.30018 15.7846 5.75581 15.3545C5.20825 14.922 4.82861 14.312 4.68225 13.6298L3.10272 6.25468C3.09506 6.22552 3.08869 6.19584 3.08367 6.16571L2.19149 2H1C0.447715 2 0 1.55228 0 1ZM5.3077 7L6.63775 13.2102C6.63778 13.2104 6.63773 13.2101 6.63775 13.2102C6.6866 13.4375 6.81318 13.6411 6.99561 13.7852C7.17813 13.9294 7.40521 14.0054 7.63775 14.0002L7.66 14L17.4384 14C17.4386 14 17.4382 14 17.4384 14C17.6658 13.9995 17.8868 13.9215 18.0639 13.7789C18.2412 13.6362 18.3645 13.4373 18.4134 13.215L19.7936 7H5.3077Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.95 19.95C15.95 18.8454 16.8454 17.95 17.95 17.95C19.0545 17.95 19.95 18.8454 19.95 19.95C19.95 21.0546 19.0545 21.95 17.95 21.95C16.8454 21.95 15.95 21.0546 15.95 19.95Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.94995 19.95C4.94995 18.8454 5.84538 17.95 6.94995 17.95C8.05452 17.95 8.94995 18.8454 8.94995 19.95C8.94995 21.0546 8.05452 21.95 6.94995 21.95C5.84538 21.95 4.94995 21.0546 4.94995 19.95Z"></path></svg>
                                                                </div>
                                                                <div class="col-auto col">В корзину</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-pagination md-mt-20 mt-30">
                        <div class="row sm-gutters justify-content-center align-items-center">
                            <div class="col-sm-auto col">
                                <a href="" class="link w-arrow prev">
                                    <div class="_arrow _prev"></div>
                                </a>
                            </div>
                            <div class="col-sm-auto col">
                                <a class="link _active">1</a>
                            </div>
                            <div class="col-sm-auto col">
                                <a href="" class="link">...</a>
                            </div>
                            <div class="col-sm-auto col">
                                <a href="" class="link">96</a>
                            </div>
                            <div class="col-sm-auto col">
                                <a href="" class="link">97</a>
                            </div>
                            <div class="col-sm-auto col">
                                <a href="" class="link">98</a>
                            </div>
                            <div class="col-sm-auto col">
                                <a href="" class="link">...</a>
                            </div>
                            <div class="col-sm-auto col">
                                <a href="" class="link">199</a>
                            </div>
                            <div class="col-sm-auto col">
                                <a href="" class="link w-arrow next">
                                    <div class="_arrow _next"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection