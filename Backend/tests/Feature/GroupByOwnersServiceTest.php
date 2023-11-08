<?php

namespace Tests\Feature;

use App\Services\groupByOwnersService\Application\GroupByOwnersService;
use Tests\TestCase;

class GroupByOwnersServiceTest extends TestCase
{
    public function testGroupByOwners()
    {
        $data = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B",
        ];

        $service = new GroupByOwnersService();
        $result = $service->groupByOwners($data);

        $this->assertEquals([
            "Company A" => ["insurance.txt", "letter.docx"],
            "Company B" => ["Contract.docx"],
        ], $result);
    }
}
