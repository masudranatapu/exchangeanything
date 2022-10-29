<?php

namespace App\Actions\User;

class UpdateUser
{
    public static function update(object $request, object $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = $request->image->move('uploads/user',$request->image->hashName());
            $user->update(['image' => $url]);
        }

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        return true;
    }
}
