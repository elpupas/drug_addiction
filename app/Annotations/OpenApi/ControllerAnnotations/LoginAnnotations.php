<?php
namespace App\Annotations\OpenApi\controllersAnnotations\LoginAnnotations;

class LoginAnnotations{

    /**
 * @OA\Post(
 *     path="/login",
 *     summary="Login user",
 *     tags={"Authentication"},
 *     description="Logs in a user with email and password.",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     format="email",
 *                     description="User's email"
 *                 ),
 *                 @OA\Property(
 *                     property="password",
 *                     type="string",
 *                     format="password",
 *                     description="User's password (min 8 characters)"
 *                 ),
 *                 example={"email": "user@example.com", "password": "password123"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful login",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="result",
 *                 type="object",
 *                 @OA\Property(
 *                     property="message",
 *                     type="string",
 *                     description="Message indicating successful login"
 *                 ),
 *                 @OA\Property(
 *                     property="access_token",
 *                     type="string",
 *                     description="Generated access token for authenticated requests"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="result",
 *                 type="object",
 *                 @OA\Property(
 *                     property="message",
 *                     type="string",
 *                     description="Message indicating invalid credentials"
 *                 )
 *             ),
 *             @OA\Property(
 *                 property="status",
 *                 type="boolean",
 *                 description="Status indicating failure"
 *             )
 *         )
 *     )
 * )
 */
    public function login(){}

public function logout(){}
}