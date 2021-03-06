<?php

namespace Tests\Unit\Models;

use App\Models\LinkList;
use App\Models\User;
use App\Repositories\ListRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ListDeleteTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /** @var User */
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testValidListCreation(): void
    {
        $this->be($this->user);

        $list = factory(LinkList::class)->create();

        $deletion_result = ListRepository::delete($list);

        $this->assertTrue($deletion_result);
    }
}
