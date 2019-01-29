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
    public function firstCurModule() {

        // З таблиці nbu_table_info вибираємо всі активні валюти
        $query = \Drupal::database()->select('nbu_table_info', 'info');
        $query->fields('info', ['kod2', 'name']);
        $query->condition('info.active', 1);
        $query_result = $query->execute()->fetchAll();

        $output = array();
        $output['#title'] = 'Детальні курси валют НБУ';
        //$output['#markup'] = 'CurmoduleModule World Module!';
        $output['#theme'] = 'curmodule_template_firstpage';
        $output['#data'] = $query_result;
        return $output;
    }

    public function pagesCurModule($pages_name) {
        $output = array();
        $output['#title'] = $this->t('Детальні курси @pages_name', array('@pages_name' => $pages_name));
        //$output['#markup'] = 'pagesCurModule World Module!';
        $output['#theme'] = 'curmodule_template_pages';
        $output['#pages_name'] = $pages_name;
        return $output;
    }


    public function content() {
        return [
            '#theme' => 'curmodule_template',
            '#test_var' => $this->t('Test Value from CurmoduleModule function CONTENT'),
        ];
    }
}

