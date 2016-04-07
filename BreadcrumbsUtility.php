<?php

namespace mp\bmicrodata;

use yii\helpers\Url;
use yii\helpers\Html;

class BreadcrumbsUtility
{
    /**
     * Returns an array of breadcrumbs microdata
     * @param $links array breadcrumbs links (yii\widgets\Breadcrumbs Public property links)
     * @param int $home start breadcrumbs links (if isset home, $home=2. If not isset home, $home=1)
     * @return array breadcrumbs links
     */
    public static function UseMicroData($links, $home = 2) {

        foreach ($links as $key => &$link) {
            if(is_array($link)) {
                $link['template'] = BreadcrumbsUtility::getTemplate($link['label'], $link['url'], $key+$home);
            }
        }

        return $links;
    }

    /**
     * Returns a template with microdata for the home page
     * @param $label string name home label
     * @param $url string url link home page
     * @return array
     */
    public static function getHome($label, $url) {

        $home = [
            'label' => $label,
            'url'   => $url,
            'template' => BreadcrumbsUtility::getTemplate($label, $url, 1)
        ];

        return $home;
    }

    /**
     * It used only within the class, and contains markup template schema.org/BreadcrumbList
     * @param $label
     * @param $url
     * @param $key
     * @return string template microdata
     */
    protected static function getTemplate($label, $url, $key) {
        return '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'.
        Html::a('<span itemprop="name">'.$label.'</span>', Url::to($url), ['itemprop'=>'item'])
        . '
                    <meta itemprop="position" content="'.$key.'" />
                </li>';
    }
}
