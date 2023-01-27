<?php

namespace Tests\Feature;

use Tests\TestCase;

abstract class ActionTestCase extends TestCase
{
    /**
     * Название роута для которого пишутся тесты
     *
     * @return string
     */
    abstract public function getRouteName(): string;

    /**
     * @param array $data
     * @return string
     */
    protected function getRouteUrl(array $data = []): string
    {
        $url = '?';
        $iKey = 0;


        if (!empty($data)) {
            foreach ($data as $key => $item) {
                if ($iKey == 0)
                    $url .= $key . '=' . $item;
                else
                    $url .= '&' . $key . '=' . $item;

                $iKey++;
            }

            return route($this->getRouteName()) . $url;
        }

        return route($this->getRouteName());
    }
}
