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

For view pages:
```php
// after set $this->title
$this->params['breadcrumbs'][] = [
    'label' => 'Articles',
    'url' => Url::toRoute('press-center/articles'),
];
$this->params['breadcrumbs'][] = [
    'label' => $this->title,
    // if there is no url element, then this is the current page.
];
```

HTML result:
```html
<ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <a href="/" itemprop="item">
            <span itemprop="name">Home page</span>
        </a>
        <meta itemprop="position" content="1">
    </li>
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <a href="/press-center/articles" itemprop="item">
            <span itemprop="name">Articles</span>
        </a>
        <meta itemprop="position" content="2">
    </li>
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="text-light" style="opacity: 0.65;">
        <span itemprop="name">10 Must-Read Books for Programmers</span>
        <meta itemprop="position" content="3">
    </li>
</ul>
```

That's all. Check it.