<?php

namespace Tests\Feature;

use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Resources\Json\Resource;

class ExampleTest extends TestCase
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
    public function testGetAllClientsGivenNoParamsReturnsAllClientsW200()
    {

        $response = $this->get('/clients');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJson([]);
    }


    /**
     * Given
     *
     * @return void
     */
    public function testCreateClientGivenUsernamePasswordBirthYearCreatesNewClientW201()
    {
        // given

        $data = ['name' => 'Sally', 'surname' => 'Mallsy', 'yearofbirth' => '2020-01-01'];

        // when
        $response = $this->json('POST', '/clients', $data);

        // then
        $response->assertStatus(201);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJson([]);

    }

    /**
     * Given
     *
     * @return void
     */
    public function testCreateClientGivenNoUsernameCreateFailsWStatus500()
    {
        // given
        $data = ['surname' => 'Mally', 'yearofbirth' => '2020-01-01'];

        // when
        $response = $this->json('POST', '/clients', $data);

        // then
        $response->assertStatus(500);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJson([]);
    }


    /**
     * Given
     *
     * @return void
     */

    public function testCreateClientGivenNoParametersCreateFailsWStatus500()
    {
        // given
        $data = [''];

        // when
        $response = $this->json('POST', '/clients', $data);

        // then
        $response->assertStatus(500);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJson([]);
    }


    /**
     * Given
     *
     * @return void
     */

    public function testCreateUserGivenTwoSameUniqueParamsCreateFailsWStatus500()
    {
        // given
        $data = [['name' => 'Sally', 'surname' => 'Mally', 'yearOfBirth' => '2020-01-01'],
            ['name' => 'Sally', 'surname' => 'Mo', 'yearofbirth' => '1988-01-01']];

        // when
        $response = $this->json('POST', '/clients', $data);

        // then
        $response->assertStatus(500);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJson([]);
    }
}
