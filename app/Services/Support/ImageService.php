<?php

namespace App\Services\Support;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class ImageService
{

    protected $filePath;
    protected $sizes;
    protected $options;
    protected $webp;
    protected $watermark;
    protected $fullPath;

    /**
     * @param $filePath
     * @param $sizes
     * @param $options
     * @param $webp
     * @param $watermark
     */
    public function __construct($filePath, $sizes = null, $options = null, $webp = false, $watermark = false)
    {
        $this->filePath = $filePath;
        $this->sizes = $sizes;
        $this->options = $options;
        $this->webp = $webp;
        $this->watermark = $watermark;
        $this->fullPath = $filePath ? Storage::path($filePath) : config('image_service.noThumb'); // Определяем полный путь файла при создании экземпляра класса
    }


    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Foundation\Application|mixed|string|null
     */
    public function resize()
    {
        $imagePath = $this->getImagePath();

        if (!$imagePath) {
            return config('image_service.noThumb');
        }

        $mimeFile = $this->getMime();

        if ($mimeFile && in_array($mimeFile, config('image_service.noMime'))) {
            return $imagePath;
        }

        [$widthOriginal, $heightOriginal] = getimagesize($this->fullPath);
        [$widthResize, $heightResize] = $this->getResizeDimensions($widthOriginal, $heightOriginal);

        return $this->processImage($widthResize, $heightResize);
    }


    /**
     * @return string|null
     * Проверка наличия оригинального файла
     */
    private function getImagePath()
    {
        return $this->filePath && Storage::disk('public')->exists($this->filePath)
            ? 'storage/' . $this->filePath
            : null;
    }

    /**
     * @return string|null
     * Получение размеров для нарезки
     */
    private function getResizeDimensions($widthOriginal, $heightOriginal)
    {
        $width = $this->sizes[0] ?? $widthOriginal;
        $height = $this->sizes[1] ?? $heightOriginal;
        return [$width, $height];
    }

    /**
     * @param $width
     * @param $height
     * @return string
     * Нарезка изображения
     */

    private function processImage($width, $height)
    {
        $storage = Storage::disk('public');
        $thumbPath = $this->getThumbPath($width, $height);

        if ($storage->exists($thumbPath)) {
            return Storage::url($thumbPath);
        }

        $manager = new ImageManager(new Driver());
        $image = $manager->read($this->fullPath);

        $image = $this->setImageSizes($image, $width, $height);

        if ($this->watermark) {
            $this->setWatermark($image, $width, $height);
        }

        if ($this->webp) {
            $image->toWebp(75);
        }

        $image->save(Storage::path($thumbPath));

        return $storage->url($thumbPath);
    }

    /**
     * @param $width
     * @param $height
     * @return string
     *  Получение пути для нарезанного изображения
 */

    private function getThumbPath($width, $height)
    {
        $filePrefix = 'w' . $width . '_h' . $height . '_';
        $thumbFolder = config('image_service.thumbPath') . dirname($this->filePath);

        if ($this->webp) {
            $filePathArray = explode('.', $this->filePath);
            $this->filePath = str_replace('.'.array_pop($filePathArray), '.webp', $this->filePath);
        }

        Storage::disk('public')->makeDirectory($thumbFolder);

        return $thumbFolder . '/' . $filePrefix . basename($this->filePath);
    }

    /**
     * @param $img
     * @param $width
     * @param $height
     * @return mixed
     * Нарезка разными способомами
     * cover  - вписывает в заданный размер, вырезает часть изображения (left right center)
     * contain - вписывается в заданный размер, пустые области становятся белыми
     */

    private function setImageSizes($img, $width, $height)
    {
        return match ($this->options[0]) {
            'cover' => $img->cover($width, $height, $this->options[1] ?? 'center'),
            default => $img->contain($width, $height),
        };
    }

    /**
     * @param $filePath
     * @return mixed|string|null
     * Определение MIME файла
     */
    public function getMime()
    {
        if (file_exists($this->fullPath)) {
            return last(explode('/', mime_content_type($this->fullPath)));
        }

        return null;
    }

    /**
     * @param $image
     * @param $width
     * @param $height
     * @return mixed
     * Вставка Watermark
     */
    private function setWatermark($image, $width, $height)
    {
        $watermarkPath = Storage::path('watermark.png');
        $manager = new ImageManager(new Driver());
        $watermarkImage = $manager->read($watermarkPath);
        $watermarkImage->scale($width * 0.3, $height * 0.3);
        $image->place(
            $watermarkImage,
            'bottom-right',
            10,
            10,
            25
        );

        return $image;
    }
}
