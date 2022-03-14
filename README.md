# Validation


# Подключение


```php
require_once('validation.php');
```

Ловим данные из глобального метода пост

```php
$validation = new Validation($_POST);
```

# Проверка данных

Проверяем $_POST['user'] на пустоту и кол-во знаков

Проверяем $_POST['email'] на пустоту и на валидность при помощи встроенного фильтра PHP FILTER_VALIDATE_EMAIL

# Запись и вывод ошибок

Метод addError - записывает ошибки в массив $errors
и по ключу user или email выводим ошибки на странице 

```php
<?php echo $errors['user'] ?? '' ?>
```



  
