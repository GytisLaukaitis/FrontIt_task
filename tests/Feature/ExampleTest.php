<?php

namespace Tests\Feature;

use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Resources\Json\Resource;

class UserEndpointTest extends TestCase
{

    use DatabaseTransactions;
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
     * Given no params to /api/clients all clients are returned, with status code 200
     *
     * @return void
     */
    public function test_get_all_clients_given_no_params_returns_all_client()
    {
        // given
        // when
        $response = $this->get('/api/clients');

        // then
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json'); // TODO :: pakeisti application/vnd.api+json
        $response->assertJson([]);
    }

    /**
     * Given
     *
     * @return void
     */
    public function test_create_user_given_uname_passw_birthyear_creates_new_user_w_201()
    {
        // given

        $data = ['name' => 'Sally', 'surname' => 'Mallsy', 'yearOfBirth' => '2020-01-01'];

        // when
        $response = $this->json('POST', '/api/clients/', $data);

        // then
        $response->assertStatus(201);
        $response->assertJson([]);

    }

    /**
     * Given
     *
     * @return void
     */
    public function test_create_user_given_no_username_create_fails_w_status_422() {
        // given
        $data = ['surname' => 'Mally', 'yearOfBirth' => '2020-01-01'];

        // when
        $response = $this->json('POST', '/api/clients/', $data);

        // then
        $response->assertStatus(422);
        $response->assertJson([]);
    }



    public function test_create_user_given_no_parameters_create_fails_w_status_422() {
        // given
        $data = [''];

        // when
        $response = $this->json('POST', '/api/clients/', $data);

        // then
        $response->assertStatus(422);
        $response->assertJson([]);
    }



    public function test_create_user_given_two_same_unique_params_create_fails_w_status_422() {
        // given
        $data = [['name' => 'Sally','surname' => 'Mally', 'yearOfBirth' => '2020-01-01'],
        ['name' => 'Sally','surname' => 'Mo', 'yearOfBirth' => '1988-01-01']];

        // when
        $response = $this->json('POST', '/api/clients/', $data);

        // then
        $response->assertStatus(422);
        $response->assertJson([]);
    }
}
