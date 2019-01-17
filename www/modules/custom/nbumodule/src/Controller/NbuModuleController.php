<?php
/**
 * @file
 * Contains \Drupal\hellomodule\Controller\HelloModuleController.
 * ^ Пишеться по прикладу:
 *  - \Drupal - вказуэ що цей файл належить до ядра Drupal, тому що там ще є Symfony.
 *  - hellomodule - назва модуля.
 *  - Controller - тип файла. Папка src НЕ вказується завжди.
 *  - HelloModuleController - назва нашого класу.
 */

/**
 * Простір імен нашого контролера. Подібне на опис вище, але НЕ вказується назва нашого класу.
 */
namespace Drupal\nbumodule\Controller;

/**
 * Використовуємо клас з друпалу: ControllerBase. Наслідуємось від нього і він зробить за нас
 * всі обовязкові речі, які роблять контроллери.
 */
use Drupal\Core\Controller\ControllerBase;

/**
 * Оголошуємо наш клас-контроллер.
 */
class NbuModuleController extends ControllerBase {

    public function nbuModule() {
        $output = array();
        $output['#title'] = 'HelloModule page title';
        $output['#markup'] = 'Hello World Module!';
        $output['#theme'] = 'nbumodule_template';
        $output['#test_var'] = 'Test Value from function CONTENT';




        return $output;
    }

}

