<?php

namespace Whilesmart\Issues\Tests;

use Workbench\App\Models\User;

class IssueTest extends TestCase
{
    public function test_user_can_create_an_issue(): void
    {
        $user = $this->createUser();
        $data = [
            'title' => $this->faker->sentence(),
            'type' => 'issue',
            'description' => $this->faker->paragraph(),
            'severity' => 'low',
            'status' => 'open',
            'creator_type' => User::class,
            'creator_id' => $user->id,
        ];
        $user->issues()->create($data);

        $this->assertDatabaseHas('issues', $data);
    }

    private function createUser()
    {
        return User::create([
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'password' => 'password',
        ]);
    }

    public function test_user_can_add_punch_list_item_to_an_issue(): void
    {
        $user = $this->createUser();
        $data = [
            'title' => $this->faker->sentence(),
            'type' => 'punchlist',
            'description' => $this->faker->paragraph(),
            'severity' => 'low',
            'status' => 'open',
            'creator_type' => User::class,
            'creator_id' => $user->id,
        ];
        $issue = $user->issues()->create($data);

        $data = [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph(),
            'status' => 'closed',
            'due_date' => $this->faker->date(),
            'creator_type' => User::class,
            'creator_id' => $user->id,
        ];

        $issue->punchlistItems()->create($data);
        $this->assertDatabaseHas('punch_list_items', $data);
    }

    public function test_user_can_assign_an_issue_to_an_assignee(): void
    {
        $user = $this->createUser();
        $data = [
            'title' => $this->faker->sentence(),
            'type' => 'issue',
            'description' => $this->faker->paragraph(),
            'severity' => 'low',
            'status' => 'open',
            'creator_type' => User::class,
            'creator_id' => $user->id,
        ];
        $issue = $user->issues()->create($data);
        $issue->assignments()->create([
            'assignee_id' => $user->id,
            'assignee_type' => User::class,
        ]);

        $assignments = $issue->assignments;
        $this->assertCount(1, $assignments);
        $this->assertDatabaseHas('issue_assignments', ['assignee_id' => $user->id, 'assignee_type' => User::class, 'issue_id' => $issue->id]);
    }
}
