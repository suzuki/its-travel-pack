<?php

namespace Its;

use Symfony\Component\Yaml\Yaml;

class Config
{
    protected $config;

    /**
     * @param string $dataPath
     */
    public function __construct($dataPath = null)
    {
        $defaultConfigPath = dirname(__DIR__) . '/config/default.yml';

        $yaml = file_get_contents($defaultConfigPath);
        if ($yaml) {
            $this->config = Yaml::parse($yaml);
        }

        if ($dataPath !== null && file_exists($dataPath)) {
            $dataYaml = file_get_contents($dataPath);
            $this->config['data'] = Yaml::parse($dataYaml);
        } else {
            $this->config['data'] = [];
        }
    }

    /**
     * @param string $key
     * @throws \LogicException
     * @return mixed
     */
    public function get($key)
    {
        if (!isset($this->config[$key])) {
            throw new \LogicException(sprintf('The key:"%s" was not found in config', $key));
        }

        return $this->config[$key];
    }
}
