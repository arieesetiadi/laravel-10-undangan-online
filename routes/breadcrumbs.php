<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('cms.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('cms.dashboard'));
});

// Dashboard > Administrators
Breadcrumbs::for('cms.administrators.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.dashboard');
    $trail->push('Administrators', route('cms.administrators.index'));
});

// Dashboard > Administrators > [Action]
Breadcrumbs::for('cms.administrators.action', function (BreadcrumbTrail $trail, $action) {
    $trail->parent('cms.administrators.index');
    $trail->push($action);
});

// Dashboard > Customers
Breadcrumbs::for('cms.customers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.dashboard');
    $trail->push('Customers', route('cms.customers.index'));
});

// Dashboard > Customers > [Action]
Breadcrumbs::for('cms.customers.action', function (BreadcrumbTrail $trail, $action) {
    $trail->parent('cms.customers.index');
    $trail->push($action);
});
