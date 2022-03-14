# Validation


# Подключение

require_once('validation.php');

Ловим данные из глобального метода пост

$validation = new Validation($_POST);

# Проверка данных

Проверяем $_POST['user'] на пустоту и кол-во знаков

Проверяем $_POST['email'] на пустоту и на валидность при помощи встроенного фильтра PHP FILTER_VALIDATE_EMAIL



  
