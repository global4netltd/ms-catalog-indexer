<?php

namespace G4NReact\MsCatalogIndexer;

use G4NReact\MsCatalog\Config;
use G4NReact\MsCatalog\PusherFactory;
use G4NReact\MsCatalog\PusherInterface;
use G4NReact\MsCatalog\PullerInterface;
use Iterator;

/**
 * Class Indexer
 * @package G4NReact\MsCatalogIndexer
 */
class Indexer
{
    /**
     * @var PullerInterface
     */
    protected $puller;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var PusherInterface
     */
    protected $pusher;

    /**
     * Indexer constructor
     *
     * @param Iterator|PullerInterface $puller
     * @param Config $config
     */
    public function __construct(
        PullerInterface $puller,
        Config $config
    ) {
        $this->puller = $puller;
        $this->config = $config;

        $this->pusher = PusherFactory::create($config);
    }

    /**
     * @return void
     */
    public function reindex()
    {
        if ($this->puller && $this->pusher) {
            $this->pusher->push($this->puller);
        }
    }
}
