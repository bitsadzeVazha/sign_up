<?php

namespace Sign\Test\Cron;

use Sign\Test\Model\PostFactory;
use Sign\Test\Model\Config;

class AddItem
{
    private $itemFactory;

    private $config;

    public function __construct(PostFactory $itemFactory, Config $config)
    {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    public function execute()
    {
        if ($this->config->isEnabled()) {
            $this->itemFactory->create()
                ->setName('Scheduled item')
                ->setDescription('Created at ' . time())
                ->save();
        }
    }
}
