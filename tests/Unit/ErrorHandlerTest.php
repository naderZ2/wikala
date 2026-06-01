<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class ErrorHandlerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Register dummy routes for testing exception handling
        Route::get('api/test-error-500', function () {
            throw new \Exception('Database query failed!');
        });

        Route::get('api/test-validation-error', function () {
            $validator = Validator::make([], [
                'name' => 'required',
            ]);
            throw new ValidationException($validator);
        });

        Route::get('api/test-not-found', function () {
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException('User model not found');
        });
    }

    public function test_api_returns_clean_json_on_500_when_debug_is_false()
    {
        config(['app.debug' => false]);

        $response = $this->getJson('api/test-error-500');

        $response->assertStatus(500);
        $response->assertJson([
            'success' => false,
            'message' => 'Something went wrong. Please try again later.',
        ]);
        $response->assertJsonMissingPath('errors');
    }

    public function test_api_returns_detailed_json_on_500_when_debug_is_true()
    {
        config(['app.debug' => true]);

        $response = $this->getJson('api/test-error-500');

        $response->assertStatus(500);
        $response->assertJson([
            'success' => false,
            'message' => 'Database query failed!',
        ]);
        $response->assertJsonStructure([
            'success',
            'message',
            'errors' => [
                'exception',
                'file',
                'line',
                'trace',
            ]
        ]);
    }

    public function test_api_returns_validation_errors()
    {
        $response = $this->getJson('api/test-validation-error');

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => 'validation.required',
            'errors' => [
                'name' => [
                    'validation.required'
                ]
            ]
        ]);
    }

    public function test_api_returns_404_on_model_not_found()
    {
        $response = $this->getJson('api/test-not-found');

        $response->assertStatus(404);
        $response->assertJson([
            'success' => false,
            'message' => 'Resource not found.',
        ]);
    }
}
