<?php

namespace App\Actions\User;

use App\Models\SuperAdmin;

class CreateUser
{
    public static function create(object $request)
    {
        $user = new SuperAdmin();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = $request->image->move('uploads/user',$request->image->hashName());
            $user->update(['image' => $url]);
        }
        $user->password = bcrypt($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        return true;
    }
}
