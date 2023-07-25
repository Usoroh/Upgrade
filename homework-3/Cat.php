<?php

class Cat
{
    // Приватные свойства класса Cat для хранения информации о коте
    private string $id; // Уникальный идентификатор кота
    private string $url; // URL-адрес, по которому находится изображение кота
    private string $width; // Ширина изображения
    private string $height; // Высота изображения

    // Значения идентификатора, URL, ширины и высоты передаются в качестве аргументов при создании объекта.
    public function __construct(string $id, string $url, int $width, int $height)
    {
        $this->id = $id;
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
    }

    // Геттеры и сеттеры для свойств класса.
    // Установить айдишник
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    // Получить айдишник
    public function getId(): string
    {
        return $this->id;
    }

    // Установить значение URL
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    // Получить значение URL
    public function getUrl(): string
    {
        return $this->url;
    }

    // Установить значение ширины изображения
    public function setWidth(string $width): void
    {
        $this->width = $width;
    }

    // Получить значение ширины изображения
    public function getWidth(): int
    {
        return $this->width;
    }

    // Установить значение высоты изображения
    public function setHeight(string $height): void
    {
        $this->height = $height;
    }

    // Получить значение высоты изображения
    public function getHeight(): int
    {
        return $this->height;
    }

}