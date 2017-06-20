<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

 use zgldh\QiniuStorage\QiniuStorage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.index');
    }

    public function password()
    {
        return view('users.password');
    }

    public function updatePassword(PasswordRequest $request)
    {
        if (Hash::check($request->input('old_password'), user()->password)) {
            user()->password = bcrypt($request->input('password'));
            user()->save();

            flash('密码修改成功！', 'success');
            return redirect('/');
        }

        flash('初始密码错误，密码修改失败！','danger');
        return back()->withInput();
    }

    public function avatar()
    {
        return view('users.avatar');
    }

    public function changeAvatar(Request $request)
    {
        $file = $request->file('img');
        $filename = 'avatars/' . md5(time() . user()->id) . '.' .  $file->getClientOriginalExtension();

        /*$disk = QiniuStorage::disk('qiniu');
        $content = $disk->get($file->getRealPath());
        $disk->put($filename, $content);*/

        $file->move(public_path('images/avatars/'), $filename);

        user()->avatar = '/images/' . $filename;
        // user()->avatar = 'http://' . config('filesystems.disks.qiniu.domains.default') . '/' . $filename;
        user()->save();

        return response()->json(['url' => user()->avatar]);
    }

    public function setting()
    {
        return view('users.settings');
    }

    public function settingsUpdate(Request $request)
    {
        user()->settings = json_encode($request->only('city', 'bio'));
        user()->save();

        flash('保存成功！', 'success');
        return back();
    }
}
