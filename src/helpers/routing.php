<?php

// -- for general purpose functions

function controller($name = null, $return = null)
{
    if (empty($name) && empty($return)) {
        return null;
    }

    $route = request()->route();
    if (empty($route)) {
        return null;
    }

    $names = array_wrap($name);
    $result = false;

    foreach ($names as $name) {
        $actionName = strtolower($route -> getActionName());
        if ($actionName == 'closure') {
            $actionName = 'closure@closure';
        }

        list($controller, $action) = explode('@', $actionName);
        $controller = str_replace('controller', '', basename($controller));

        $name = strtolower($name);

        if (strpos($name, '@') !== false) {
            list($ifc, $ifa) = explode('@', $name);

            $result = $result || ($ifc == $controller) && ($ifa == $action);
        } else {
            $result = $result || ($name == $controller);
        }
    }

    if ($result && !is_null($return)) {
        return $return;
    }

    return $result;
}

function controllerName()
{
    $controller = substr(strtolower(strrchr(Route::currentRouteAction(), '\\')), 1);
    preg_match('/(.*?)controller/', $controller, $match);

    return isset($match[1]) ? $match[1] : null;
}

if (! function_exists('routes_path')) {
    function routes_path($path = '')
    {
        return ROUTES_PATH .($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('routeControllerAction')) {
    function routeControllerAction($action = 'index')
    {
        $route = request()->route();

        if (is_null($route)) {
            return url('/');
        }

        $routeName = $route->getAction();
        $routeName = explode('-', $routeName['as']);

        if (count($routeName) > 1) {
            array_pop($routeName);
            array_push($routeName, $action);
        }

        return route(implode('-', $routeName));
    }
}
