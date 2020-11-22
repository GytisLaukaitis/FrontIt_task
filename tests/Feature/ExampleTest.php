<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserEndpointTest extends TestCase
{
    // TC:0 no data is returned if database is empty /api/users
        // given -- nothing
        // when -- request to api/users
        // then -- assert
        // teardown -- nothing
    // TC:1 data is returned when database not empty
        // given -- create data by calling  $response = $this->json('POST', '/api/testing/',  ... )
        // when -- request to api/users
        // then -- assert that one users present (the one you just created)
        // teardown -- nothing -- delete the user that you created


    /**
     * Given no params to /api/users all user are returned, with status code 200
     *
     * @return void
     */
    public function test__get_all_users__given_no_params__returns_all_users()
    {
        // given -> susikuriame duomenis kuriu reikia

        // when

        // then

        // teardown

        $response = $this->get('/api/clients/a');
        $response->assertStatus(200);
        $response->assertJson([[ "Jonaz", "Jonaitis" ],[ "Petras", "Petraitis" ]]);
        // assert on body
    }

    /**
     * Given
     *
     * @return void
     */
    public function test__create_user__given_uname_pass_birthyear__creates_new_user_w_201()
    {
        // given -> susikuriame duomenis kuriu reikia

        // when

        // then

        // teardown


        $response = $this->json('POST', '/api/clients/',
            ['name' => 'Sally', 'surname' => 'Mally', 'yob' => '2020']);
        $response->assertStatus(201);
    }

    // TC: 400 kai neįveda name / surname / yob
    // TC: 403 for user generated id
}
