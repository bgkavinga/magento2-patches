<?php
/**
 * @category  BGKavinga
 * @package   BGKavinga\Patches
 * @author    B G Kavinga <gihan.seneviratna@gmail.com>
 * @copyright 2017 Kavinga
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace BGKavinga\Patches\Console;


/**
 * Class CommandList
 * @package BGKavinga\Patches\Console
 */
class CommandList implements \Magento\Framework\Console\CommandListInterface
{
    /**
     * Gets list of command classes
     *
     * @return string[]
     */
    protected function getCommandsClasses()
    {
        return [
            'BGKavinga\Patches\Console\Command\Apply',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getCommands()
    {
        $commands = [];
        foreach ($this->getCommandsClasses() as $class) {
            if (class_exists($class)) {
                $commands[] = new $class();
            } else {
                throw new \Exception('Class ' . $class . ' does not exist');
            }
        }
        return $commands;
    }
}