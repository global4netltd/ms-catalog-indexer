<?php

namespace G4NReact\MsCatalogIndexer;

use G4NReact\MsCatalogSolr\Pusher as SolrPusher;
use G4NReact\MsCatalogSolr\Config as SolrConfig;

class Indexer
{
    /**
     * Engine types
     */
    const ENGINE_SOLR = 1;

    /**
     * @var \Iterator
     */
    protected $documents;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var void // pusher interface
     */
    protected $pusher;

    /**
     * Indexer constructor.
     * @param \Iterator $documents
     * @param Config $config
     */
    public function __construct(
        \Iterator $documents,
        \G4NReact\MsCatalogIndexer\Config $config
    ) {
        $this->documents = $documents;
        $this->config = $config;

        $this->pusher = $this->initializePusher();
    }

    /**
     * 
     */
    protected function initializePusher()
    {
        if ($engine = $this->config->getEngine()) {
            switch($engine) {
                case self::ENGINE_SOLR:
                    $config = $this->createSolrConfig();
                    return new SolrPusher($config);
            }
        }
    }

    /**
     * @return SolrConfig
     */
    protected function createSolrConfig(): SolrConfig
    {
        $host = $this->config->getHost();
        $port = $this->config->getPort();
        $path = $this->config->getPath();
        $core = $this->config->getCore();

        return new SolrConfig($host, $port, $path, $core);
    }

    public function reindex()
    {
        if ($this->documents && $this->pusher) {
            $this->pusher->push($this->documents);
        }
    }
}
