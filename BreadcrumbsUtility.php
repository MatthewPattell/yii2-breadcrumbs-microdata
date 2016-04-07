<?php

namespace mp\bmicrodata;

use yii\helpers\Url;
use yii\helpers\Html;

class BreadcrumbsUtility
{
    /**
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
