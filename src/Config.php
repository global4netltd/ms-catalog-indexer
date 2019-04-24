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
     * @param string $core
     * @param int $pageSize
     * @param boolean $clearIndexBeforeReindex
     */
    public function __construct(
        $engine,
        $host,
        $port,
        $path,
        $core,
        $pageSize,
        $clearIndexBeforeReindex
    ) {
        $this->engine = $engine;
        $this->host = $host;
        $this->port = $port;
        $this->path = $path;
        $this->core = $core;
        $this->pageSize = $pageSize;
        $this->clearIndexBeforeReindex = $clearIndexBeforeReindex;
    }

    /**
     * @return string
     */
    public function getEngine(): int
    {
        return $this->engine;
    }

    /**
     * @param int $engine
     * @return Config
     */
    public function setEngine(int $engine): Config
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
     * @return Config
     */
    public function setHost(string $host): Config
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
     * @return Config
     */
    public function setPort(int $port): Config
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
     * @return Config
     */
    public function setPath(string $path): Config
    {
        $this->path = $path;

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
     * @return Config
     */
    public function setCore(string $core): Config
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
     * @return Config
     */
    public function setPageSize(int $pageSize): Config
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
     * @return Config
     */
    public function setClearIndexBeforeReindex(bool $clearIndexBeforeReindex): Config
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
            'host' => $this->getHost(),
            'port' => $this->getPort(),
            'path' => $this->getPath(),
            'core' => $this->getCore(),
        ];
    }
}
