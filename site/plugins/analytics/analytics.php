<?php
/**
 * Google Analytics plugin for Kirby
 *
 * @author Authorless
 * @version 1.0
 */
function analytics()
{
    if (c::get('analytics', false) === false) {
        return;
    }

    $id = c::get('analytics.id');
    if ($id === null) {
        return;
    }

    $anonymize = c::get('analytics.anonymize', false);
    if (is_bool($anonymize) === false) {
        $anonymize = false;
    }
    
    $templateData = compact('id', 'anonymize');

    return tpl::load(__DIR__ . DS . 'template.php', $templateData);
}
