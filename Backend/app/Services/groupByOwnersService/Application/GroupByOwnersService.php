<?php

namespace App\Services\groupByOwnersService\Application;

class GroupByOwnersService
{
    public function groupByOwners($data)
    {
        $result = [];

        foreach ($data as $file => $owner) {
            if (!isset($result[$owner])) {
                $result[$owner] = [];
            }

            $result[$owner][] = $file;
        }

        return $result;
    }
}
