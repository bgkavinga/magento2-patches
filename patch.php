<?php
/**
 * @category  BGKavinga
 * @package   BGKavinga\Patches
 * @author    B G Kavinga <gihan.seneviratna@gmail.com>
 * @copyright 2017 Kavinga
 * @license   Open Software License ("OSL") v. 3.0
 */
use BGKavinga\Patches\Environment;

require_once 'src/BGKavinga/Patches/Environment.php';

$dirName = __DIR__ . '/patches';
$env = new Environment();
$files = glob($dirName . '/*');
sort($files);
foreach ($files as $file) {
    $cmd = 'git apply ' . $file;
    $env->execute($cmd);
}