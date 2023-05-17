<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('cms.index', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('cms.index'));
});

// Home > Administrator
Breadcrumbs::for('cms.administrator.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push('Administrator', route('cms.administrator.index'));
});

// Home > Administrator > [Action]
Breadcrumbs::for('cms.administrator.action', function (BreadcrumbTrail $trail, $action) {
    $trail->parent('cms.administrator.index');
    $trail->push($action);
});
