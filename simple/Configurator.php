<?php

abstract class Configurator{
    public function setConnection($settings)
    {
        $this->settings = $settings;
    }
    abstract protected function configure();
}

interface HasSender
{
    public function getSender();
}

interface HasDriver
{
    public function getDriver();
}

interface HasStorage
{
    public function getStorage();
}

class MailConfigurator extends Configurator implements HasSender
{
    private $settings;

    private $configuration;

    public function getSender()
    {
        return 'mail sender';
    }

    public function configure()
    {
        $this->configuration = $this->settings['mailer_options'];
        return $this;
    }
}

class DatabaseConfigurator extends Configurator implements HasDriver
{
    private $settings;

    private $configuration;

    public function getDriver()
    {
        return 'get some db driver';
    }

    public function configure()
    {
        $this->configuration['dsn'] = $this->settings['dsn'];
        $this->configuration['user'] = $this->settings['user'];
        $this->configuration['password'] = $this->settings['password'];
        return $this;
    }
}

class CacheConfigurator extends Configurator implements HasStorage
{
    private $settings;

    private $configuration;

    public function getStorage()
    {
        return 'get some cache storage';
    }

    public function configure()
    {
        $this->configuration['host'] = $this->settings['host'];
        $this->configuration['port'] = $this->settings['poer'];
        $this->configuration['user'] = $this->settings['user'];
        $this->configuration['password'] = $this->settings['password'];
        return $this;
    }
}
