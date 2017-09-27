<?php
/**
 * Created by PhpStorm.
 * User: liviu
 * Date: 27.09.2017
 * Time: 11:33
 */

namespace App\Lib\Journal\Interfaces;

use Illuminate\Support\Collection;

interface EntryInterface
{
    /**
     * @return string
     */
    function getName(): string;

    /**
     * @return string
     */
    function __toString(): string;

    /**
     * @param string $name
     *
     * @return mixed
     */
    function setName(string $name);

    /**
     * @param array|Collection $data
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    function setData( $data);

    /**
     * @return Collection|null
     */
    function getData(): ?Collection;
}