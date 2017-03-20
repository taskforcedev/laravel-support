<?php
if (!isset($framework) || $framework == '') {
    $framework = 'bs4';
}
$partial = 'taskforce-support::partials.' . $framework;
?><!DOCTYPE html>
<html>
<head>
    @include($partial . '._head')
    @yield('head')
    @yield('styles')
</head>
<body>
    @include($partial . '._navbar')
    <div class="{{ $ui->cssClass('container') }}">
    @if (isset($isAdmin) && $isAdmin)
        <p class="info">Admin Note: We highly recommend editing the taskforce-support.php in your config folder to change the layout to match your own site layout.</p>
    @endif
    @yield('breadcrumbs')
    @yield('content')
    </div>
    @include($partial . '._scripts')
    @yield('scripts')
</body>
</html>
