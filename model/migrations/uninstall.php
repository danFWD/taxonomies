<?php
/**
 * Note: if you have renamed classes and table names, then xPDO won't know where to find them!
 * You'll get errors like "Could not load class: OldClassName from mysql.oldclassname."
 * For cleanup of legacy table names, you'll need to run a raw query.
 *
 */
$core_path = $modx->getOption('taxonomies.core_path','',MODX_CORE_PATH.'components/taxonomies/');

$modx->addPackage('taxonomies',"{$core_path}model/",'tax_');

$manager = $modx->getManager();

// taxonomies
$manager->removeObjectContainer('PageTaxonomies');
$manager->removeObjectContainer('PageTerm');

// See https://github.com/modxcms/revolution/issues/829
if ($Setting = $modx->getObject('modSystemSetting',array('key' => 'extension_packages'))) {
    $modx->removeExtensionPackage($object['namespace']);
}