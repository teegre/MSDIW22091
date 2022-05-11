<?php

namespace Proxies\__CG__\App\Entity;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Artist extends \App\Entity\Artist implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Artist' . "\0" . 'artist_id', '' . "\0" . 'App\\Entity\\Artist' . "\0" . 'artist_name', '' . "\0" . 'App\\Entity\\Artist' . "\0" . 'records', '' . "\0" . 'App\\Entity\\Artist' . "\0" . 'artist_img'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Artist' . "\0" . 'artist_id', '' . "\0" . 'App\\Entity\\Artist' . "\0" . 'artist_name', '' . "\0" . 'App\\Entity\\Artist' . "\0" . 'records', '' . "\0" . 'App\\Entity\\Artist' . "\0" . 'artist_img'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Artist $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load(): void
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized(): bool
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized): void
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null): void
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer(): ?\Closure
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null): void
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner(): ?\Closure
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties(): array
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getArtistId(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getArtistId', []);

        return parent::getArtistId();
    }

    /**
     * {@inheritDoc}
     */
    public function getArtistName(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getArtistName', []);

        return parent::getArtistName();
    }

    /**
     * {@inheritDoc}
     */
    public function setArtistName(string $artist_name): \App\Entity\Artist
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setArtistName', [$artist_name]);

        return parent::setArtistName($artist_name);
    }

    /**
     * {@inheritDoc}
     */
    public function getRecords(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRecords', []);

        return parent::getRecords();
    }

    /**
     * {@inheritDoc}
     */
    public function addRecord(\App\Entity\Record $record): \App\Entity\Artist
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRecord', [$record]);

        return parent::addRecord($record);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRecord(\App\Entity\Record $record): \App\Entity\Artist
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRecord', [$record]);

        return parent::removeRecord($record);
    }

    /**
     * {@inheritDoc}
     */
    public function getArtistImg(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getArtistImg', []);

        return parent::getArtistImg();
    }

    /**
     * {@inheritDoc}
     */
    public function setArtistImg(?string $artist_img): \App\Entity\Artist
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setArtistImg', [$artist_img]);

        return parent::setArtistImg($artist_img);
    }

}