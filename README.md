Microdata for breadcrumbs
=========================
Add microdata for breadcrumbs.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist matthew-p/yii2-breadcrumbs-microdata "*"
```

or add

```
"matthew-p/yii2-breadcrumbs-microdata": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

Find in you project:
```php
Breadcrumbs::widget([ ... ])
```

and change:

```php
use mp\bmicrodata\BreadcrumbsMicrodata; // in top

BreadcrumbsMicrodata::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], // For PHP7 'links' => $this->params['breadcrumbs'] ?? [] 
]);
```

Alternate version:
```php
Breadcrumbs::widget([     
    'homeLink' => BreadcrumbsUtility::getHome('Home', Yii::$app->getHomeUrl()), // Link home page with microdata
    'links' => isset($this->params['breadcrumbs']) ? BreadcrumbsUtility::UseMicroData($this->params['breadcrumbs']) : [], // Get other links with microdata    
    'options' => [ // Set microdata for container BreadcrumbList         
        'class' => 'breadcrumb',         
        'itemscope itemtype' => 'http://schema.org/BreadcrumbList'     
    ], 
]);
```

That's all. Check it.