<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Contracts\UserRepositoryInterface;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $users = $this->userRepository->all();
        return UserResource::collection($users);
    }

    /**
     * @param UserCreateRequest $request
     * @return UserResource
     */
    public function store(UserCreateRequest $request): UserResource
    {
        try {
            $data = $request->validated();

            DB::beginTransaction();

            $user = $this->userRepository->create([
                'firstname'   => $data['firstname'],
                'lastname'    => $data['lastname'],
                'picture'     => $data['picture'],
                'position'    => $data['position'],
                'description' => $data['description'],
            ]);

            DB::commit();

            return new UserResource($user);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'Error! Unable to create user.']);
        }
    }

    /**
     * @param UserUpdateRequest $request
     * @param int $user_id
     * @return UserResource
     */
    public function update(UserUpdateRequest $request, int $user_id): UserResource
    {
        $data = $request->validated();
        $user = $this->userRepository->find($user_id);

        $this->userRepository->update([
            'firstname'   => $data['firstname'] ?? $user->firstname,
            'lastname'    => $data['lastname'] ?? $user->lastname,
            'picture'     => $data['picture'] ?? $user->picture,
            'position'    => $data['position'] ?? $user->position,
            'description' => $data['description'] ?? $user->description,
        ], $user_id);

        return new UserResource($this->userRepository->find($user_id));
    }

    /**
     * @param $user_id
     * @return JsonResponse
     */
    public function destroy(int $user_id): JsonResponse
    {
        $user = $this->userRepository->delete($user_id);
        return response()->json(['message' => 'User deleted successfully!']);
    }
}
