<?php
/**
 * @category  BGKavinga
 * @package   BGKavinga\Patches
 * @author    B G Kavinga <gihan.seneviratna@gmail.com>
 * @copyright 2017 Kavinga
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace BGKavinga\Patches;


class Environment
{
    const MAGENTO_ROOT = __DIR__ . '/../../../../../../';

    public function execute($command)
    {
        $this->log('Command:' . $command);

        exec(
            $command,
            $output,
            $status
        );

        $this->log('Status:' . var_export($status, true));
        $this->log('Output:' . var_export($output, true));

        if ($status != 0) {
            throw new \RuntimeException("Command $command returned code $status", $status);
        }

        return $output;
    }

    public function log($message)
    {
        echo sprintf('[%s] %s', date("Y-m-d H:i:s"), $message) . PHP_EOL;
    }
}