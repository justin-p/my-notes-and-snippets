<?php
defined('_JEXEC') or die;

require_once dirname(__FILE__) . str_replace('/', DIRECTORY_SEPARATOR, '/../../functions.php');

// Note. It is important to remove spaces between elements.

$tag = ($params->get('tag_id') != NULL) ? ' id="' . $params->get('tag_id') . '"' : '';
if (isset($attribs['name']) && $attribs['name'] == 'position-1') {
    $menutype = 'horizontal';

    $start = $params->get('startLevel');

    // render subitems or not.
    $subitems = $GLOBALS['artx_settings']['menu']['show_submenus'] && 1 == $params->get('showAllChildren');
    // true - skip current node, false - render current node.
    $skip = false;
    
    echo '<ul class="dd-hmenu"' . $tag . '>';
    foreach ($list as $i => & $item) {
        if ($skip) {
            if ($item->shallower) {
                if (($item->level - $item->level_diff) <= $limit) {
                    echo '</li>' . str_repeat('</ul></li>', $limit - $item->level + $item->level_diff);
                    $skip = false;
                }
            }
            continue;
        }

        $class = 'item-' . $item->id;
        $class .= $item->id == $active_id ? ' current' : '';
        $class .= ('alias' == $item->type
            && in_array($item->params->get('aliasoptions'), $path)
            || in_array($item->id, $path)) ? ' active' : '';
        $class .= $item->deeper ? ' deeper' : '';
        $class .= $item->parent ? ' parent' : '';

        echo '<li class="' . $class . '">';

        // Render the menu item.
        switch ($item->type) {
            case 'separator':
            case 'url':
            case 'component':
                require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                break;
            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        }
        if ($item->deeper) {
            if (!$subitems) {
                $limit = $item->level;
                $skip = true;
                continue;
            }
            echo '<ul>';
        }
        elseif ($item->shallower)
            echo '</li>' . str_repeat('</ul></li>', $item->level_diff);
        else
            echo '</li>';
    }
    echo '</ul>';
} else if (0 === strpos($params->get('moduleclass_sfx'), 'dd-vmenu') || false !== strpos($params->get('moduleclass_sfx'), ' dd-vmenu')) {
    $menutype = 'vertical';

    $start = $params->get('startLevel');

    // render subitems or not.
    $subitems = $GLOBALS['artx_settings']['vmenu']['show_submenus'] && 1 == $params->get('showAllChildren');
    // true - skip current node, false - render current node.
    $skip = false;
    // limit of rendering - skip items with level more then limit.
    $limit = $start;

    echo '<ul class="dd-vmenu"' . $tag . '>';
    foreach ($list as $i => & $item) {
        if ($skip) {
            if ($item->shallower) {
                if (($item->level - $item->level_diff) <= $limit) {
                    echo '</li>' . str_repeat('</ul></li>', $limit - $item->level + $item->level_diff);
                    $skip = false;
                }
            }
            continue;
        }

        $class = 'item-' . $item->id;
        $class .= $item->id == $active_id ? ' current' : '';
        $class .= ('alias' == $item->type
            && in_array($item->params->get('aliasoptions'), $path)
            || in_array($item->id, $path)) ? ' active' : '';
        $class .= $item->deeper ? ' deeper' : '';
        $class .= $item->parent ? ' parent' : '';

        echo '<li class="' . $class . '">';

        // Render the menu item.
        switch ($item->type) {
            case 'separator':
            case 'url':
            case 'component':
                require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                break;
            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        }
        if ($item->deeper) {
            if (!$subitems) {
                $limit = $item->level;
                $skip = true;
                continue;
            }
            echo '<ul' . ($subitems && in_array($item->id, $path) ? ' class="active"' : '') . '>';
        }
        elseif ($item->shallower)
            echo '</li>' . str_repeat('</ul></li>', $item->level_diff);
        else
            echo '</li>';
    }
    echo '</ul>';
} else {
    $menutype = 'default';
    echo '<ul class="menu' . $params->get('class_sfx') . '"' . $tag . '>';
    foreach ($list as $i => &$item) {

        $class = 'item-' . $item->id;
        $class .= $item->id == $active_id ? ' current' : '';
        $class .= ('alias' == $item->type
            && in_array($item->params->get('aliasoptions'), $path)
            || in_array($item->id, $path)) ? ' active' : '';
        $class .= $item->deeper ? ' deeper' : '';
        $class .= $item->parent ? ' parent' : '';

        echo '<li class="' . $class . '">';

        // Render the menu item.
        switch ($item->type) {
            case 'separator':
            case 'url':
            case 'component':
                require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
                break;
            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        }

        if ($item->deeper)
            echo '<ul>';
        elseif ($item->shallower)
            echo '</li>' . str_repeat('</ul></li>', $item->level_diff);
        else
            echo '</li>';
    }
    echo '</ul>';
}
