<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\SaveAvatar;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UpdateUserApiRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UpdateUserApiController extends Controller
{
    public function __invoke(UpdateUserApiRequest $request)
    {
//        dump($request);
//        exit();
        if($request->validated())
        {
            if($request->has('avatar'))
            {
                if (File::exists($request->user()->avatar))
                {
                    File::delete($request->user()->avatar);
                }
                $file = $request->file('avatar');
//                'storage/users/'. $user->id .'/images/'. $file->getClientOriginalName();
                $request->user()->avatar = 'storage/users/'. $user->id .'/images/'. $this->saveAvatar($file, $user);
            }
            $request->user()->update($request->validated());
            return UserResource::make($request->user())->additional([
                'message' => 'User information updated successfully',
            ]);
        }

        return redirect()->back()->with('error', 'Profile update failed.');
    }

    private function saveAvatar(array|\Illuminate\Http\UploadedFile|null $file, User $user)
    {
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('users/'. $user->id .'/images/' . $file, 'public');
        return $file_name;
    }
}
