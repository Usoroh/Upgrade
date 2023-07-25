<?php
// Подключаем класс Cat.
require_once "Cat.php";

// Загружаем все библиотеки из директории vendor, включая GuzzleHttp.
require 'vendor/autoload.php';

// Определяем класс CatController.
class CatController
{
    // Определяем метод для получения кота. Если указана порода, получаем кота этой породы. Если нет, получаем кота по умолчанию.
    public function getCat(string $breed = ""): Cat{

        // Устанавливаем URL для получения кота указанной породы.
        $url = "https://api.thecatapi.com/v1/images/search/?breed_ids=" . $breed;

        // Делаем запрос к API.
        $response = $this->makeApiRequest($url);

        // Декодируем JSON ответ.
        $data = json_decode($response->getBody());

        // Проверяем, содержит ли ответ ожидаемые данные.
        if (!isset($data[0]->id, $data[0]->url, $data[0]->width, $data[0]->height)) {
            $error = "Сорри, ответ не содержит ожидаемых данных";
            header('Location: errorpage.php?error=' . urlencode($error));
            exit();
        }

        // Возвращаем новый объект Cat с данными из ответа.
        return new Cat($data[0]->id, $data[0]->url, $data[0]->width, $data[0]->height);
    }

    // Определяем метод для получения списка всех пород.
    public function getBreedsList(): array{
        // Устанавливаем URL для получения списка пород.
        $url = "https://api.thecatapi.com/v1/breeds";

        // Делаем запрос к API.
        $response = $this->makeApiRequest($url);

        // Декодируем JSON ответ.
        // Возвращаем данные.
        return json_decode($response->getBody());
    }

    // Определяем метод для выполнения запроса к API.
    public function makeApiRequest(string $url){
        // Создаем новый клиент GuzzleHttp с указанным URL.
        $client = new GuzzleHttp\Client(['base_uri' => $url]);

        // Пытаемся сделать запрос GET.
        try {
            return $client->request('GET');
        } catch (\GuzzleHttp\Exception\GuzzleException $error) {
            // Если происходит ошибка, перенаправляем на страницу ошибки.
            header('Location: /errorpage.php?error=' . urlencode($error));
            exit();
        }
    }
}
