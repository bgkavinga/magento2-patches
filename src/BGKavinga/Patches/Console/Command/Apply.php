<?php
/**
 * @category  BGKavinga
 * @package   BGKavinga\Patches
 * @author    B G Kavinga <gihan.seneviratna@gmail.com>
 * @copyright 2017 Kavinga
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace BGKavinga\Patches\Console\Command;

use BGKavinga\Patches\Environment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Apply
 * @package BGKavinga\Patches\Console\Command
 */
class Apply extends Command
{
    /**
     * {@inheritdoc}
     * @throws \InvalidArgumentException
     */
    protected function configure()
    {
        $this->setName('bgkavinga-patches:apply')
            ->setDescription('Apply patches for core Magento bugs.');
        parent::configure();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $env = new Environment();
        $env->log("Applying magento-cloud-configuration patches.");
        $env->execute('php ' . Environment::MAGENTO_ROOT . 'vendor/bgkavinga/magento2-patches/patch.php');
    }

}