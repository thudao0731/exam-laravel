<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loadAllUsers() {
        $all_user = User::all();
        return view('users', compact('all_user'));
    }

    public function loadAddUserFrom() {
        return view('add-user');
    }

    public function loadEditForm($id) {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }

    public function AddUser(StoreUserRequest $request) {
        // add new User here
        try {
            $new_user = User::create($request->validated());

            return redirect('/users')->with('success', 'Add User Successfully');
        } catch(\Exception $e) {
            return redirect('/add/user')->with('fail', $e->getMessage());
        }

    }

    public function EditUser(StoreUserRequest $request) {
        try {
            $update_user = User::where('id', $request->user_id)->updated($request->validated());

            return redirect('/users')->with('success', 'Update User Successfully');
        } catch(\Exception $e) {
            return redirect('/user/edit')->with('fail', $e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        // Tìm người dùng theo ID
        $user = User::find($id);

        // Kiểm tra nếu người dùng tồn tại
        if (!$user) {
            return response()->json([
                'message' => 'Người dùng không tồn tại'
            ], 404);
        }

        // Xóa người dùng
        $user->delete();

        // Trả về phản hồi thành công
        return response()->json([
            'message' => 'Xóa người dùng thành công'
        ], 200);
    }
}
