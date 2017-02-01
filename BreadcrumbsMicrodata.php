<?php
/**
 * Created by PhpStorm.
 * Date: 2017-02-01
 * Time: 23:06
 */

namespace mp\bmicrodata;

use yii\widgets\Breadcrumbs;

/**
 * Class BreadcrumbsMicrodata
 * @package mp\bmicrodata
 */
class BreadcrumbsMicrodata extends Breadcrumbs
{
    /**
     * BreadcrumbsMicrodata constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        if (isset($config['homeLink'])) {
            $label  = isset($config['homeLink']['label']) ? $config['homeLink']['label'] : null;
            $url    = isset($config['homeLink']['url']) ? $config['homeLink']['url'] : (is_string($config['homeLink']) ? $config['homeLink'] : null);
            $config['homeLink'] = BreadcrumbsUtility::getHome($label, $url);
        }

        if (isset($config['breadcrumbs'])) {
            $config['breadcrumbs'] = BreadcrumbsUtility::UseMicroData($config['breadcrumbs']);
        }

        if (!isset($config['options']['class'])) {
            $config['options']['class'] = 'breadcrumb';
        }

        if (!isset($config['options']['itemscope itemtype'])) {
            $config['options']['itemscope itemtype'] = 'http://schema.org/BreadcrumbList';
        }

        parent::__construct($config);
    }
}