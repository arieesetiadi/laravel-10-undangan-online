<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('cms.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('cms.dashboard'));
});

// Dashboard > Administrator
Breadcrumbs::for('cms.administrator.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.dashboard');
    $trail->push('Administrator', route('cms.administrator.index'));
});

// Dashboard > Administrator > [Action]
Breadcrumbs::for('cms.administrator.action', function (BreadcrumbTrail $trail, $action) {
    $trail->parent('cms.administrator.index');
    $trail->push($action);
});
