<?php
// Подключаем класс CatController.
require_once 'CatController.php';

// Создаем экземпляр класса CatController.
$controller = new CatController();

// Проверяем, был ли параметр 'breed' передан в запросе GET. Если да, то получаем кота этой породы.
// Если нет, то получаем кота стандартной породы.
$cat = isset($_GET['breed']) ? $controller->getCat($_GET['breed']) : $controller->getCat();

// Получаем URL картинки кота.
$url = $cat->getUrl();

// Получаем список доступных пород.
$breeds = $controller->getBreedsList();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- Создаем форму с методом GET, которая отправляется на страницу index.php -->
<form method="get" action="index.php">
    <label>
        <!-- Создаем выпадающий список с породами -->
        Выбери породу
        <select name="breed">
            <option value="any">Any breed</option>
            <!-- Перебираем все породы и добавляем их в выпадающий список -->
            <?php
            foreach ($breeds as $breed){
                echo "<option value='" . $breed->id . "'>" . $breed->name . "</option>";
            }
            ?>
        </select>
    </label>
    <!-- Кнопка отправки формы -->
    <button type="submit">GET</button>
</form>
<!-- Выводим изображение кота -->
<img src="<?php echo $url; ?>" width="450" height="450" alt="фото кошки">
</body>
</html>

