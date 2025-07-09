<?php

namespace App\Enums;

enum PageContentEnum: string
{
    use EnumToArray;

    case main_tech = 'Главная страница: Блок с техзаданием';
    case main_direct = 'Главная страница: Направления';
    case main_request = 'Главная страница: Заявка (Сквозной блок)';
    case main_news = 'Главная страница: Статьи/Новости';
    case main_blocks = 'Главная страница: Блоки картинок';
    case main_advantages = 'Главная страница: Преимущества (Сквозной блок)';
    case main_form = 'Главная страница: Форма обратной связи';
    case main_advise = 'Главная страница: Рекомендуемые товары';
    case service_request = 'Сервисный центр: Заявка на ремонт и обслуживание';
    case service_blocks_1 = 'Сервисный центр: Блоки 1';
    case service_blocks_2 = 'Сервисный центр: Блоки 2';
    case service_directions = 'Сервисный центр: Направления';
    case service_brands = 'Сервисный центр: Бренды';
    case service_why_we = 'Сервисный центр: Почему мы';
    case service_request_2 = 'Сервисный центр: Заявка на ремонт и обслуживание 2';
    case service_slider = 'Сервисный центр: Слайдер';
    case service_examples = 'Сервисный центр: Примеры работ';
    case delivery_banner = 'Доставка и оплата: Баннер';
    case delivery_delivery = 'Доставка и оплата: Доставка';
    case delivery_payment_phiz = 'Доставка и оплата: Оплата физические лица';
    case delivery_payment_ur = 'Доставка и оплата: Оплата юридические лица';
    case leasing_banner = 'Рассрочка: Баннер';
    case leasing_blocks = 'Рассрочка: Блоки с текстои';
    case leasing_programs = 'Рассрочка: Программы';
    case leasing_advantages = 'Рассрочка: Преимущества';
    case leasing_specialist = 'Рассрочка: Специалист';
    case about_us_slider = 'О компании: Слайдер';
    case about_us_content = 'О компании: Контент';
    case reviews_slider = 'Отзывы: Слайдер';
    case news_articles = 'Статьи/Новости: Сквозной блок';
    case catalog_content = 'Каталог: Контент';
    case catalog_specialist = 'Каталог: Специалист';
    case service_similars = 'Услуги: Похожие услуги';

    public static function valueOne($name)
    {
        foreach (self::cases() as $value) {
            if ($name === $value->name) {
                return $value->value;
            }
        }
    }
}
