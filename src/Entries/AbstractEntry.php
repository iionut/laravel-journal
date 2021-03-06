<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 11:34
 */

namespace Iionut\LaravelJournal\Entries;


use Iionut\LaravelJournal\Interfaces\EntryInterface;
use Illuminate\Support\Collection;

abstract class AbstractEntry implements EntryInterface
{
    /**
     * @var string
     */
    protected $name = null;

    /**
     * @var Collection|null
     */
    protected $data = null;

    /**
     * @var null|Collection
     */
    public $meta = null;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getData(): Collection
    {
        if (is_null($this->data)) {
            return new Collection();
        }

        return $this->data;
    }

    /**
     * @param string $name
     *
     * @return EntryInterface
     */
    public function setName(string $name): EntryInterface
    {
        $this->name = strtolower(snake_case($name));
        return $this;
    }

    /**
     * @param array|\Illuminate\Support\Collection $data
     *
     * @return EntryInterface
     * @throws \InvalidArgumentException
     */
    public function setData($data): EntryInterface
    {
        if (is_null($data)) {
            $this->data = new Collection();
        } elseif ($data instanceof Collection) {
            $this->data = $data;
        } elseif (is_array($data)) {
            $this->data = collect($data);
        } else {
            throw new \InvalidArgumentException("Invalid data type (". gettype($data) .") supplied for journal entry");
        }

        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function getMeta(): ?Collection
    {
        return $this->meta;
    }
}
