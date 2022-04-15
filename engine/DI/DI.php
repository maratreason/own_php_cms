<?php

namespace Engine\DI;

class DI
{
    /**
     * @var array
     */
    private $container = [];

    /**
     * Добавляет зависимость в контейнер
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->container[$key] = $value;

        return $this;
    }

    /**
     * Возвращает зависимость по ключу
     *
     * @param [type] $key
     * @return void
     */
    public function get($key)
    {
        return $this->has($key);
    }

    /**
     * Проверяем есть ли такая зависимость по ключу
     *
     * @param $key
     * @return boolean
     */
    public function has($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }

    /**
     * Добавить новый элемент в существующий ключ
     *
     * @param $key
     * @param $value
     * @return void
     */
    public function push($key, $element = [])
    {
        if ($this->has($key) !== null) {
            $this->set($key, []);
        }

        if (!empty($element)) {
            $this->container[$key][$element['key']] = $element['value'];
        }
    }
}