<?php
/**
 * @category  BGKavinga
 * @package   BGKavinga\Patches
 * @author    B G Kavinga <gihan.seneviratna@gmail.com>
 * @copyright 2017 Kavinga
 * @license   Open Software License ("OSL") v. 3.0
 */

if (PHP_SAPI == 'cli') {
    \Magento\Framework\Console\CommandLocator::register('BGKavinga\Patches\Console\CommandList');
}