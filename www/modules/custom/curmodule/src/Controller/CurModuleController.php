<?php
/**
 * @file
 * Contains \Drupal\curmodule\Controller\CurModuleController.
 * ^ Пишеться по прикладу:
 *  - \Drupal - вказуэ що цей файл належить до ядра Drupal, тому що там ще є Symfony.
 *  - curmodule - назва модуля.
 *  - Controller - тип файла. Папка src НЕ вказується завжди.
 *  - CurModuleController - назва нашого класу.
 */

/**
 * Простір імен нашого контролера. Подібне на опис вище, але НЕ вказується назва нашого класу.
 */
namespace Drupal\curmodule\Controller;

/**
 * Використовуємо клас з друпалу: ControllerBase. Наслідуємось від нього і він зробить за нас
 * всі обовязкові речі, які роблять контроллери.
 */
use Drupal\Core\Controller\ControllerBase;

/**
 * Оголошуємо наш клас-контроллер.
 */
class CurModuleController extends ControllerBase {

    /**
     * {@inheritdoc}
     * В Drupal 8 дуже багато будується на renderable arrays и при поверненні даною функцією
     * вмісту сторінки, ми також повинні вернути масив, який спокійно пройде через drupal_render().
     */
    public function curModule() {
        $output = array();
        $output['#title'] = 'CurmoduleModule page title';
        $output['#markup'] = 'CurmoduleModule World Module!';
        $output['#theme'] = 'curmodule_template';
        $output['#test_var'] = 'Test Value from function CONTENT';
        return $output;
    }

    public function content() {
        return [
            '#theme' => 'curmodule_template',
            '#test_var' => $this->t('Test Value from CurmoduleModule function CONTENT'),
        ];
    }
}

