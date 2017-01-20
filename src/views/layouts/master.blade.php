<?php
if (!isset($framework)) {
    $framework = 'bs4';
}
$partial = 'taskforce-support::partials.' . $framework;
?><!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    @yield('head')
    @yield('styles')
</head>
<body>
    @include($partial . '._navbar')
<div class="container">
    @if (isset($isAdmin) && $isAdmin)
        <p class="info">Admin Note: We highly recommend editing the taskforce-support.php in your config folder to change the layout to match your own site layout.</p>
    @endif
    @yield('breadcrumbs')
    @yield('content')
</div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
