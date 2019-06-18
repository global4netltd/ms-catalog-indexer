<?php

namespace G4NReact\MsCatalogIndexer;

use G4NReact\MsCatalog\ConfigInterface;

/**
 * Class Config
 * @package G4NReact\MsCatalogIndexer
 */
class Config implements ConfigInterface
{
    /**
     * Engine types
     */
    const ENGINE_SOLR = 1;
    
    /**
     * @var int
     */
    protected $engine;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var int
     */
    protected $port;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $collection;

    /**
     * @var string
     */
    protected $core;

    /**
     * @var int
     */
    protected $pageSize;

    /**
     * @var boolean
     */
    protected $clearIndexBeforeReindex;

    /**
     * Indexer config constructor
     * @param int $engine
     * @param string $host
     * @param int $port
     * @param string $path
     * @param string $collection
     * @param string $core
     * @param int $pageSize
     * @param boolean $clearIndexBeforeReindex
     */
    public function __construct(
        $engine,
        $host,
        $port,
        $path,
        $collection,
        $core,
        $pageSize,
        $clearIndexBeforeReindex
    ) {
        $this->engine = $engine;
        $this->host = $host;
        $this->port = $port;
        $this->path = '/'; // since Solarium 5.0
        $this->collection = $collection;
        $this->core = $core;
        $this->pageSize = $pageSize;
        $this->clearIndexBeforeReindex = $clearIndexBeforeReindex;
    }

    /**
     * @return int
     */
    public function getEngine(): int
    {
        return $this->engine;
    }

    /**
     * @param int $engine
     * @return ConfigInterface
     */
    public function setEngine(int $engine): ConfigInterface
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return ConfigInterface
     */
    public function setHost(string $host): ConfigInterface
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @param int $port
     * @return ConfigInterface
     */
    public function setPort(int $port): ConfigInterface
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return ConfigInterface
     */
    public function setPath(string $path): ConfigInterface
    {
        $this->path = '/'; // since Solarium 5.0

        return $this;
    }

    /**
     * @return string
     */
    public function getCollection(): string
    {
        return $this->collection;
    }

    /**
     * @param string $collection
     * @return ConfigInterface
     */
    public function setCollection(string $collection): ConfigInterface
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @return string
     */
    public function getCore(): string
    {
        return $this->core;
    }

    /**
     * @param string $core
     * @return ConfigInterface
     */
    public function setCore(string $core): ConfigInterface
    {
        $this->core = $core;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     * @return ConfigInterface
     */
    public function setPageSize(int $pageSize): ConfigInterface
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    /**
     * @return bool
     */
    public function isClearIndexBeforeReindex(): bool
    {
        return $this->clearIndexBeforeReindex;
    }

    /**
     * @param bool $clearIndexBeforeReindex
     * @return ConfigInterface
     */
    public function setClearIndexBeforeReindex(bool $clearIndexBeforeReindex): ConfigInterface
    {
        $this->clearIndexBeforeReindex = $clearIndexBeforeReindex;

        return $this;
    }

    /**
     * @return array
     */
    public function getConnectionConfigArray(): array
    {
        return [
            'host'       => $this->getHost(),
            'port'       => $this->getPort(),
            'path'       => $this->getPath(),
            'collection' => $this->getCollection(),
            'core'       => $this->getCore(),
        ];
    }
}
